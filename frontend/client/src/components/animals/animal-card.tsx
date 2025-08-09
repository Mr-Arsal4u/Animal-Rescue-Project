import { useState } from "react";
import { motion, AnimatePresence } from "framer-motion";
import TiltCard from "@/components/ui/tilt-card";
import { Button } from "@/components/ui/button";
import { Heart } from "lucide-react";

interface AnimalCardProps {
  animal: {
    id: string;
    name: string;
    breed: string;
    age: string;
    size: string;
    energy: string;
    description: string;
    bio: string;
    imageUrl: string;
    type: string;
  };
}

export default function AnimalCard({ animal }: AnimalCardProps) {
  const [isFlipped, setIsFlipped] = useState(false);

  return (
    <TiltCard className="h-96 perspective-1000">
      <motion.div
        className="relative w-full h-full transition-transform duration-600 cursor-pointer"
        style={{ transformStyle: "preserve-3d" }}
        animate={{ rotateY: isFlipped ? 180 : 0 }}
        onClick={() => setIsFlipped(!isFlipped)}
      >
        {/* Front */}
        <div className="absolute inset-0 w-full h-full backface-hidden rounded-2xl overflow-hidden shadow-lg">
          <img
            src={animal.imageUrl}
            alt={`${animal.name} - ${animal.breed}`}
            className="w-full h-full object-cover"
          />
          <div className="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent" />
          <div className="absolute bottom-4 left-4 text-white">
            <h3 className="text-2xl font-bold">{animal.name}</h3>
            <p className="text-sm opacity-90">{animal.breed}</p>
          </div>
        </div>

        {/* Back */}
        <div
          className="absolute inset-0 w-full h-full backface-hidden rounded-2xl bg-white p-6 shadow-lg flex flex-col justify-between"
          style={{ transform: "rotateY(180deg)" }}
        >
          <div>
            <h3 className="text-2xl font-bold text-gray-800 mb-3">
              {animal.name}
            </h3>
            <div className="space-y-2 text-gray-600 mb-4">
              <p>
                <strong>Age:</strong> {animal.age}
              </p>
              <p>
                <strong>Size:</strong> {animal.size}
              </p>
              <p>
                <strong>Energy:</strong> {animal.energy}
              </p>
            </div>
            <p className="text-gray-700 text-sm">{animal.bio}</p>
          </div>

          <Button className="group hover:scale-105 transition-transform">
            <motion.span
              className="mr-2"
              animate={{ scale: [1, 1.2, 1] }}
              transition={{ duration: 0.5, repeat: Infinity, repeatDelay: 2 }}
            >
              {animal.type === "dog" ? "🐕" : "🐱"}
            </motion.span>
            Adopt {animal.name}
          </Button>
        </div>
      </motion.div>
    </TiltCard>
  );
}
