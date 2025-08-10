import { useState } from "react";
import { motion } from "framer-motion";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Calendar, Clock, User, Phone, Mail, PawPrint, Stethoscope, DollarSign, UserCheck } from "lucide-react";
import { useToast } from "@/hooks/use-toast";

export default function AppointmentForm() {
  const { toast } = useToast();
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [isSubmitted, setIsSubmitted] = useState(false);
  const [formData, setFormData] = useState({
    pet_name: "",
    pet_type: "",
    pet_breed: "",
    pet_age: "",
    owner_name: "",
    owner_email: "",
    owner_phone: "",
    appointment_date: "",
    appointment_time: "",
    service_type: "",
    doctor_id: "",
    symptoms: "",
    urgency_level: "2",
    notes: "",
    total_cost: "",
    payment_status: "pending",
  });

  // Mock doctors data - in a real app, this would come from an API
  const doctors = [
    { id: "1", name: "Dr. Sarah Johnson", specialization: "General Veterinary Medicine" },
    { id: "2", name: "Dr. Michael Chen", specialization: "Surgery & Emergency Care" },
    { id: "3", name: "Dr. Emily Rodriguez", specialization: "Dental & Preventive Care" },
    { id: "4", name: "Dr. David Thompson", specialization: "Specialist Care" },
  ];

  // Mock doctors data - in a real app, this would come from an API
  const doctors = [
    { id: "1", name: "Dr. Sarah Johnson", specialization: "General Veterinary Medicine" },
    { id: "2", name: "Dr. Michael Chen", specialization: "Surgery & Emergency Care" },
    { id: "3", name: "Dr. Emily Rodriguez", specialization: "Dental & Preventive Care" },
    { id: "4", name: "Dr. David Thompson", specialization: "Specialist Care" },
  ];

  const handleInputChange = (field: string, value: string) => {
    setFormData(prev => ({ ...prev, [field]: value }));
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    
    // Additional validation
    if (!formData.doctor_id) {
      toast({
        title: "Doctor Selection Required",
        description: "Please select a preferred doctor for your appointment.",
        variant: "destructive",
      });
      return;
    }

    // Validate phone number format
    const phoneRegex = /^[\+]?[1-9][\d]{0,15}$/;
    if (!phoneRegex.test(formData.owner_phone.replace(/\s/g, ''))) {
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

    // Validate appointment date is not in the past
    const selectedDate = new Date(formData.appointment_date);
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    if (selectedDate < today) {
      toast({
        title: "Invalid Appointment Date",
        description: "Appointment date cannot be in the past.",
        variant: "destructive",
      });
      return;
    }
    
    setIsSubmitting(true);
    
    try {
      const response = await fetch('http://localhost:8000/api/appointments', {
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
          title: "Appointment Request Submitted!",
          description: result.message || "We will contact you within 24 hours to confirm your appointment.",
        });
        
        // Reset form and show success
        setFormData({
          pet_name: "",
          pet_type: "",
          pet_breed: "",
          pet_age: "",
          owner_name: "",
          owner_email: "",
          owner_phone: "",
          appointment_date: "",
          appointment_time: "",
          service_type: "",
          doctor_id: "",
          symptoms: "",
          urgency_level: "2",
          notes: "",
          total_cost: "",
          payment_status: "pending",
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
                Appointment Request Submitted!
              </h2>
              <p className="text-gray-600 mb-6">
                Thank you for your appointment request. We will contact you within 24 hours to confirm your appointment details.
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
            Book a Veterinary Appointment
          </CardTitle>
          <p className="text-gray-600">
            Schedule a specific appointment time with our veterinary team
          </p>
        </CardHeader>
        
        <CardContent>
          <form onSubmit={handleSubmit} className="space-y-8">
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

            {/* Owner Information */}
            <div className="space-y-6">
              <h3 className="text-lg font-semibold text-gray-800 flex items-center gap-2">
                <User className="w-5 h-5 text-primary" />
                Owner Information
              </h3>
              
              <div className="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div className="space-y-2">
                  <Label htmlFor="owner_name">Full Name *</Label>
                  <Input
                    id="owner_name"
                    value={formData.owner_name}
                    onChange={(e) => handleInputChange('owner_name', e.target.value)}
                    placeholder="Enter your full name"
                    required
                  />
                </div>
                
                <div className="space-y-2">
                  <Label htmlFor="owner_email">Email Address *</Label>
                  <Input
                    id="owner_email"
                    type="email"
                    value={formData.owner_email}
                    onChange={(e) => handleInputChange('owner_email', e.target.value)}
                    placeholder="Enter your email"
                    required
                  />
                </div>
                
                <div className="space-y-2">
                  <Label htmlFor="owner_phone">Phone Number *</Label>
                  <Input
                    id="owner_phone"
                    type="tel"
                    value={formData.owner_phone}
                    onChange={(e) => handleInputChange('owner_phone', e.target.value)}
                    placeholder="Enter your phone number"
                    required
                  />
                </div>
              </div>
            </div>

            {/* Appointment Details */}
            <div className="space-y-6">
              <h3 className="text-lg font-semibold text-gray-800 flex items-center gap-2">
                <Calendar className="w-5 h-5 text-primary" />
                Appointment Details
              </h3>
              
              <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div className="space-y-2">
                  <Label htmlFor="appointment_date">Appointment Date *</Label>
                  <Input
                    id="appointment_date"
                    type="date"
                    min={new Date().toISOString().split('T')[0]}
                    value={formData.appointment_date}
                    onChange={(e) => handleInputChange('appointment_date', e.target.value)}
                    required
                  />
                </div>
                
                <div className="space-y-2">
                  <Label htmlFor="appointment_time">Appointment Time *</Label>
                  <Input
                    id="appointment_time"
                    type="time"
                    value={formData.appointment_time}
                    onChange={(e) => handleInputChange('appointment_time', e.target.value)}
                    required
                  />
                </div>
                
                <div className="space-y-2">
                  <Label htmlFor="service_type">Service Type *</Label>
                  <Select
                    value={formData.service_type}
                    onValueChange={(value) => handleInputChange('service_type', value)}
                    required
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select service type" />
                    </SelectTrigger>
                    <SelectContent>
                      <SelectItem value="vaccination">Vaccination</SelectItem>
                      <SelectItem value="checkup">Regular Checkup</SelectItem>
                      <SelectItem value="emergency">Emergency Care</SelectItem>
                      <SelectItem value="surgery">Surgery</SelectItem>
                      <SelectItem value="dental">Dental Care</SelectItem>
                      <SelectItem value="grooming">Grooming</SelectItem>
                      <SelectItem value="consultation">Consultation</SelectItem>
                      <SelectItem value="other">Other</SelectItem>
                    </SelectContent>
                  </Select>
                  <p className="text-sm text-gray-500">
                    Choose the service you need. Emergency care will be prioritized.
                  </p>
                </div>
                
                <div className="space-y-2">
                  <Label htmlFor="urgency_level">Urgency Level *</Label>
                  <Select
                    value={formData.urgency_level}
                    onValueChange={(value) => handleInputChange('urgency_level', value)}
                    required
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select urgency level" />
                    </SelectTrigger>
                    <SelectContent>
                      <SelectItem value="1">Low Priority</SelectItem>
                      <SelectItem value="2">Normal Priority</SelectItem>
                      <SelectItem value="3">High Priority</SelectItem>
                      <SelectItem value="4">Urgent</SelectItem>
                      <SelectItem value="5">Critical</SelectItem>
                    </SelectContent>
                  </Select>
                  <p className="text-sm text-gray-500">
                    Critical and urgent cases will be scheduled as soon as possible.
                  </p>
                </div>
              </div>

              {/* Doctor Selection */}
              <div className="space-y-2">
                <Label htmlFor="doctor_id">Preferred Doctor *</Label>
                <Select
                  value={formData.doctor_id}
                  onValueChange={(value) => handleInputChange('doctor_id', value)}
                  required
                >
                  <SelectTrigger>
                    <SelectValue placeholder="Select a preferred doctor" />
                  </SelectTrigger>
                  <SelectContent>
                    {doctors.map((doctor) => (
                      <SelectItem key={doctor.id} value={doctor.id}>
                        <div className="flex flex-col">
                          <span className="font-medium">{doctor.name}</span>
                          <span className="text-sm text-gray-500">{doctor.specialization}</span>
                        </div>
                      </SelectItem>
                    ))}
                  </SelectContent>
                </Select>
              </div>
              
              <div className="space-y-2">
                <Label htmlFor="symptoms">Symptoms/Concerns</Label>
                <Textarea
                  id="symptoms"
                  rows={3}
                  value={formData.symptoms}
                  onChange={(e) => handleInputChange('symptoms', e.target.value)}
                  placeholder="Describe any symptoms or concerns..."
                  maxLength={500}
                />
                <div className="text-right text-sm text-gray-500">
                  {formData.symptoms.length}/500 characters
                </div>
              </div>
              
              <div className="space-y-2">
                <Label htmlFor="notes">Additional Notes</Label>
                <Textarea
                  id="notes"
                  rows={3}
                  value={formData.notes}
                  onChange={(e) => handleInputChange('notes', e.target.value)}
                  placeholder="Additional notes or special requirements..."
                  maxLength={500}
                />
                <div className="text-right text-sm text-gray-500">
                  {formData.notes.length}/500 characters
                </div>
              </div>
            </div>

            {/* Cost Information */}
            <div className="space-y-6">
              <h3 className="text-lg font-semibold text-gray-800 flex items-center gap-2">
                <DollarSign className="w-5 h-5 text-primary" />
                Cost Information
              </h3>
              
              <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div className="space-y-2">
                  <Label htmlFor="total_cost">Estimated Cost</Label>
                  <Input
                    id="total_cost"
                    type="number"
                    min="0"
                    step="0.01"
                    value={formData.total_cost}
                    onChange={(e) => handleInputChange('total_cost', e.target.value)}
                    placeholder="Enter estimated cost (optional)"
                  />
                </div>
                
                <div className="space-y-2">
                  <Label htmlFor="payment_status">Payment Status</Label>
                  <Select
                    value={formData.payment_status}
                    onValueChange={(value) => handleInputChange('payment_status', value)}
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Select payment status" />
                    </SelectTrigger>
                    <SelectContent>
                      <SelectItem value="pending">Pending</SelectItem>
                      <SelectItem value="paid">Paid</SelectItem>
                      <SelectItem value="partial">Partial Payment</SelectItem>
                    </SelectContent>
                  </Select>
                </div>
              </div>
            </div>

            {/* Submit Button */}
            <div className="space-y-6">
              <div className="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <div className="flex items-start space-x-3">
                  <Calendar className="text-blue-600 w-5 h-5 mt-0.5 flex-shrink-0" />
                  <div className="text-sm text-blue-800">
                    <p className="font-medium mb-1">Appointment Scheduling:</p>
                    <p>We'll do our best to accommodate your preferred date and time. 
                    For urgent cases, we may need to adjust the schedule to ensure your pet receives timely care.</p>
                  </div>
                </div>
              </div>
              
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
                    "Submit Appointment Request"
                  )}
                </Button>
              </div>
            </div>
          </form>
        </CardContent>
      </Card>
    </motion.div>
  );
}
