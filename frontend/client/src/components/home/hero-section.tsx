import { motion } from "framer-motion";
import { Button } from "@/components/ui/button";
import { Link } from "wouter";
import FloatingPaws from "./floating-paws";
import RollingCounter from "./rolling-counter";
import { fadeInUp, staggerContainer } from "@/lib/animations";

export default function HeroSection() {
  return (
    <div className="relative h-screen overflow-hidden">
      {/* Video Background Placeholder */}
      <div className="absolute inset-0 z-0">
        <div className="w-full h-full bg-gradient-to-br from-primary via-orange-400 to-yellow-300 flex items-center justify-center">
          <div className="text-center text-white opacity-50">
            <div className="text-6xl mb-4">▶</div>
            <p className="text-sm">Video Background: Happy rescued animals playing</p>
          </div>
        </div>
      </div>

      {/* Floating Paw Prints */}
      <FloatingPaws />

      {/* Hero Content */}
      <div className="relative z-20 h-full flex items-center justify-center text-center text-white">
        <motion.div
          className="max-w-4xl mx-auto px-4"
          variants={staggerContainer}
          initial="initial"
          animate="animate"
        >
          <motion.h1
            className="text-5xl md:text-7xl font-bold mb-6"
            variants={fadeInUp}
          >
            Every Life Deserves Love
          </motion.h1>
          
          <motion.p
            className="text-xl md:text-2xl mb-8 opacity-90"
            variants={fadeInUp}
          >
            Join us in giving abandoned animals a second chance at happiness
          </motion.p>

          {/* Rolling Counter */}
          <motion.div className="mb-8" variants={fadeInUp}>
            <RollingCounter target={500} suffix="+" />
          </motion.div>

          <motion.div className="space-x-4" variants={fadeInUp}>
            <Link href="/animals">
              <Button size="lg" className="text-lg font-semibold">
                Find Your Best Friend
              </Button>
            </Link>
            <Button
              variant="outline"
              size="lg"
              className="text-lg font-semibold border-white text-white hover:bg-white hover:text-primary"
            >
              Volunteer Today
            </Button>
          </motion.div>
        </motion.div>
      </div>
    </div>
  );
}
