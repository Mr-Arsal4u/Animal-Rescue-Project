import { motion } from "framer-motion";
import Timeline from "@/components/process/timeline";
import AdoptionForm from "@/components/process/adoption-form";
import { fadeInUp, staggerContainer } from "@/lib/animations";

export default function Process() {
  return (
    <div className="min-h-screen pt-16 bg-gray-50">
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
            Adoption Process
          </motion.h2>
          <motion.p
            className="text-xl text-gray-600"
            variants={fadeInUp}
          >
            Simple steps to welcome your new best friend home
          </motion.p>
        </motion.div>

        <Timeline />
        <AdoptionForm />
      </div>
    </div>
  );
}
