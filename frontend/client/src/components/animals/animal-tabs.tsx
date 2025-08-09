import { motion } from "framer-motion";
import { Dog, Cat } from "lucide-react";

interface AnimalTabsProps {
  activeTab: "dog" | "cat";
  onTabChange: (tab: "dog" | "cat") => void;
}

export default function AnimalTabs({ activeTab, onTabChange }: AnimalTabsProps) {
  return (
    <div className="flex justify-center mb-12">
      <div className="bg-white rounded-full p-2 shadow-lg">
        <div className="flex space-x-2 relative">
          <motion.div
            className="absolute inset-y-1 bg-primary rounded-full"
            initial={false}
            animate={{
              x: activeTab === "dog" ? 4 : "calc(100% + 4px)",
              width: activeTab === "dog" ? "calc(50% - 4px)" : "calc(50% - 4px)",
            }}
            transition={{ type: "spring", stiffness: 300, damping: 30 }}
          />
          
          <button
            className={`relative z-10 px-8 py-3 rounded-full font-semibold transition-colors duration-300 ${
              activeTab === "dog" ? "text-white" : "text-gray-600 hover:text-primary"
            }`}
            onClick={() => onTabChange("dog")}
          >
            <Dog className="w-4 h-4 mr-2 inline" />
            Dogs
          </button>
          
          <button
            className={`relative z-10 px-8 py-3 rounded-full font-semibold transition-colors duration-300 ${
              activeTab === "cat" ? "text-white" : "text-gray-600 hover:text-primary"
            }`}
            onClick={() => onTabChange("cat")}
          >
            <Cat className="w-4 h-4 mr-2 inline" />
            Cats
          </button>
        </div>
      </div>
    </div>
  );
}
