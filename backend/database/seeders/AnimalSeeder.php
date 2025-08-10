<?php

namespace Database\Seeders;

use App\AnimalStatus;
use App\Models\Animal;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animals = [
            [
                'name' => 'Buddy',
                'type' => 'dog',
                'breed' => 'Golden Retriever',
                'description' => 'Friendly and energetic Golden Retriever who loves to play fetch and go for walks.',
                'age' => 3,
                'size' => 'large',
                'energy' => 'high',
                'status' => AnimalStatus::AVAILABLE,
                'featured' => true,
            ],
            [
                'name' => 'Whiskers',
                'type' => 'cat',
                'breed' => 'Persian',
                'description' => 'Calm and affectionate Persian cat who enjoys being pampered and lounging around.',
                'age' => 2,
                'size' => 'medium',
                'energy' => 'low',
                'status' => AnimalStatus::AVAILABLE,
                'featured' => true,
            ],
            [
                'name' => 'Polly',
                'type' => 'bird',
                'breed' => 'African Grey Parrot',
                'description' => 'Intelligent and talkative African Grey who can mimic human speech.',
                'age' => 5,
                'size' => 'medium',
                'energy' => 'medium',
                'status' => AnimalStatus::NOT_AVAILABLE,
                'featured' => false,
            ],
            [
                'name' => 'Hopper',
                'type' => 'rabbit',
                'breed' => 'Holland Lop',
                'description' => 'Adorable Holland Lop rabbit with floppy ears and a gentle personality.',
                'age' => 1,
                'size' => 'small',
                'energy' => 'medium',
                'status' => AnimalStatus::AVAILABLE,
                'featured' => true,
            ],
            [
                'name' => 'Max',
                'type' => 'dog',
                'breed' => 'German Shepherd',
                'description' => 'Loyal and protective German Shepherd, great with families and children.',
                'age' => 4,
                'size' => 'large',
                'energy' => 'high',
                'status' => AnimalStatus::AVAILABLE,
                'featured' => false,
            ],
            [
                'name' => 'Luna',
                'type' => 'cat',
                'breed' => 'Siamese',
                'description' => 'Elegant Siamese cat with striking blue eyes and a vocal personality.',
                'age' => 2,
                'size' => 'medium',
                'energy' => 'high',
                'status' => AnimalStatus::AVAILABLE,
                'featured' => false,
            ],
            [
                'name' => 'Nibbles',
                'type' => 'hamster',
                'breed' => 'Syrian Hamster',
                'description' => 'Cute and active Syrian hamster who loves to run on his wheel.',
                'age' => 1,
                'size' => 'small',
                'energy' => 'high',
                'status' => AnimalStatus::NOT_AVAILABLE,
                'featured' => false,
            ],
            [
                'name' => 'Splash',
                'type' => 'fish',
                'breed' => 'Betta Fish',
                'description' => 'Beautiful Betta fish with vibrant colors, perfect for a peaceful aquarium.',
                'age' => 1,
                'size' => 'small',
                'energy' => 'low',
                'status' => AnimalStatus::AVAILABLE,
                'featured' => false,
            ],
            [
                'name' => 'Rocky',
                'type' => 'dog',
                'breed' => 'Bulldog',
                'description' => 'Gentle and laid-back Bulldog who loves to cuddle and take naps.',
                'age' => 3,
                'size' => 'medium',
                'energy' => 'low',
                'status' => AnimalStatus::AVAILABLE,
                'featured' => false,
            ],
            [
                'name' => 'Shadow',
                'type' => 'cat',
                'breed' => 'Maine Coon',
                'description' => 'Large and majestic Maine Coon with a thick coat and friendly demeanor.',
                'age' => 4,
                'size' => 'large',
                'energy' => 'medium',
                'status' => AnimalStatus::AVAILABLE,
                'featured' => false,
            ],
        ];

        foreach ($animals as $animalData) {
            Animal::create($animalData);
        }
    }
} 