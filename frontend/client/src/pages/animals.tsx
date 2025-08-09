import { useState } from "react";
import { motion, AnimatePresence } from "framer-motion";
import { Heart, Loader2 } from "lucide-react";
import { Button } from "@/components/ui/button";
import AnimalTabs from "@/components/animals/animal-tabs";
import AnimalCard from "@/components/animals/animal-card";
import { mockAnimals } from "@/data/animals";
import { fadeInUp, staggerContainer } from "@/lib/animations";

export default function Animals() {
  const [activeTab, setActiveTab] = useState<"dog" | "cat">("dog");
  const [loadingMore, setLoadingMore] = useState(false);

  const filteredAnimals = mockAnimals.filter(animal => animal.type === activeTab);

  const handleLoadMore = async () => {
    setLoadingMore(true);
    // Simulate loading more animals
    await new Promise(resolve => setTimeout(resolve, 1500));
    setLoadingMore(false);
  };

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
            Our Amazing Animals
          </motion.h2>
          <motion.p
            className="text-xl text-gray-600"
            variants={fadeInUp}
          >
            Find your perfect companion from our loving rescue family
          </motion.p>
        </motion.div>

        <AnimalTabs activeTab={activeTab} onTabChange={setActiveTab} />

        <AnimatePresence mode="wait">
          <motion.div
            key={activeTab}
            className="grid md:grid-cols-2 lg:grid-cols-3 gap-8"
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            exit={{ opacity: 0, y: -20 }}
            transition={{ duration: 0.3 }}
          >
            {filteredAnimals.map((animal) => (
              <AnimalCard
                key={animal.id}
                animal={{
                  id: animal.id!,
                  name: animal.name!,
                  breed: animal.breed!,
                  age: animal.age!,
                  size: animal.size!,
                  energy: animal.energy!,
                  description: animal.description!,
                  bio: animal.bio!,
                  imageUrl: animal.imageUrl!,
                  type: animal.type!,
                }}
              />
            ))}

            {/* Loading Placeholder */}
            {loadingMore && (
              <div className="flex items-center justify-center h-96 bg-white rounded-2xl shadow-lg">
                <div className="text-center text-gray-400">
                  <Loader2 className="w-8 h-8 animate-spin mx-auto mb-4" />
                  <p>Loading more friends...</p>
                </div>
              </div>
            )}
          </motion.div>
        </AnimatePresence>

        <div className="text-center mt-12">
          <Button
            variant="secondary"
            size="lg"
            onClick={handleLoadMore}
            disabled={loadingMore}
          >
            {loadingMore ? (
              <>
                <Loader2 className="w-4 h-4 mr-2 animate-spin" />
                Loading...
              </>
            ) : (
              <>
                Load More Animals
                <Heart className="w-4 h-4 ml-2" />
              </>
            )}
          </Button>
        </div>
      </div>
    </div>
  );
}
