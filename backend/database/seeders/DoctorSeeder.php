<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = [
            [
                'name' => 'Dr. Sarah Johnson',
                'email' => 'sarah.johnson@rescue.com',
                'phone' => '+1 (555) 123-4567',
                'specialization' => 'Veterinary Surgery',
                'qualifications' => 'DVM, PhD in Veterinary Medicine, Board Certified in Surgery',
                'experience_years' => 8,
                'bio' => 'Dr. Sarah Johnson is a board-certified veterinary surgeon with over 8 years of experience in emergency and elective surgeries. She specializes in orthopedic procedures and has performed hundreds of successful surgeries on rescue animals.',
                'status' => 'active',
                'address' => '123 Medical Center Dr, City, State 12345',
            ],
            [
                'name' => 'Dr. Michael Chen',
                'email' => 'michael.chen@rescue.com',
                'phone' => '+1 (555) 234-5678',
                'specialization' => 'Emergency Medicine',
                'qualifications' => 'DVM, Emergency Medicine Specialist, Critical Care Certified',
                'experience_years' => 6,
                'bio' => 'Dr. Michael Chen is an emergency medicine specialist who has dedicated his career to saving animals in critical condition. He has extensive experience in trauma care and emergency procedures.',
                'status' => 'active',
                'address' => '456 Emergency Ave, City, State 12345',
            ],
            [
                'name' => 'Dr. Emily Rodriguez',
                'email' => 'emily.rodriguez@rescue.com',
                'phone' => '+1 (555) 345-6789',
                'specialization' => 'General Practice',
                'qualifications' => 'DVM, General Practice, Preventive Medicine Specialist',
                'experience_years' => 5,
                'bio' => 'Dr. Emily Rodriguez focuses on preventive care and general wellness for all animals. She has a special interest in nutrition and behavioral medicine.',
                'status' => 'active',
                'address' => '789 Wellness Blvd, City, State 12345',
            ],
            [
                'name' => 'Dr. David Thompson',
                'email' => 'david.thompson@rescue.com',
                'phone' => '+1 (555) 456-7890',
                'specialization' => 'Dermatology',
                'qualifications' => 'DVM, Dermatology Specialist, Board Certified',
                'experience_years' => 7,
                'bio' => 'Dr. David Thompson is a dermatology specialist who helps animals with skin conditions, allergies, and other dermatological issues. He has helped countless rescue animals recover from skin problems.',
                'status' => 'active',
                'address' => '321 Skin Care Lane, City, State 12345',
            ],
            [
                'name' => 'Dr. Lisa Park',
                'email' => 'lisa.park@rescue.com',
                'phone' => '+1 (555) 567-8901',
                'specialization' => 'Cardiology',
                'qualifications' => 'DVM, Cardiology Specialist, Heart Disease Expert',
                'experience_years' => 9,
                'bio' => 'Dr. Lisa Park is a cardiology specialist who has saved many animals with heart conditions. She specializes in diagnosing and treating congenital and acquired heart diseases.',
                'status' => 'active',
                'address' => '654 Heart Health Way, City, State 12345',
            ],
        ];

        foreach ($doctors as $doctor) {
            Doctor::create($doctor);
        }
    }
}
