import { useState } from "react";
import { motion } from "framer-motion";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Calendar, Clock, User, Phone, Mail, PawPrint, AlertCircle } from "lucide-react";
import { useToast } from "@/hooks/use-toast";

export default function ConsultationForm() {
  const { toast } = useToast();
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [isSubmitted, setIsSubmitted] = useState(false);
  const [formData, setFormData] = useState({
    client_name: "",
    client_email: "",
    client_phone: "",
    pet_name: "",
    pet_type: "",
    pet_breed: "",
    pet_age: "",
    consultation_type: "",
    symptoms_description: "",
    emergency_contact: "",
    preferred_date: "",
    preferred_time: "",
    additional_notes: "",
    agreement: false,
  });

  const handleInputChange = (field: string, value: string | boolean) => {
    setFormData(prev => ({ ...prev, [field]: value }));
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    
    // Additional validation
    if (!formData.agreement) {
      toast({
        title: "Agreement Required",
        description: "Please accept the terms and conditions to proceed.",
        variant: "destructive",
      });
      return;
    }

    // Validate phone number format
    const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
    if (!phoneRegex.test(formData.client_phone.replace(/\s/g, ''))) {
      toast({
        title: "Invalid Phone Number",
        description: "Please enter a valid phone number.",
        variant: "destructive",
      });
      return;
    }

    // Validate pet age
    if (parseInt(formData.pet_age) < 0 || parseInt(formData.pet_age) > 30) {
      toast({
        title: "Invalid Pet Age",
        description: "Pet age must be between 0 and 30 years.",
        variant: "destructive",
      });
      return;
    }
    
    setIsSubmitting(true);
    
    try {
      const response = await fetch('http://localhost:8000/api/consultations', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
        },
        body: JSON.stringify(formData),
      });

      if (response.ok) {
        const result = await response.json();
        toast({
          title: "Consultation Request Submitted!",
          description: result.message || "We will contact you within 24 hours to confirm your appointment.",
        });
        
        // Reset form and show success
        setFormData({
          client_name: "",
          client_email: "",
          client_phone: "",
          pet_name: "",
          pet_type: "",
          pet_breed: "",
          pet_age: "",
          consultation_type: "",
          symptoms_description: "",
          emergency_contact: "",
          preferred_date: "",
          preferred_time: "",
          additional_notes: "",
          agreement: false,
        });
        setIsSubmitted(true);
      } else {
        const errorData = await response.json().catch(() => ({}));
        throw new Error(errorData.message || `HTTP error! status: ${response.status}`);
      }
    } catch (error) {
      console.error('Submission error:', error);
      
      let errorMessage = "There was an error submitting your request. Please try again.";
      
      if (error instanceof Error) {
        if (error.message.includes('Failed to fetch') || error.message.includes('NetworkError')) {
          errorMessage = "Network error. Please check your connection and try again.";
        } else if (error.message.includes('CORS')) {
          errorMessage = "CORS error. Please contact support.";
        } else {
          errorMessage = error.message;
        }
      }
      
      toast({
        title: "Submission Failed",
        description: errorMessage,
        variant: "destructive",
      });
    } finally {
      setIsSubmitting(false);
    }
  };

  // Show success message if form was submitted
  if (isSubmitted) {
    return (
      <motion.div
        initial={{ opacity: 0, y: 20 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.5 }}
      >
        <Card className="max-w-4xl mx-auto">
          <CardContent className="text-center py-16">
            <div className="mb-6">
              <div className="bg-green-100 p-4 rounded-full inline-block mb-4">
                <svg className="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M5 13l4 4L19 7" />
                </svg>
              </div>
              <h2 className="text-2xl font-bold text-gray-800 mb-2">
                Consultation Request Submitted!
              </h2>
              <p className="text-gray-600 mb-6">
                Thank you for your consultation request. We will contact you within 24 hours to confirm your appointment details.
              </p>
              <Button
                onClick={() => setIsSubmitted(false)}
                variant="outline"
                className="px-6"
              >
                Submit Another Request
              </Button>
            </div>
          </CardContent>
        </Card>
      </motion.div>
    );
  }

  return (
    <motion.div
      initial={{ opacity: 0, y: 20 }}
      animate={{ opacity: 1, y: 0 }}
      transition={{ duration: 0.5 }}
    >
      <Card className="max-w-4xl mx-auto">
        <CardHeader className="text-center">
          <CardTitle className="text-2xl font-bold text-gray-800">
            Book a Veterinary Consultation
          </CardTitle>
          <p className="text-gray-600">
            Tell us about your pet and we'll schedule a consultation with our veterinary team
          </p>
        </CardHeader>
        
        <CardContent>
          <form onSubmit={handleSubmit} className="space-y-8">
            {/* Client Information */}
            <div className="space-y-6">
              <h3 className="text-lg font-semibold text-gray-800 flex items-center gap-2">
                <User className="w-5 h-5 text-primary" />
                Client Information
              </h3>
              
              <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div className="space-y-2">
                  <Label htmlFor="client_name">Full Name *</Label>
                  <Input
                    id="client_name"
                    value={formData.client_name}
                    onChange={(e) => handleInputChange('client_name', e.target.value)}
                    placeholder="Enter your full name"
                    required
                  />
                </div>
                
                <div className="space-y-2">
                  <Label htmlFor="client_email">Email Address *</Label>
                  <Input
                    id="client_email"
                    type="email"
                    value={formData.client_email}
                    onChange={(e) => handleInputChange('client_email', e.target.value)}
                    placeholder="Enter your email"
                    required
                  />
                </div>
                
                <div className="space-y-2">
                  <Label htmlFor="client_phone">Phone Number *</Label>
                  <Input
                    id="client_phone"
                    type="tel"
                    value={formData.client_phone}
                    onChange={(e) => handleInputChange('client_phone', e.target.value)}
                    placeholder="Enter your phone number"
                    required
                  />
                </div>
                
                <div className="space-y-2">
                  <Label htmlFor="emergency_contact">Emergency Contact *</Label>
                  <Input
                    id="emergency_contact"
                    value={formData.emergency_contact}
                    onChange={(e) => handleInputChange('emergency_contact', e.target.value)}
                    placeholder="Emergency contact person"
                    required
                  />
                </div>
              </div>
            </div>

            {/* Pet Information */}
            <div className="space-y-6">
              <h3 className="text-lg font-semibold text-gray-800 flex items-center gap-2">
                <PawPrint className="w-5 h-5 text-primary" />
                Pet Information
              </h3>
              
              <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div className="space-y-2">
                  <Label htmlFor="pet_name">Pet Name *</Label>
                  <Input
                    id="pet_name"
                    value={formData.pet_name}
                    onChange={(e) => handleInputChange('pet_name', e.target.value)}
                    placeholder="Enter your pet's name"
                    required
                  />
                </div>
                
                <div className="space-y-2">
                  <Label htmlFor="pet_type">Pet Type *</Label>
                  <Select
                    value={formData.pet_type}
                    onValueChange={(value) => handleInputChange('pet_type', value)}
                    required
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select pet type" />
                    </SelectTrigger>
                    <SelectContent>
                      <SelectItem value="dog">Dog</SelectItem>
                      <SelectItem value="cat">Cat</SelectItem>
                      <SelectItem value="bird">Bird</SelectItem>
                      <SelectItem value="rabbit">Rabbit</SelectItem>
                      <SelectItem value="hamster">Hamster</SelectItem>
                      <SelectItem value="fish">Fish</SelectItem>
                      <SelectItem value="guinea_pig">Guinea Pig</SelectItem>
                      <SelectItem value="ferret">Ferret</SelectItem>
                      <SelectItem value="other">Other</SelectItem>
                    </SelectContent>
                  </Select>
                </div>
                
                <div className="space-y-2">
                  <Label htmlFor="pet_breed">Breed *</Label>
                  <Input
                    id="pet_breed"
                    value={formData.pet_breed}
                    onChange={(e) => handleInputChange('pet_breed', e.target.value)}
                    placeholder="Enter your pet's breed"
                    required
                  />
                </div>
                
                <div className="space-y-2">
                  <Label htmlFor="pet_age">Age (years) *</Label>
                  <Input
                    id="pet_age"
                    type="number"
                    min="0"
                    max="30"
                    value={formData.pet_age}
                    onChange={(e) => handleInputChange('pet_age', e.target.value)}
                    placeholder="Enter age in years"
                    required
                  />
                </div>
              </div>
            </div>

            {/* Consultation Details */}
            <div className="space-y-6">
              <h3 className="text-lg font-semibold text-gray-800 flex items-center gap-2">
                <AlertCircle className="w-5 h-5 text-primary" />
                Consultation Details
              </h3>
              
              <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div className="space-y-2">
                  <Label htmlFor="consultation_type">Consultation Type *</Label>
                  <Select
                    value={formData.consultation_type}
                    onValueChange={(value) => handleInputChange('consultation_type', value)}
                    required
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select consultation type" />
                    </SelectTrigger>
                    <SelectContent>
                      <SelectItem value="general_checkup">General Checkup</SelectItem>
                      <SelectItem value="vaccination">Vaccination</SelectItem>
                      <SelectItem value="surgery">Surgery</SelectItem>
                      <SelectItem value="emergency">Emergency</SelectItem>
                      <SelectItem value="dental">Dental Care</SelectItem>
                      <SelectItem value="grooming">Grooming</SelectItem>
                      <SelectItem value="behavioral">Behavioral Issues</SelectItem>
                      <SelectItem value="nutrition">Nutrition Consultation</SelectItem>
                      <SelectItem value="other">Other</SelectItem>
                    </SelectContent>
                  </Select>
                  <p className="text-sm text-gray-500">
                    Select the type of consultation you need. For emergencies, we'll prioritize your request.
                  </p>
                </div>
                
                <div className="space-y-2">
                  <Label htmlFor="preferred_date">Preferred Date *</Label>
                  <Input
                    id="preferred_date"
                    type="date"
                    min={new Date().toISOString().split('T')[0]}
                    value={formData.preferred_date}
                    onChange={(e) => handleInputChange('preferred_date', e.target.value)}
                    required
                  />
                </div>
                
                <div className="space-y-2">
                  <Label htmlFor="preferred_time">Preferred Time *</Label>
                  <Select
                    value={formData.preferred_time}
                    onValueChange={(value) => handleInputChange('preferred_time', value)}
                    required
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select preferred time" />
                    </SelectTrigger>
                    <SelectContent>
                      <SelectItem value="morning">Morning (9:00 AM - 12:00 PM)</SelectItem>
                      <SelectItem value="afternoon">Afternoon (12:00 PM - 3:00 PM)</SelectItem>
                      <SelectItem value="evening">Evening (3:00 PM - 6:00 PM)</SelectItem>
                      <SelectItem value="late_evening">Late Evening (6:00 PM - 8:00 PM)</SelectItem>
                      <SelectItem value="flexible">Flexible - Any time works</SelectItem>
                    </SelectContent>
                  </Select>
                </div>
              </div>
              
              <div className="space-y-2">
                <Label htmlFor="symptoms_description">Symptoms/Concerns Description *</Label>
                <Textarea
                  id="symptoms_description"
                  rows={4}
                  value={formData.symptoms_description}
                  onChange={(e) => handleInputChange('symptoms_description', e.target.value)}
                  placeholder="Please describe your pet's symptoms, concerns, or the reason for consultation..."
                  maxLength={1000}
                  required
                />
                <div className="text-right text-sm text-gray-500">
                  {formData.symptoms_description.length}/1000 characters
                </div>
              </div>
              
              <div className="space-y-2">
                <Label htmlFor="additional_notes">Additional Notes</Label>
                <Textarea
                  id="additional_notes"
                  rows={3}
                  value={formData.additional_notes}
                  onChange={(e) => handleInputChange('additional_notes', e.target.value)}
                  placeholder="Any additional information, special requirements, or questions..."
                  maxLength={500}
                />
                <div className="text-right text-sm text-gray-500">
                  {formData.additional_notes.length}/500 characters
                </div>
              </div>
            </div>

            {/* Agreement */}
            <div className="space-y-4">
              <div className="bg-amber-50 border border-amber-200 rounded-lg p-4">
                <div className="flex items-start space-x-3">
                  <AlertCircle className="text-amber-600 w-5 h-5 mt-0.5 flex-shrink-0" />
                  <div className="text-sm text-amber-800">
                    <p className="font-medium mb-1">Important Note:</p>
                    <p>If your pet is experiencing a medical emergency, please contact us immediately by phone. 
                    This form is for non-emergency consultation requests.</p>
                  </div>
                </div>
              </div>
              
              <div className="flex items-start space-x-3">
                <input
                  type="checkbox"
                  id="agreement"
                  checked={formData.agreement}
                  onChange={(e) => handleInputChange('agreement', e.target.checked)}
                  className="mt-1 h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
                  required
                />
                <Label htmlFor="agreement" className="text-sm text-gray-600">
                  I agree to the terms and conditions and understand that this is a consultation request. 
                  A member of our team will contact me within 24 hours to confirm the appointment details.
                </Label>
              </div>
            </div>

            {/* Submit Button */}
            <div className="text-center">
              <Button
                type="submit"
                size="lg"
                disabled={isSubmitting}
                className="px-8 py-3 text-lg"
              >
                {isSubmitting ? (
                  <div className="flex items-center space-x-2">
                    <div className="animate-spin rounded-full h-5 w-5 border-b-2 border-white"></div>
                    <span>Submitting...</span>
                  </div>
                ) : (
                  "Submit Consultation Request"
                )}
              </Button>
            </div>
          </form>
        </CardContent>
      </Card>
    </motion.div>
  );
}
