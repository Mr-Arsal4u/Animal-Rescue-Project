<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Doctor;
use App\Models\SuccessStory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'featuredAnimals' => Animal::featured()->take(3)->get(),
            'doctors' => Doctor::active()->take(3)->get(),
            'successStories' => SuccessStory::featured()->published()->take(3)->get(),
            'medicalServices' => $this->getMedicalServices(),
            'statistics' => $this->getStatistics(),
        ];

        return view('home', $data);
    }

    private function getMedicalServices()
    {
        return [
            [
                'id' => 1,
                'title' => 'Vaccination Services',
                'description' => 'Complete vaccination protocols for all pets including core vaccines and boosters',
                'icon' => 'shield',
                'features' => ['Core Vaccines', 'Booster Shots', 'Rabies Vaccination', 'Health Certificates'],
                'price' => 'From $45',
                'popular' => true,
                'color' => 'text-blue-600',
                'bgColor' => 'bg-blue-50',
            ],
            [
                'id' => 2,
                'title' => 'Preventive Medicine',
                'description' => 'Comprehensive preventive care including flea, tick, and heartworm prevention',
                'icon' => 'pill',
                'features' => ['Flea & Tick Control', 'Heartworm Prevention', 'Deworming', 'Nutritional Supplements'],
                'price' => 'From $35',
                'popular' => false,
                'color' => 'text-green-600',
                'bgColor' => 'bg-green-50',
            ],
            [
                'id' => 3,
                'title' => 'Emergency Care',
                'description' => '24/7 emergency medical services for critical situations',
                'icon' => 'heart',
                'features' => ['Emergency Surgery', 'Critical Care', 'Trauma Treatment', 'Pain Management'],
                'price' => 'From $150',
                'popular' => false,
                'color' => 'text-red-600',
                'bgColor' => 'bg-red-50',
            ],
            [
                'id' => 4,
                'title' => 'Specialized Treatments',
                'description' => 'Advanced medical treatments and specialized care for complex conditions',
                'icon' => 'syringe',
                'features' => ['Chemotherapy', 'Dermatology', 'Cardiology', 'Orthopedic Care'],
                'price' => 'From $200',
                'popular' => false,
                'color' => 'text-purple-600',
                'bgColor' => 'bg-purple-50',
            ],
        ];
    }

    private function getStatistics()
    {
        return [
            [
                'number' => Animal::count() . '+',
                'label' => 'Animals Rescued',
                'icon' => 'heart',
                'color' => 'text-red-500',
            ],
            [
                'number' => '98%',
                'label' => 'Success Rate',
                'icon' => 'star',
                'color' => 'text-yellow-500',
            ],
            [
                'number' => SuccessStory::where('status', 'published')->count() . '+',
                'label' => 'Happy Adoptions',
                'icon' => 'users',
                'color' => 'text-green-500',
            ],
            [
                'number' => '24/7',
                'label' => 'Emergency Care',
                'icon' => 'calendar',
                'color' => 'text-blue-500',
            ],
        ];
    }
}
