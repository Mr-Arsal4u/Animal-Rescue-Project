import { useState, useRef } from "react";
import { motion } from "framer-motion";
import { ArrowLeftRight } from "lucide-react";

export default function BeforeAfterSlider() {
  const [sliderPosition, setSliderPosition] = useState(50);
  const containerRef = useRef<HTMLDivElement>(null);
  const isDragging = useRef(false);

  const handleMouseDown = () => {
    isDragging.current = true;
  };

  const handleMouseMove = (e: React.MouseEvent) => {
    if (!isDragging.current || !containerRef.current) return;

    const rect = containerRef.current.getBoundingClientRect();
    const x = ((e.clientX - rect.left) / rect.width) * 100;
    setSliderPosition(Math.max(0, Math.min(100, x)));
  };

  const handleMouseUp = () => {
    isDragging.current = false;
  };

  return (
    <div className="mb-20">
      <h3 className="text-2xl font-bold text-center mb-8">Charlie's Transformation</h3>
      <div
        ref={containerRef}
        className="max-w-4xl mx-auto relative bg-gray-200 rounded-2xl overflow-hidden shadow-2xl h-96 md:h-[500px] cursor-ew-resize"
        onMouseMove={handleMouseMove}
        onMouseUp={handleMouseUp}
        onMouseLeave={handleMouseUp}
      >
        {/* Before Image */}
        <img
          src="https://images.unsplash.com/photo-1605568427561-40dd23c2acea?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&h=800"
          alt="Dog before rescue - sad and malnourished"
          className="absolute inset-0 w-full h-full object-cover"
          style={{ filter: "sepia(30%) saturate(70%)" }}
        />

        {/* After Image */}
        <div
          className="absolute inset-0 overflow-hidden"
          style={{
            clipPath: `polygon(${sliderPosition}% 0%, 100% 0%, 100% 100%, ${sliderPosition}% 100%)`,
          }}
        >
          <img
            src="https://images.unsplash.com/photo-1587300003388-59208cc962cb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&h=800"
            alt="Happy dog after rescue - healthy and playful"
            className="w-full h-full object-cover"
          />
        </div>

        {/* Slider Handle */}
        <motion.div
          className="absolute top-0 bottom-0 w-1 bg-white shadow-lg cursor-ew-resize"
          style={{ left: `${sliderPosition}%` }}
          onMouseDown={handleMouseDown}
          whileHover={{ scale: 1.1 }}
          whileTap={{ scale: 0.95 }}
        >
          <div className="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-8 h-8 bg-white rounded-full shadow-lg flex items-center justify-center">
            <ArrowLeftRight className="w-4 h-4 text-gray-600" />
          </div>
        </motion.div>

        {/* Labels */}
        <div className="absolute top-4 left-4 bg-black bg-opacity-50 text-white px-4 py-2 rounded-full">
          Before
        </div>
        <div className="absolute top-4 right-4 bg-black bg-opacity-50 text-white px-4 py-2 rounded-full">
          After
        </div>
      </div>

      <div className="max-w-2xl mx-auto text-center mt-8">
        <p className="text-lg text-gray-700">
          "Charlie came to us scared and malnourished. With love, proper care, and medical attention,
          he transformed into the happiest, most playful dog. Now he's living his best life with his
          forever family!"
        </p>
        <p className="text-primary font-semibold mt-4">- Rescue Team</p>
      </div>
    </div>
  );
}
