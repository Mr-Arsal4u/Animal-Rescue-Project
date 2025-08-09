import HeroSection from "@/components/home/hero-section";
import FeaturedAnimals from "@/components/home/featured-animals";
import MedicalServices from "@/components/home/medical-services";
import MedicalTeam from "@/components/home/medical-team";
import SuccessStories from "@/components/home/success-stories";

export default function Home() {
  return (
    <div className="pt-16">
      <HeroSection />
      <FeaturedAnimals />
      <MedicalServices />
      <MedicalTeam />
      <SuccessStories />
    </div>
  );
}
