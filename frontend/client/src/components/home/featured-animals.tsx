import { motion } from "framer-motion";
import { Heart, ArrowRight } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Link } from "wouter";
import TiltCard from "@/components/ui/tilt-card";
import { mockAnimals } from "@/data/animals";
import { fadeInUp, staggerContainer } from "@/lib/animations";

export default function FeaturedAnimals() {
  const featuredAnimals = mockAnimals.slice(0, 3);

  return (
    <div className="py-20 bg-white">
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
            Meet Our Featured Friends
          </motion.h2>
          <motion.p
            className="text-xl text-gray-600"
            variants={fadeInUp}
          >
            These amazing animals are looking for their forever homes
          </motion.p>
        </motion.div>

        <motion.div
          className="grid md:grid-cols-3 gap-8"
          initial="initial"
          whileInView="animate"
          viewport={{ once: true }}
          variants={staggerContainer}
        >
          {featuredAnimals.map((animal, index) => (
            <motion.div key={animal.id} variants={fadeInUp}>
              <TiltCard className="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 group">
                <img
                  src={animal.imageUrl}
                  alt={`${animal.name} - ${animal.breed}`}
                  className="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                />

                <div className="p-6">
                  <h3 className="text-2xl font-bold text-gray-800 mb-2">
                    {animal.name}
                  </h3>
                  <p className="text-gray-600 mb-3">
                    {animal.breed} • {animal.age}
                  </p>
                  <p className="text-gray-700 mb-4">{animal.description}</p>

                  <Button
                    className="w-full animate-pulse-soft hover:animate-none group"
                    asChild
                  >
                    <Link href="/animals">
                      <Heart className="w-4 h-4 mr-2 group-hover:scale-110 transition-transform" />
                      Meet Me!
                    </Link>
                  </Button>
                </div>
              </TiltCard>
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
          <Button variant="secondary" size="lg" asChild>
            <Link href="/animals">
              View All Animals
              <ArrowRight className="w-4 h-4 ml-2" />
            </Link>
          </Button>
        </motion.div>
      </div>
    </div>
  );
}
