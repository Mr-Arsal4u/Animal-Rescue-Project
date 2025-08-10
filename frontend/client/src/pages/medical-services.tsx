import { motion } from "framer-motion";
import { fadeInUp, staggerContainer } from "@/lib/animations";
import ConsultationForm from "@/components/medical/consultation-form";
import AppointmentForm from "@/components/medical/appointment-form";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";
import { Stethoscope, Calendar, Heart } from "lucide-react";

export default function MedicalServices() {
  return (
    <div className="min-h-screen pt-16 bg-gray-50">
      <div className="max-w-7xl mx-auto px-4 py-20">
        <motion.div
          className="text-center mb-16"
          initial="initial"
          animate="animate"
          variants={staggerContainer}
        >
          <motion.div
            className="flex justify-center mb-6"
            variants={fadeInUp}
          >
            <div className="bg-primary/10 p-4 rounded-full">
              <Stethoscope className="text-primary text-4xl" />
            </div>
          </motion.div>
          
          <motion.h2
            className="text-4xl font-bold text-gray-800 mb-4"
            variants={fadeInUp}
          >
            Medical Services
          </motion.h2>
          <motion.p
            className="text-xl text-gray-600 max-w-3xl mx-auto mb-6"
            variants={fadeInUp}
          >
            Professional veterinary care for your beloved pets. Book consultations and appointments with our experienced medical team.
          </motion.p>
          
          <motion.div
            className="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto"
            variants={fadeInUp}
          >
            <div className="bg-blue-50 p-6 rounded-lg border border-blue-200">
              <Heart className="text-blue-600 text-2xl mb-3 mx-auto" />
              <h3 className="font-semibold text-gray-800 mb-2">Consultation Requests</h3>
              <p className="text-sm text-gray-600">
                Perfect for initial assessments, general advice, or when you're unsure about your pet's condition. 
                We'll schedule a consultation and get back to you within 24 hours.
              </p>
            </div>
            
            <div className="bg-green-50 p-6 rounded-lg border border-green-200">
              <Calendar className="text-green-600 text-2xl mb-3 mx-auto" />
              <h3 className="font-semibold text-gray-800 mb-2">Direct Appointments</h3>
              <p className="text-sm text-gray-600">
                For specific services, urgent care, or when you know exactly what your pet needs. 
                Choose your preferred time and doctor for immediate scheduling.
              </p>
            </div>
          </motion.div>
        </motion.div>

        <motion.div
          initial="initial"
          animate="animate"
          variants={staggerContainer}
        >
          <Tabs defaultValue="consultation" className="w-full">
            <TabsList className="grid w-full grid-cols-2 max-w-md mx-auto mb-12">
              <TabsTrigger value="consultation" className="flex items-center space-x-2">
                <Heart className="w-4 h-4" />
                <span>Book Consultation</span>
              </TabsTrigger>
              <TabsTrigger value="appointment" className="flex items-center space-x-2">
                <Calendar className="w-4 h-4" />
                <span>Book Appointment</span>
              </TabsTrigger>
            </TabsList>

            <TabsContent value="consultation" className="mt-0">
              <ConsultationForm />
            </TabsContent>

            <TabsContent value="appointment" className="mt-0">
              <AppointmentForm />
            </TabsContent>
          </Tabs>
        </motion.div>
      </div>
    </div>
  );
}
