import { motion } from "framer-motion";
import { Heart } from "lucide-react";
import { useEffect, useState } from "react";

interface PawPrint {
  id: number;
  x: number;
  y: number;
  delay: number;
}

export default function FloatingPaws() {
  const [pawPrints, setPawPrints] = useState<PawPrint[]>([]);

  useEffect(() => {
    const paws: PawPrint[] = [
      { id: 1, x: 10, y: 20, delay: 0 },
      { id: 2, x: 85, y: 60, delay: 1 },
      { id: 3, x: 20, y: 80, delay: 2 },
      { id: 4, x: 70, y: 30, delay: 1.5 },
      { id: 5, x: 40, y: 50, delay: 0.8 },
    ];
    setPawPrints(paws);
  }, []);

  return (
    <div className="absolute inset-0 pointer-events-none z-10">
      {pawPrints.map((paw) => (
        <motion.div
          key={paw.id}
          className="absolute"
          style={{
            left: `${paw.x}%`,
            top: `${paw.y}%`,
          }}
          animate={{
            y: [0, -15, 0],
            rotate: [0, 5, 0],
            opacity: [0.2, 0.4, 0.2],
          }}
          transition={{
            duration: 3,
            ease: "easeInOut",
            repeat: Infinity,
            delay: paw.delay,
          }}
        >
          <Heart className="text-white text-xl fill-white opacity-30" />
        </motion.div>
      ))}
    </div>
  );
}
