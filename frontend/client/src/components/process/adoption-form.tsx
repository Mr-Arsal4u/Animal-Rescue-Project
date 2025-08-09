import { useState } from "react";
import { motion, AnimatePresence } from "framer-motion";
import { useForm } from "react-hook-form";
import { zodResolver } from "@hookform/resolvers/zod";
import { z } from "zod";
import { Send, CheckCircle } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";
import { Checkbox } from "@/components/ui/checkbox";
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/components/ui/select";
import { useToast } from "@/hooks/use-toast";

const formSchema = z.object({
  fullName: z.string().min(2, "Full name is required"),
  email: z.string().email("Valid email is required"),
  phone: z.string().min(10, "Valid phone number is required"),
  animalType: z.string().min(1, "Please select an animal type"),
  experience: z.string().optional(),
  agreement: z.boolean().refine((val) => val === true, "You must agree to the terms"),
});

type FormData = z.infer<typeof formSchema>;

export default function AdoptionForm() {
  const [isSubmitted, setIsSubmitted] = useState(false);
  const [showConfetti, setShowConfetti] = useState(false);
  const { toast } = useToast();

  const {
    register,
    handleSubmit,
    setValue,
    watch,
    formState: { errors, isSubmitting },
  } = useForm<FormData>({
    resolver: zodResolver(formSchema),
    defaultValues: {
      fullName: "",
      email: "",
      phone: "",
      animalType: "",
      experience: "",
      agreement: false,
    },
  });

  const onSubmit = async (data: FormData) => {
    try {
      // Simulate API call
      await new Promise((resolve) => setTimeout(resolve, 1000));
      
      setShowConfetti(true);
      
      setTimeout(() => {
        setIsSubmitted(true);
        setShowConfetti(false);
      }, 1000);

      toast({
        title: "Application Submitted!",
        description: "We'll review your application and contact you within 24-48 hours.",
      });
    } catch (error) {
      toast({
        title: "Error",
        description: "Something went wrong. Please try again.",
        variant: "destructive",
      });
    }
  };

  const confettiPieces = Array.from({ length: 9 }, (_, i) => ({
    id: i,
    color: [
      "bg-yellow-400",
      "bg-blue-400",
      "bg-green-400",
      "bg-red-400",
      "bg-purple-400",
      "bg-pink-400",
      "bg-orange-400",
      "bg-teal-400",
      "bg-indigo-400",
    ][i],
    left: `${(i + 1) * 10}%`,
    delay: i * 0.1,
  }));

  return (
    <div className="max-w-2xl mx-auto bg-white rounded-2xl shadow-xl p-8 relative overflow-hidden">
      <AnimatePresence>
        {!isSubmitted ? (
          <motion.div
            key="form"
            initial={{ opacity: 1 }}
            exit={{ opacity: 0, scale: 0.95 }}
            transition={{ duration: 0.3 }}
          >
            <h3 className="text-2xl font-bold text-center text-gray-800 mb-8">
              Start Your Adoption Journey
            </h3>

            <form onSubmit={handleSubmit(onSubmit)} className="space-y-6">
              {/* Full Name */}
              <div className="relative">
                <Input
                  id="fullName"
                  placeholder=" "
                  className="peer"
                  {...register("fullName")}
                />
                <Label
                  htmlFor="fullName"
                  className="absolute left-4 -top-2.5 text-sm text-gray-600 bg-white px-2 transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-primary"
                >
                  Full Name *
                </Label>
                {errors.fullName && (
                  <p className="text-red-500 text-sm mt-1">{errors.fullName.message}</p>
                )}
              </div>

              <div className="grid md:grid-cols-2 gap-6">
                {/* Email */}
                <div className="relative">
                  <Input
                    id="email"
                    type="email"
                    placeholder=" "
                    className="peer"
                    {...register("email")}
                  />
                  <Label
                    htmlFor="email"
                    className="absolute left-4 -top-2.5 text-sm text-gray-600 bg-white px-2 transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-primary"
                  >
                    Email Address *
                  </Label>
                  {errors.email && (
                    <p className="text-red-500 text-sm mt-1">{errors.email.message}</p>
                  )}
                </div>

                {/* Phone */}
                <div className="relative">
                  <Input
                    id="phone"
                    type="tel"
                    placeholder=" "
                    className="peer"
                    {...register("phone")}
                  />
                  <Label
                    htmlFor="phone"
                    className="absolute left-4 -top-2.5 text-sm text-gray-600 bg-white px-2 transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-primary"
                  >
                    Phone Number *
                  </Label>
                  {errors.phone && (
                    <p className="text-red-500 text-sm mt-1">{errors.phone.message}</p>
                  )}
                </div>
              </div>

              {/* Animal Type */}
              <div>
                <Select onValueChange={(value) => setValue("animalType", value)}>
                  <SelectTrigger>
                    <SelectValue placeholder="Select Animal Type" />
                  </SelectTrigger>
                  <SelectContent>
                    <SelectItem value="dog">Dog</SelectItem>
                    <SelectItem value="cat">Cat</SelectItem>
                    <SelectItem value="both">Open to Both</SelectItem>
                  </SelectContent>
                </Select>
                {errors.animalType && (
                  <p className="text-red-500 text-sm mt-1">{errors.animalType.message}</p>
                )}
              </div>

              {/* Experience */}
              <div className="relative">
                <Textarea
                  id="experience"
                  placeholder=" "
                  className="peer resize-none"
                  rows={4}
                  {...register("experience")}
                />
                <Label
                  htmlFor="experience"
                  className="absolute left-4 -top-2.5 text-sm text-gray-600 bg-white px-2 transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:-top-2.5 peer-focus:text-sm peer-focus:text-primary"
                >
                  Tell us about your experience with pets
                </Label>
              </div>

              {/* Agreement */}
              <div className="flex items-center space-x-3">
                <Checkbox
                  id="agreement"
                  onCheckedChange={(checked) => setValue("agreement", !!checked)}
                />
                <Label htmlFor="agreement" className="text-gray-700">
                  I agree to the{" "}
                  <a href="#" className="text-primary hover:underline">
                    adoption terms and conditions
                  </a>{" "}
                  *
                </Label>
              </div>
              {errors.agreement && (
                <p className="text-red-500 text-sm">{errors.agreement.message}</p>
              )}

              <Button
                type="submit"
                className="w-full relative overflow-hidden"
                size="lg"
                disabled={isSubmitting}
              >
                {isSubmitting ? "Submitting..." : "Submit Application"}
                <Send className="w-4 h-4 ml-2" />

                {/* Confetti Elements */}
                <AnimatePresence>
                  {showConfetti && (
                    <div className="absolute inset-0 pointer-events-none">
                      {confettiPieces.map((piece) => (
                        <motion.div
                          key={piece.id}
                          className={`confetti ${piece.color}`}
                          style={{ left: piece.left }}
                          initial={{ scale: 0, rotate: 0, opacity: 1 }}
                          animate={{ scale: 1, rotate: 180, opacity: 0 }}
                          transition={{
                            duration: 0.8,
                            ease: "easeOut",
                            delay: piece.delay,
                          }}
                        />
                      ))}
                    </div>
                  )}
                </AnimatePresence>
              </Button>
            </form>
          </motion.div>
        ) : (
          <motion.div
            key="success"
            initial={{ opacity: 0, scale: 0.8 }}
            animate={{ opacity: 1, scale: 1 }}
            className="text-center py-8"
          >
            <CheckCircle className="w-16 h-16 text-success mx-auto mb-4" />
            <h4 className="text-2xl font-bold text-success mb-2">Application Submitted!</h4>
            <p className="text-gray-700">
              Thank you for your interest in adoption. We'll review your application and
              contact you within 24-48 hours.
            </p>
          </motion.div>
        )}
      </AnimatePresence>
    </div>
  );
}
