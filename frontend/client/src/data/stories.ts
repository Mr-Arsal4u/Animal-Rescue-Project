import type { Story } from "@shared/schema";

export const mockStories: Partial<Story>[] = [
  {
    id: "1",
    title: "Bella's New Beginning",
    excerpt: "Found wandering the streets, Bella now has a loving family and her own backyard to play in. Her transformation shows the power of second chances.",
    adopter: "The Johnson Family",
    animalName: "Bella",
    imageUrl: "https://images.unsplash.com/photo-1601758228041-f3b2795255f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=300",
    adoptedDate: "6 months ago",
  },
  {
    id: "2",
    title: "Shadow's Golden Years",
    excerpt: "At 12 years old, Shadow thought his chances were slim. But love has no age limit - he found the perfect retirement home where he's cherished every day.",
    adopter: "Margaret Chen",
    animalName: "Shadow",
    imageUrl: "https://images.unsplash.com/photo-1571566882372-1598d88abd90?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=300",
    adoptedDate: "1 year ago",
  },
  {
    id: "3",
    title: "Rocky's Adventure Begins",
    excerpt: "This energetic pup needed a family that could match his enthusiasm. He found his perfect match with an active family who loves hiking and outdoor adventures.",
    adopter: "The Martinez Family",
    animalName: "Rocky",
    imageUrl: "https://images.unsplash.com/photo-1583337130417-3346a1be7dee?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=300",
    adoptedDate: "3 months ago",
  },
];
