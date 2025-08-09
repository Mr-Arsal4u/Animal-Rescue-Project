import { Variants } from "framer-motion";

export const fadeInUp: Variants = {
  initial: {
    opacity: 0,
    y: 30,
  },
  animate: {
    opacity: 1,
    y: 0,
    transition: {
      duration: 0.8,
      ease: "easeOut",
    },
  },
};

export const staggerContainer: Variants = {
  animate: {
    transition: {
      staggerChildren: 0.1,
    },
  },
};

export const floatingPaw: Variants = {
  animate: {
    y: [0, -10, 0],
    rotate: [0, 5, 0],
    transition: {
      duration: 3,
      ease: "easeInOut",
      repeat: Infinity,
    },
  },
};

export const flipCard: Variants = {
  initial: {
    rotateY: 0,
  },
  hover: {
    rotateY: 180,
    transition: {
      duration: 0.6,
      ease: "easeInOut",
    },
  },
};

export const slideInFromLeft: Variants = {
  initial: {
    x: -100,
    opacity: 0,
  },
  animate: {
    x: 0,
    opacity: 1,
    transition: {
      duration: 0.8,
      ease: "easeOut",
    },
  },
};

export const slideInFromRight: Variants = {
  initial: {
    x: 100,
    opacity: 0,
  },
  animate: {
    x: 0,
    opacity: 1,
    transition: {
      duration: 0.8,
      ease: "easeOut",
    },
  },
};

export const counterUp: Variants = {
  initial: {
    scale: 0,
    opacity: 0,
  },
  animate: {
    scale: 1,
    opacity: 1,
    transition: {
      duration: 2,
      ease: "easeOut",
    },
  },
};

export const confettiAnimation: Variants = {
  initial: {
    scale: 0,
    rotate: 0,
    opacity: 1,
  },
  animate: {
    scale: 1,
    rotate: 180,
    opacity: 0,
    transition: {
      duration: 0.8,
      ease: "easeOut",
    },
  },
};

export const drawLine: Variants = {
  initial: {
    pathLength: 0,
    opacity: 0,
  },
  animate: {
    pathLength: 1,
    opacity: 1,
    transition: {
      duration: 3,
      ease: "easeInOut",
    },
  },
};
