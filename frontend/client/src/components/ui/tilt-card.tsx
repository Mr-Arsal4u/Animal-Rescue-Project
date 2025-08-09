import { ReactNode, useRef, useState } from "react";
import { motion } from "framer-motion";

interface TiltCardProps {
  children: ReactNode;
  className?: string;
  tiltMaxAngle?: number;
  scale?: number;
}

export default function TiltCard({
  children,
  className = "",
  tiltMaxAngle = 15,
  scale = 1.05,
}: TiltCardProps) {
  const ref = useRef<HTMLDivElement>(null);
  const [isHovered, setIsHovered] = useState(false);

  const handleMouseMove = (e: React.MouseEvent<HTMLDivElement>) => {
    if (!ref.current) return;

    const rect = ref.current.getBoundingClientRect();
    const x = (e.clientX - rect.left) / rect.width;
    const y = (e.clientY - rect.top) / rect.height;

    const rotateY = (x - 0.5) * tiltMaxAngle;
    const rotateX = (0.5 - y) * tiltMaxAngle;

    if (ref.current) {
      ref.current.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(${scale})`;
    }
  };

  const handleMouseLeave = () => {
    setIsHovered(false);
    if (ref.current) {
      ref.current.style.transform = "perspective(1000px) rotateX(0deg) rotateY(0deg) scale(1)";
    }
  };

  return (
    <motion.div
      ref={ref}
      className={`transition-transform duration-300 ease-out ${className}`}
      onMouseMove={handleMouseMove}
      onMouseEnter={() => setIsHovered(true)}
      onMouseLeave={handleMouseLeave}
      style={{ transformStyle: "preserve-3d" }}
    >
      {children}
    </motion.div>
  );
}
