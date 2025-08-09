import { motion } from "framer-motion";
import { Heart } from "lucide-react";
import { Button } from "@/components/ui/button";
import BeforeAfterSlider from "@/components/stories/before-after-slider";
import StoryCard from "@/components/stories/story-card";
import { mockStories } from "@/data/stories";
import { fadeInUp, staggerContainer } from "@/lib/animations";

export default function Stories() {
  return (
    <div className="min-h-screen pt-16 bg-white">
      <div className="max-w-7xl mx-auto px-4 py-20">
        <motion.div
          className="text-center mb-16"
          initial="initial"
          animate="animate"
          variants={staggerContainer}
        >
          <motion.h2
            className="text-4xl font-bold text-gray-800 mb-4"
            variants={fadeInUp}
          >
            Rescue Stories
          </motion.h2>
          <motion.p
            className="text-xl text-gray-600"
            variants={fadeInUp}
          >
            Witness the incredible transformations that love can make
          </motion.p>
        </motion.div>

        <BeforeAfterSlider />

        <motion.div
          className="grid md:grid-cols-2 lg:grid-cols-3 gap-8"
          initial="initial"
          whileInView="animate"
          viewport={{ once: true }}
          variants={staggerContainer}
        >
          {mockStories.map((story, index) => (
            <StoryCard
              key={story.id}
              story={{
                id: story.id!,
                title: story.title!,
                excerpt: story.excerpt!,
                adopter: story.adopter!,
                animalName: story.animalName!,
                imageUrl: story.imageUrl!,
                adoptedDate: story.adoptedDate!,
              }}
              delay={index * 0.2}
            />
          ))}
        </motion.div>

        <motion.div
          className="text-center mt-12"
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true }}
          transition={{ delay: 0.5 }}
        >
          <Button className="hover:scale-105 transition-transform" size="lg">
            Read More Stories
            <Heart className="w-4 h-4 ml-2" />
          </Button>
        </motion.div>
      </div>
    </div>
  );
}
