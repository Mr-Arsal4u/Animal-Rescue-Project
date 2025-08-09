import { motion } from "framer-motion";
import { Pill, Syringe, Shield, Heart, Star, CheckCircle } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import { fadeInUp, staggerContainer } from "@/lib/animations";

export default function MedicalServices() {
  const medicalServices = [
    {
      id: 1,
      title: "Vaccination Services",
      description: "Complete vaccination protocols for all pets including core vaccines and boosters",
      icon: Shield,
      features: ["Core Vaccines", "Booster Shots", "Rabies Vaccination", "Health Certificates"],
      price: "From $45",
      popular: true,
      color: "text-blue-600",
      bgColor: "bg-blue-50",
    },
    {
      id: 2,
      title: "Preventive Medicine",
      description: "Comprehensive preventive care including flea, tick, and heartworm prevention",
      icon: Pill,
      features: ["Flea & Tick Control", "Heartworm Prevention", "Deworming", "Nutritional Supplements"],
      price: "From $35",
      popular: false,
      color: "text-green-600",
      bgColor: "bg-green-50",
    },
    {
      id: 3,
      title: "Emergency Care",
      description: "24/7 emergency medical services for critical situations",
      icon: Heart,
      features: ["Emergency Surgery", "Critical Care", "Trauma Treatment", "Pain Management"],
      price: "From $150",
      popular: false,
      color: "text-red-600",
      bgColor: "bg-red-50",
    },
    {
      id: 4,
      title: "Specialized Treatments",
      description: "Advanced medical treatments and specialized care for complex conditions",
      icon: Syringe,
      features: ["Chemotherapy", "Dermatology", "Cardiology", "Orthopedic Care"],
      price: "From $200",
      popular: false,
      color: "text-purple-600",
      bgColor: "bg-purple-50",
    },
  ];

  return (
    <div className="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
      <div className="max-w-7xl mx-auto px-4">
        <motion.div
          className="text-center mb-16"
          initial="initial"
          whileInView="animate"
          viewport={{ once: true }}
          variants={staggerContainer}
        >
          <motion.h2
            className="text-4xl font-bold text-gray-800 mb-4"
            variants={fadeInUp}
          >
            Professional Medical Care
          </motion.h2>
          <motion.p
            className="text-xl text-gray-600 mb-8"
            variants={fadeInUp}
          >
            Comprehensive veterinary services to keep your pets healthy and happy
          </motion.p>
          <motion.div
            className="flex justify-center items-center space-x-2 text-primary"
            variants={fadeInUp}
          >
            <Star className="w-5 h-5 fill-current" />
            <span className="font-semibold">Licensed Veterinarians</span>
            <Star className="w-5 h-5 fill-current" />
          </motion.div>
        </motion.div>

        <motion.div
          className="grid md:grid-cols-2 lg:grid-cols-4 gap-6"
          initial="initial"
          whileInView="animate"
          viewport={{ once: true }}
          variants={staggerContainer}
        >
          {medicalServices.map((service, index) => (
            <motion.div key={service.id} variants={fadeInUp}>
              <Card className={`relative h-full border-0 shadow-lg hover:shadow-xl transition-all duration-300 ${service.popular ? 'ring-2 ring-primary' : ''}`}>
                {service.popular && (
                  <Badge className="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-primary text-white">
                    Most Popular
                  </Badge>
                )}
                
                <CardHeader className="text-center pb-4">
                  <div className={`w-16 h-16 ${service.bgColor} rounded-full flex items-center justify-center mx-auto mb-4`}>
                    <service.icon className={`w-8 h-8 ${service.color}`} />
                  </div>
                  <CardTitle className="text-xl font-bold text-gray-800">
                    {service.title}
                  </CardTitle>
                  <CardDescription className="text-gray-600">
                    {service.description}
                  </CardDescription>
                </CardHeader>

                <CardContent className="pt-0">
                  <div className="space-y-3 mb-6">
                    {service.features.map((feature, featureIndex) => (
                      <div key={featureIndex} className="flex items-center space-x-2">
                        <CheckCircle className="w-4 h-4 text-green-500 flex-shrink-0" />
                        <span className="text-sm text-gray-700">{feature}</span>
                      </div>
                    ))}
                  </div>

                  <div className="text-center">
                    <div className="text-2xl font-bold text-primary mb-3">
                      {service.price}
                    </div>
                    <Button className="w-full" variant={service.popular ? "default" : "outline"}>
                      Book Appointment
                    </Button>
                  </div>
                </CardContent>
              </Card>
            </motion.div>
          ))}
        </motion.div>

        <motion.div
          className="text-center mt-12"
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ delay: 0.5 }}
        >
          <Button variant="secondary" size="lg">
            View All Services
          </Button>
        </motion.div>
      </div>
    </div>
  );
}
