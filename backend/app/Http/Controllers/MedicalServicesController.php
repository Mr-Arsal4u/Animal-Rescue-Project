<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MedicalServicesController extends Controller
{
    public function index()
    {
        $data = [
            'medicalServices' => $this->getMedicalServices(),
            'additionalServices' => $this->getAdditionalServices(),
            'testimonials' => $this->getTestimonials(),
            'statistics' => $this->getStatistics(),
            'successStories' => $this->getSuccessStories(),
        ];

        return view('medical-services', $data);
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

    private function getAdditionalServices()
    {
        return [
            [
                'title' => 'General Checkups',
                'description' => 'Comprehensive health assessments including physical examination, vital signs monitoring, and health recommendations.',
                'icon' => 'stethoscope',
                'color' => 'text-indigo-600',
                'bgColor' => 'bg-indigo-50',
            ],
            [
                'title' => 'Surgery',
                'description' => 'Expert surgical procedures including spaying/neutering, dental surgery, and emergency operations.',
                'icon' => 'scissors',
                'color' => 'text-orange-600',
                'bgColor' => 'bg-orange-50',
            ],
            [
                'title' => 'Dental Care',
                'description' => 'Complete dental health services including cleaning, extractions, and oral health maintenance.',
                'icon' => 'tooth',
                'color' => 'text-teal-600',
                'bgColor' => 'bg-teal-50',
            ],
            [
                'title' => 'Laboratory Services',
                'description' => 'Advanced diagnostic testing including blood work, urinalysis, and specialized medical tests.',
                'icon' => 'flask',
                'color' => 'text-pink-600',
                'bgColor' => 'bg-pink-50',
            ],
            [
                'title' => 'Radiology',
                'description' => 'Digital X-rays and ultrasound imaging for accurate diagnosis and treatment planning.',
                'icon' => 'x-ray',
                'color' => 'text-gray-600',
                'bgColor' => 'bg-gray-50',
            ],
            [
                'title' => 'Rehabilitation',
                'description' => 'Physical therapy and rehabilitation services for post-surgery recovery and mobility improvement.',
                'icon' => 'dumbbell',
                'color' => 'text-amber-600',
                'bgColor' => 'bg-amber-50',
            ],
        ];
    }

    private function getTestimonials()
    {
        return [
            [
                'name' => 'Sarah Johnson',
                'pet' => 'Luna (Golden Retriever)',
                'content' => 'The emergency care team saved Luna\'s life when she had a severe allergic reaction. Their quick response and expertise were incredible.',
                'rating' => 5,
            ],
            [
                'name' => 'Michael Chen',
                'pet' => 'Whiskers (Cat)',
                'content' => 'The vaccination service was smooth and professional. Whiskers didn\'t even notice the shots, and the follow-up care was excellent.',
                'rating' => 5,
            ],
            [
                'name' => 'Emily Rodriguez',
                'pet' => 'Buddy (Mixed Breed)',
                'content' => 'The preventive medicine program has kept Buddy healthy for years. The team is always available for questions and concerns.',
                'rating' => 5,
            ],
        ];
    }

    private function getStatistics()
    {
        return [
            [
                'number' => '5000+',
                'label' => 'Animals Treated',
                'icon' => 'heart',
            ],
            [
                'number' => '98%',
                'label' => 'Success Rate',
                'icon' => 'star',
            ],
            [
                'number' => '24/7',
                'label' => 'Emergency Care',
                'icon' => 'clock',
            ],
            [
                'number' => '15+',
                'label' => 'Years Experience',
                'icon' => 'award',
            ],
        ];
    }

    private function getSuccessStories()
    {
        return \App\Models\SuccessStory::featured()->published()->take(3)->get();
    }
}
