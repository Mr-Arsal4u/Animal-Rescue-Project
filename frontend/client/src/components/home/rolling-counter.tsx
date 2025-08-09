import { motion, useMotionValue, useTransform, animate } from "framer-motion";
import { useEffect } from "react";
import { useIntersectionObserver } from "@/hooks/use-intersection-observer";

interface RollingCounterProps {
  target: number;
  suffix?: string;
  prefix?: string;
}

export default function RollingCounter({
  target,
  suffix = "",
  prefix = "",
}: RollingCounterProps) {
  const count = useMotionValue(0);
  const rounded = useTransform(count, (latest) => Math.round(latest));
  const { ref, isIntersecting } = useIntersectionObserver();

  useEffect(() => {
    if (isIntersecting) {
      const controls = animate(count, target, {
        duration: 2,
        ease: "easeOut",
      });

      return controls.stop;
    }
  }, [count, target, isIntersecting]);

  return (
    <motion.div
      ref={ref}
      className="bg-white bg-opacity-20 backdrop-blur-sm rounded-2xl p-6 inline-block"
      initial={{ scale: 0, opacity: 0 }}
      animate={isIntersecting ? { scale: 1, opacity: 1 } : {}}
      transition={{ duration: 0.8, ease: "easeOut", delay: 0.5 }}
    >
      <div className="text-4xl font-bold mb-2">
        {prefix}
        <motion.span>{rounded}</motion.span>
        {suffix}
      </div>
      <div className="text-lg opacity-90">Lives Saved This Year</div>
    </motion.div>
  );
}
