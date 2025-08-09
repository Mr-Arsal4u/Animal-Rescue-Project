import { motion } from "framer-motion";
import { Volume2 } from "lucide-react";
import { useIntersectionObserver } from "@/hooks/use-intersection-observer";
import { fadeInUp } from "@/lib/animations";

interface StoryCardProps {
  story: {
    id: string;
    title: string;
    excerpt: string;
    adopter: string;
    animalName: string;
    imageUrl: string;
    adoptedDate: string;
  };
  delay?: number;
}

export default function StoryCard({ story, delay = 0 }: StoryCardProps) {
  const { ref, isIntersecting } = useIntersectionObserver();
  
  const getInitials = (name: string) => {
    return name.split(' ').map(word => word[0]).join('').toUpperCase();
  };

  const getAvatarColor = (index: number) => {
    const colors = ['bg-primary', 'bg-secondary', 'bg-success'];
    return colors[index % colors.length];
  };

  return (
    <motion.div
      ref={ref}
      className="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500"
      initial="initial"
      animate={isIntersecting ? "animate" : "initial"}
      variants={fadeInUp}
      transition={{ delay }}
    >
      <img
        src={story.imageUrl}
        alt={`${story.animalName} with ${story.adopter}`}
        className="w-full h-48 object-cover"
      />

      <div className="p-6">
        <h4 className="text-xl font-bold text-gray-800 mb-3">{story.title}</h4>
        <p className="text-gray-600 mb-4">{story.excerpt}</p>

        <div className="flex items-center space-x-3 group cursor-pointer">
          <div className={`w-10 h-10 ${getAvatarColor(parseInt(story.id || '0'))} rounded-full flex items-center justify-center text-white font-bold`}>
            {getInitials(story.adopter)}
          </div>
          <div>
            <p className="font-semibold text-gray-800">{story.adopter}</p>
            <p className="text-sm text-gray-500">Adopted {story.adoptedDate}</p>
          </div>
          <div className="ml-auto opacity-0 group-hover:opacity-100 transition-opacity">
            <Volume2 className="w-4 h-4 text-primary" />
          </div>
        </div>
      </div>
    </motion.div>
  );
}
