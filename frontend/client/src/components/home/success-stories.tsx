import { motion } from "framer-motion";
import { Heart, Star, ArrowRight, Calendar, MapPin, Users } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Badge } from "@/components/ui/badge";
import { fadeInUp, staggerContainer } from "@/lib/animations";

export default function SuccessStories() {
  const successStories = [
    {
      id: 1,
      name: "Luna's Journey",
      type: "Dog",
      breed: "Golden Retriever",
      beforeImage: "/images/luna-before.jpg",
      afterImage: "/images/luna-after.jpg",
      story: "Luna was found severely injured and malnourished. After months of intensive care and rehabilitation, she made a full recovery and found her forever home with the Johnson family.",
      timeline: "6 months",
      location: "Downtown Rescue",
      adoptedBy: "The Johnson Family",
      date: "March 2024",
      stats: ["Full Recovery", "Happy Home", "Loving Family"],
      featured: true,
    },
    {
      id: 2,
      name: "Max's Transformation",
      type: "Cat",
      breed: "Domestic Shorthair",
      beforeImage: "/images/max-before.jpg",
      afterImage: "/images/max-after.jpg",
      story: "Max was rescued from a hoarding situation with severe health issues. Our medical team performed multiple surgeries and provided ongoing care until he was healthy enough for adoption.",
      timeline: "4 months",
      location: "Emergency Rescue",
      adoptedBy: "Sarah & Mike",
      date: "January 2024",
      stats: ["Multiple Surgeries", "Complete Recovery", "New Life"],
      featured: false,
    },
    {
      id: 3,
      name: "Buddy's Second Chance",
      type: "Dog",
      breed: "Mixed Breed",
      beforeImage: "/images/buddy-before.jpg",
      afterImage: "/images/buddy-after.jpg",
      story: "Buddy was hit by a car and left for dead. Our emergency team rushed him to surgery and after weeks of rehabilitation, he regained full mobility and found a loving home.",
      timeline: "3 months",
      location: "Emergency Response",
      adoptedBy: "The Martinez Family",
      date: "February 2024",
      stats: ["Emergency Surgery", "Full Mobility", "Active Life"],
      featured: false,
    },
  ];

  const statistics = [
    {
      number: "500+",
      label: "Animals Rescued",
      icon: Heart,
      color: "text-red-500",
    },
    {
      number: "98%",
      label: "Success Rate",
      icon: Star,
      color: "text-yellow-500",
    },
    {
      number: "300+",
      label: "Happy Adoptions",
      icon: Users,
      color: "text-green-500",
    },
    {
      number: "24/7",
      label: "Emergency Care",
      icon: Calendar,
      color: "text-blue-500",
    },
  ];

  return (
    <div className="py-20 bg-gradient-to-br from-orange-50 to-amber-50">
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
            Success Stories
          </motion.h2>
          <motion.p
            className="text-xl text-gray-600 mb-8"
            variants={fadeInUp}
          >
            Real transformations that show the power of love, care, and dedication
          </motion.p>
        </motion.div>

        {/* Statistics */}
        <motion.div
          className="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16"
          initial="initial"
          whileInView="animate"
          viewport={{ once: true }}
          variants={staggerContainer}
        >
          {statistics.map((stat, index) => (
            <motion.div key={index} variants={fadeInUp} className="text-center">
              <div className={`w-16 h-16 mx-auto mb-4 rounded-full bg-white shadow-lg flex items-center justify-center`}>
                <stat.icon className={`w-8 h-8 ${stat.color}`} />
              </div>
              <div className="text-3xl font-bold text-gray-800 mb-2">{stat.number}</div>
              <div className="text-gray-600 font-medium">{stat.label}</div>
            </motion.div>
          ))}
        </motion.div>

        {/* Success Stories */}
        <motion.div
          className="space-y-12"
          initial="initial"
          whileInView="animate"
          viewport={{ once: true }}
          variants={staggerContainer}
        >
          {successStories.map((story, index) => (
            <motion.div key={story.id} variants={fadeInUp}>
              <Card className={`border-0 shadow-lg overflow-hidden ${story.featured ? 'ring-2 ring-primary' : ''}`}>
                {story.featured && (
                  <Badge className="absolute top-4 left-4 bg-primary text-white z-10">
                    Featured Story
                  </Badge>
                )}
                
                <div className="md:flex">
                  {/* Before/After Images */}
                  <div className="md:w-1/2 relative">
                    <div className="grid grid-cols-2 gap-2 p-6">
                      <div className="space-y-2">
                        <div className="text-center text-sm font-semibold text-gray-600">Before</div>
                        <div className="w-full h-48 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center">
                          <Heart className="w-12 h-12 text-gray-400" />
                        </div>
                      </div>
                      <div className="space-y-2">
                        <div className="text-center text-sm font-semibold text-gray-600">After</div>
                        <div className="w-full h-48 bg-gradient-to-br from-green-200 to-blue-200 rounded-lg flex items-center justify-center">
                          <Heart className="w-12 h-12 text-green-500" />
                        </div>
                      </div>
                    </div>
                  </div>

                  {/* Story Content */}
                  <div className="md:w-1/2 p-6">
                    <div className="mb-4">
                      <h3 className="text-2xl font-bold text-gray-800 mb-2">
                        {story.name}'s Journey
                      </h3>
                      <div className="flex items-center space-x-4 text-sm text-gray-600 mb-3">
                        <span className="font-semibold">{story.breed}</span>
                        <span>•</span>
                        <span>{story.type}</span>
                      </div>
                    </div>

                    <p className="text-gray-700 mb-6 leading-relaxed">
                      {story.story}
                    </p>

                    <div className="space-y-3 mb-6">
                      {story.stats.map((stat, statIndex) => (
                        <div key={statIndex} className="flex items-center space-x-2">
                          <div className="w-2 h-2 bg-primary rounded-full"></div>
                          <span className="text-sm text-gray-700 font-medium">{stat}</span>
                        </div>
                      ))}
                    </div>

                    <div className="grid grid-cols-2 gap-4 text-sm mb-6">
                      <div className="flex items-center space-x-2">
                        <Calendar className="w-4 h-4 text-gray-400" />
                        <span className="text-gray-600">Timeline: {story.timeline}</span>
                      </div>
                      <div className="flex items-center space-x-2">
                        <MapPin className="w-4 h-4 text-gray-400" />
                        <span className="text-gray-600">{story.location}</span>
                      </div>
                    </div>

                    <div className="border-t pt-4">
                      <div className="text-sm text-gray-600 mb-2">
                        Adopted by <span className="font-semibold text-gray-800">{story.adoptedBy}</span>
                      </div>
                      <div className="text-sm text-gray-500">
                        {story.date}
                      </div>
                    </div>
                  </div>
                </div>
              </Card>
            </motion.div>
          ))}
        </motion.div>

        {/* Call to Action */}
        <motion.div
          className="text-center mt-16"
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ delay: 0.5 }}
        >
          <div className="bg-white rounded-2xl shadow-lg p-8 max-w-2xl mx-auto">
            <h3 className="text-2xl font-bold text-gray-800 mb-4">
              Be Part of the Next Success Story
            </h3>
            <p className="text-gray-600 mb-6">
              Your support helps us rescue, rehabilitate, and rehome more animals in need. 
              Every donation, volunteer hour, and adoption makes a difference.
            </p>
            <div className="flex flex-col sm:flex-row gap-4 justify-center">
              <Button size="lg">
                <Heart className="w-4 h-4 mr-2" />
                Adopt Today
              </Button>
              <Button variant="outline" size="lg">
                <ArrowRight className="w-4 h-4 mr-2" />
                View More Stories
              </Button>
            </div>
          </div>
        </motion.div>
      </div>
    </div>
  );
}
