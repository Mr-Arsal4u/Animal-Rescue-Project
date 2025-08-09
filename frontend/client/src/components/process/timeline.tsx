import { motion } from "framer-motion";
import { Search, FileText, Handshake, Home } from "lucide-react";
import { useIntersectionObserver } from "@/hooks/use-intersection-observer";

const steps = [
  {
    id: 1,
    icon: Search,
    title: "Browse & Connect",
    description: "Explore our available animals and find the perfect match for your lifestyle and family.",
    color: "bg-primary",
  },
  {
    id: 2,
    icon: FileText,
    title: "Submit Application",
    description: "Fill out our comprehensive adoption application to help us understand your preferences and living situation.",
    color: "bg-primary",
  },
  {
    id: 3,
    icon: Handshake,
    title: "Meet & Greet",
    description: "Visit our facility to meet your potential new companion and see if it's a perfect match.",
    color: "bg-primary",
  },
  {
    id: 4,
    icon: Home,
    title: "Welcome Home!",
    description: "Complete the adoption paperwork and take your new family member home to start your journey together.",
    color: "bg-success",
  },
];

export default function Timeline() {
  const { ref, isIntersecting } = useIntersectionObserver();

  return (
    <div ref={ref} className="mb-20">
      <div className="relative max-w-4xl mx-auto">
        {/* Timeline Line */}
        <div className="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gray-300">
          <motion.div
            className="h-full w-full bg-primary"
            initial={{ scaleY: 0 }}
            animate={isIntersecting ? { scaleY: 1 } : { scaleY: 0 }}
            transition={{ duration: 3, ease: "easeInOut" }}
            style={{ transformOrigin: "top" }}
          />
        </div>

        {/* Timeline Steps */}
        <div className="space-y-16">
          {steps.map((step, index) => {
            const Icon = step.icon;
            const isLeft = index % 2 === 0;

            return (
              <motion.div
                key={step.id}
                className="flex items-center relative"
                initial={{ opacity: 0, x: isLeft ? -100 : 100 }}
                animate={
                  isIntersecting
                    ? { opacity: 1, x: 0 }
                    : { opacity: 0, x: isLeft ? -100 : 100 }
                }
                transition={{ delay: index * 0.5, duration: 0.8 }}
              >
                {isLeft ? (
                  <>
                    <div className="flex-1 text-right pr-8">
                      <div className="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <h3 className="text-xl font-bold text-gray-800 mb-2">
                          {step.id}. {step.title}
                        </h3>
                        <p className="text-gray-600">{step.description}</p>
                      </div>
                    </div>
                    <motion.div
                      className={`w-16 h-16 ${step.color} rounded-full flex items-center justify-center text-white text-2xl z-10 cursor-pointer`}
                      whileHover={{ scale: 1.1 }}
                      whileTap={{ scale: 0.95 }}
                    >
                      <Icon className="w-6 h-6" />
                    </motion.div>
                    <div className="flex-1 pl-8"></div>
                  </>
                ) : (
                  <>
                    <div className="flex-1 pr-8"></div>
                    <motion.div
                      className={`w-16 h-16 ${step.color} rounded-full flex items-center justify-center text-white text-2xl z-10 cursor-pointer`}
                      whileHover={{ scale: 1.1 }}
                      whileTap={{ scale: 0.95 }}
                    >
                      <Icon className="w-6 h-6" />
                    </motion.div>
                    <div className="flex-1 text-left pl-8">
                      <div className="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <h3 className="text-xl font-bold text-gray-800 mb-2">
                          {step.id}. {step.title}
                        </h3>
                        <p className="text-gray-600">{step.description}</p>
                      </div>
                    </div>
                  </>
                )}
              </motion.div>
            );
          })}
        </div>
      </div>
    </div>
  );
}
