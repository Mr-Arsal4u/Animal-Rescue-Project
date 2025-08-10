import { motion } from "framer-motion";
import { User, Award, Clock, Heart, Stethoscope, Shield } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import { fadeInUp, staggerContainer } from "@/lib/animations";

export default function MedicalTeam() {
    const medicalTeam = [
        {
            id: 1,
            name: "Dr. Sarah Johnson",
            specialization: "Veterinary Surgery",
            experience: "8+ years",
            image: "/images/sarah.jpg",
            operation: "Orthopedic Surgery",
            description: "Performing complex orthopedic procedures to restore mobility in injured animals",
            achievements: ["Board Certified", "500+ Surgeries", "Emergency Specialist"],
            status: "active",
        },
        {
            id: 2,
            name: "Dr. Michael Chen",
            specialization: "Emergency Medicine",
            experience: "6+ years",
            image: "/images/micheal.jpg",
            operation: "Emergency Trauma Care",
            description: "Providing critical care and emergency treatment for animals in life-threatening situations",
            achievements: ["Critical Care Certified", "24/7 Emergency", "Trauma Expert"],
            status: "active",
        },
        {
            id: 3,
            name: "Dr. Emily Rodriguez",
            specialization: "General Practice",
            experience: "5+ years",
            image: "/images/emily.jpg",
            operation: "Preventive Care",
            description: "Comprehensive wellness exams and preventive medicine for all types of pets",
            achievements: ["Preventive Specialist", "Nutrition Expert", "Behavioral Medicine"],
            status: "active",
        },
    ];

    const operations = [
        {
            id: 1,
            title: "Surgical Procedures",
            image: "/images/surgery-room.svg",
            description: "State-of-the-art surgical suite equipped for complex procedures",
            stats: ["500+ Surgeries", "98% Success Rate", "24/7 Availability"],
        },
        {
            id: 2,
            title: "Emergency Care",
            image: "/images/emergency-care.svg",
            description: "Round-the-clock emergency services for critical situations",
            stats: ["24/7 Emergency", "Rapid Response", "Critical Care Unit"],
        },
        {
            id: 3,
            title: "Diagnostic Imaging",
            image: "/images/diagnostic-imaging.svg",
            description: "Advanced imaging technology for accurate diagnosis and treatment",
            stats: ["X-Ray", "Ultrasound", "Digital Imaging"],
        },
    ];

    return (
        <div className="py-20 bg-white">
            <div className="max-w-7xl mx-auto px-4">
                {/* Medical Team Section */}
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
                        Our Expert Medical Team
                    </motion.h2>
                    <motion.p
                        className="text-xl text-gray-600 mb-8"
                        variants={fadeInUp}
                    >
                        Dedicated veterinarians committed to providing the highest quality care
                    </motion.p>
                </motion.div>

                <motion.div
                    className="grid md:grid-cols-3 gap-8 mb-20"
                    initial="initial"
                    whileInView="animate"
                    viewport={{ once: true }}
                    variants={staggerContainer}
                >
                    {medicalTeam.map((doctor, index) => (
                        <motion.div key={doctor.id} variants={fadeInUp}>
                            <Card className="border-0 shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                                <div className="relative">
                                    <div className="w-full h-64 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center overflow-hidden relative">
                                        {/* Doctor's Image */}
                                        <img
                                            src={doctor.image}
                                            alt={doctor.name}
                                            className="absolute w-full h-full object-cover"
                                            onError={(e) => {
                                                e.currentTarget.style.display = 'none';
                                            }}
                                        />
                                        {/* Fallback User Icon */}
                                        <User className="w-24 h-24 text-gray-400" />
                                    </div>
                                    <Badge className="absolute top-4 right-4 bg-green-500 text-white">
                                        {doctor.status === 'active' ? 'Available' : 'Off Duty'}
                                    </Badge>
                                </div>

                                <CardHeader className="text-center">
                                    <CardTitle className="text-xl font-bold text-gray-800">
                                        {doctor.name}
                                    </CardTitle>
                                    <CardDescription className="text-primary font-semibold">
                                        {doctor.specialization}
                                    </CardDescription>
                                </CardHeader>

                                <CardContent className="pt-0">
                                    <div className="space-y-4">
                                        <div className="flex items-center justify-center space-x-4 text-sm text-gray-600">
                                            <div className="flex items-center space-x-1">
                                                <Clock className="w-4 h-4" />
                                                <span>{doctor.experience}</span>
                                            </div>
                                            <div className="flex items-center space-x-1">
                                                <Award className="w-4 h-4" />
                                                <span>Expert</span>
                                            </div>
                                        </div>

                                        <div className="text-center">
                                            <h4 className="font-semibold text-gray-800 mb-2">
                                                {doctor.operation}
                                            </h4>
                                            <p className="text-sm text-gray-600 mb-4">
                                                {doctor.description}
                                            </p>
                                        </div>

                                        <div className="space-y-2">
                                            {doctor.achievements.map((achievement, achievementIndex) => (
                                                <div key={achievementIndex} className="flex items-center space-x-2">
                                                    <Shield className="w-4 h-4 text-primary flex-shrink-0" />
                                                    <span className="text-sm text-gray-700">{achievement}</span>
                                                </div>
                                            ))}
                                        </div>

                                        <Button className="w-full mt-4" variant="outline">
                                            <Stethoscope className="w-4 h-4 mr-2" />
                                            Book Consultation
                                        </Button>
                                    </div>
                                </CardContent>
                            </Card>
                        </motion.div>
                    ))}
                </motion.div>

                {/* Operations Section */}
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
                        State-of-the-Art Facilities
                    </motion.h2>
                    <motion.p
                        className="text-xl text-gray-600"
                        variants={fadeInUp}
                    >
                        Advanced medical equipment and facilities for comprehensive care
                    </motion.p>
                </motion.div>

                <motion.div
                    className="grid md:grid-cols-3 gap-8"
                    initial="initial"
                    whileInView="animate"
                    viewport={{ once: true }}
                    variants={staggerContainer}
                >
                    {operations.map((operation, index) => (
                        <motion.div key={operation.id} variants={fadeInUp}>
                            <Card className="border-0 shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                                <div className="relative overflow-hidden">
                                    <div className="w-full h-48 bg-gradient-to-br from-gray-100 to-blue-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                                        <img
                                            src={operation.image}
                                            alt={operation.title}
                                            className="w-16 h-16 text-gray-400"
                                            onError={(e) => {
                                                e.currentTarget.style.display = 'none';
                                                e.currentTarget.nextElementSibling.style.display = 'block';
                                            }}
                                        />
                                        <Heart className="w-16 h-16 text-gray-400 hidden" />
                                    </div>
                                </div>

                                <CardHeader>
                                    <CardTitle className="text-xl font-bold text-gray-800">
                                        {operation.title}
                                    </CardTitle>
                                    <CardDescription className="text-gray-600">
                                        {operation.description}
                                    </CardDescription>
                                </CardHeader>

                                <CardContent className="pt-0">
                                    <div className="space-y-3">
                                        {operation.stats.map((stat, statIndex) => (
                                            <div key={statIndex} className="flex items-center space-x-2">
                                                <div className="w-2 h-2 bg-primary rounded-full"></div>
                                                <span className="text-sm text-gray-700 font-medium">{stat}</span>
                                            </div>
                                        ))}
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
                        Meet Our Full Team
                    </Button>
                </motion.div>
            </div>
        </div>
    );
}
