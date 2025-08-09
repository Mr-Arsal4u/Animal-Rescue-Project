import HeroSection from "@/components/home/hero-section";
import FeaturedAnimals from "@/components/home/featured-animals";

export default function Home() {
  return (
    <div className="pt-16">
      <HeroSection />
      <FeaturedAnimals />
    </div>
  );
}
