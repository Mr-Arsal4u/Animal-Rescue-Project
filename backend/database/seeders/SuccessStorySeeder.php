<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SuccessStory;

class SuccessStorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stories = [
            [
                'name' => 'Luna\'s Journey to Recovery',
                'type' => 'dog',
                'breed' => 'Golden Retriever',
                'story' => 'Luna was found abandoned and severely malnourished in a local park. She was covered in ticks and had a severe skin infection. Our veterinary team worked tirelessly for 3 months to nurse her back to health. Today, Luna is a happy, healthy dog who loves playing fetch and going for long walks.',
                'timeline' => '3 months',
                'location' => 'Central Park Rescue',
                'adopted_by' => 'The Johnson Family',
                'adoption_date' => '2024-01-15',
                'stats' => ['Full Recovery', 'Weight Gain: 15kg', 'Skin Infection Cured'],
                'before_image' => 'success-stories/before/luna-before.jpg',
                'after_image' => 'success-stories/after/luna-after.jpg',
                'featured' => true,
                'status' => 'published',
            ],
            [
                'name' => 'Whiskers\' Second Chance',
                'type' => 'cat',
                'breed' => 'Domestic Shorthair',
                'story' => 'Whiskers was brought to us with a broken leg and severe respiratory infection. The poor cat was barely breathing and in immense pain. After emergency surgery and weeks of intensive care, Whiskers made a miraculous recovery. He now enjoys sunbathing and chasing laser pointers.',
                'timeline' => '6 weeks',
                'location' => 'Downtown Animal Hospital',
                'adopted_by' => 'Sarah Chen',
                'adoption_date' => '2024-02-20',
                'stats' => ['Surgery Successful', 'Respiratory Recovery', 'Full Mobility Restored'],
                'before_image' => 'success-stories/before/whiskers-before.jpg',
                'after_image' => 'success-stories/after/whiskers-after.jpg',
                'featured' => true,
                'status' => 'published',
            ],
            [
                'name' => 'Buddy\'s Transformation',
                'type' => 'dog',
                'breed' => 'Mixed Breed',
                'story' => 'Buddy was rescued from a hoarding situation where he lived in terrible conditions. He was fearful of humans and had never been properly socialized. Through patient training and lots of love, Buddy learned to trust again. He\'s now a confident, friendly dog who loves belly rubs.',
                'timeline' => '4 months',
                'location' => 'Hope Animal Shelter',
                'adopted_by' => 'The Martinez Family',
                'adoption_date' => '2024-03-10',
                'stats' => ['Behavioral Recovery', 'Socialization Success', 'Trust Building'],
                'before_image' => 'success-stories/before/buddy-before.jpg',
                'after_image' => 'success-stories/after/buddy-after.jpg',
                'featured' => false,
                'status' => 'published',
            ],
            [
                'name' => 'Pepper\'s Miracle',
                'type' => 'bird',
                'breed' => 'African Grey Parrot',
                'story' => 'Pepper was found with severe wing damage and malnutrition. The beautiful parrot couldn\'t fly and was very weak. Our avian specialist worked wonders, and after months of rehabilitation, Pepper regained his ability to fly and his vibrant personality. He now loves mimicking sounds and learning new words.',
                'timeline' => '5 months',
                'location' => 'Wings of Hope Sanctuary',
                'adopted_by' => 'Dr. Emily Rodriguez',
                'adoption_date' => '2024-01-30',
                'stats' => ['Wing Recovery', 'Flight Restored', 'Personality Restored'],
                'before_image' => 'success-stories/before/pepper-before.jpg',
                'after_image' => 'success-stories/after/pepper-after.jpg',
                'featured' => true,
                'status' => 'published',
            ],
            [
                'name' => 'Bunny\'s Happy Ending',
                'type' => 'rabbit',
                'breed' => 'Holland Lop',
                'story' => 'Bunny was discovered in a cardboard box with severe dental problems and matted fur. The poor rabbit was in pain and couldn\'t eat properly. After dental surgery and grooming, Bunny became a completely different animal. He now hops around happily and enjoys fresh vegetables.',
                'timeline' => '2 months',
                'location' => 'Small Pets Rescue',
                'adopted_by' => 'The Thompson Family',
                'adoption_date' => '2024-02-15',
                'stats' => ['Dependency Recovery', 'Fur Recovery', 'Pain Relief'],
                'before_image' => 'success-stories/before/bunny-before.jpg',
                'after_image' => 'success-stories/after/bunny-after.jpg',
                'featured' => false,
                'status' => 'published',
            ],
            [
                'name' => 'Shadow\'s Redemption',
                'type' => 'cat',
                'breed' => 'Black Domestic Longhair',
                'story' => 'Shadow was found in a storm drain during heavy rain, soaked and shivering. He had a severe upper respiratory infection and was extremely dehydrated. After emergency treatment and weeks of care, Shadow recovered completely. He\'s now a playful, affectionate cat who loves cuddling.',
                'timeline' => '5 weeks',
                'location' => 'Storm Rescue Team',
                'adopted_by' => 'Michael Davis',
                'adoption_date' => '2024-03-25',
                'stats' => ['Emergency Recovery', 'Respiratory Healing', 'Full Health'],
                'before_image' => 'success-stories/before/shadow-before.jpg',
                'after_image' => 'success-stories/after/shadow-after.jpg',
                'featured' => false,
                'status' => 'published',
            ],
        ];

        foreach ($stories as $story) {
            SuccessStory::create($story);
        }
    }
}
