<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rescue The Voiceless - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#f97316',
                    }
                }
            }
        }
    </script>
    <style>
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite alternate;
        }
        @keyframes pulse-glow {
            from { box-shadow: 0 0 20px rgba(249, 115, 22, 0.3); }
            to { box-shadow: 0 0 30px rgba(249, 115, 22, 0.6); }
        }
        .slide-in-left {
            animation: slideInLeft 1s ease-out;
        }
        @keyframes slideInLeft {
            from { transform: translateX(-100px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        .slide-in-right {
            animation: slideInRight 1s ease-out;
        }
        @keyframes slideInRight {
            from { transform: translateX(100px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        .fade-in-up {
            animation: fadeInUp 1s ease-out;
        }
        @keyframes fadeInUp {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .gradient-bg {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 50%, #dc2626 100%);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .animal-card:hover {
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        .service-card:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        .stat-card {
            animation: statPulse 2s ease-in-out infinite;
        }
        @keyframes statPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        .hero-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0; }
            50% { transform: translateY(-20px) rotate(180deg); opacity: 1; }
        }
        .text-glow {
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }
        .btn-hover {
            position: relative;
            overflow: hidden;
        }
        .btn-hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        .btn-hover:hover::before {
            left: 100%;
        }
        }
        .btn-hover {
            position: relative;
            overflow: hidden;
        }
        .btn-hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        .btn-hover:hover::before {
            left: 100%;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-md shadow-lg fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center pulse-glow">
                        <i class="fas fa-heart text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-semibold text-gray-900">Rescue The Voiceless</h1>
                        <p class="text-sm text-gray-500">Every Life Deserves Love</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-primary font-semibold relative group">
                        Home
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/medical-services" class="text-gray-600 hover:text-primary transition-colors relative group">
                        Medical Services
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/medical-team" class="text-gray-600 hover:text-primary transition-colors relative group">
                        Medical Team
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/success-stories" class="text-gray-600 hover:text-primary transition-colors relative group">
                        Success Stories
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/admin" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-all duration-300 transform hover:scale-105">
                        Admin Panel
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="pt-40 pb-20 gradient-bg relative overflow-hidden">
        <div class="hero-particles">
            <div class="particle" style="top: 20%; left: 10%; width: 20px; height: 20px; animation-delay: 0s;"></div>
            <div class="particle" style="top: 60%; left: 80%; width: 15px; height: 15px; animation-delay: 1s;"></div>
            <div class="particle" style="top: 40%; left: 70%; width: 25px; height: 25px; animation-delay: 2s;"></div>
            <div class="particle" style="top: 80%; left: 20%; width: 18px; height: 18px; animation-delay: 3s;"></div>
            <div class="particle" style="top: 30%; left: 90%; width: 12px; height: 12px; animation-delay: 4s;"></div>
        </div>
        
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 text-center text-white">
            <div class="floating mb-8">
                <i class="fas fa-heart text-8xl opacity-20"></i>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-bold mb-6 text-glow slide-in-left">
                Every Life Deserves Love
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90 slide-in-right">
                Join us in giving abandoned animals a second chance at happiness
            </p>
            
            <div class="text-6xl font-bold mb-8 stat-card" data-aos="zoom-in" data-aos-delay="500">
                {{ $statistics[0]['number'] }}
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="700">
                <a href="/animals" class="btn-hover inline-block bg-white text-primary px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 shadow-lg">
                    <i class="fas fa-heart mr-2"></i>
                    Find Your Best Friend
                </a>
                <a href="/medical-services" class="btn-hover inline-block border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-primary transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-stethoscope mr-2"></i>
                    Book Medical Care
                </a>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach($statistics as $stat)
                <div class="text-center fade-in-up" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4 pulse-glow">
                        @if($stat['icon'] === 'heart')
                            <i class="fas fa-heart {{ $stat['color'] }} text-2xl"></i>
                        @elseif($stat['icon'] === 'star')
                            <i class="fas fa-star {{ $stat['color'] }} text-2xl"></i>
                        @elseif($stat['icon'] === 'users')
                            <i class="fas fa-users {{ $stat['color'] }} text-2xl"></i>
                        @elseif($stat['icon'] === 'calendar')
                            <i class="fas fa-calendar {{ $stat['color'] }} text-2xl"></i>
                        @endif
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-2">{{ $stat['number'] }}</div>
                    <div class="text-gray-600 font-medium">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Featured Animals Section -->
    <div class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Meet Our Featured Friends
                </h2>
                <p class="text-xl text-gray-600">
                    These amazing animals are looking for their forever homes
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($featuredAnimals as $animal)
                <div class="animal-card bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 group" 
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="relative overflow-hidden">
                        <img
                            src="{{ $animal->image_url ?? '/images/default-animal.svg' }}"
                            alt="{{ $animal->name }} - {{ $animal->breed }}"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">
                            {{ $animal->name }}
                        </h3>
                        <p class="text-gray-600 mb-3">
                            {{ $animal->breed }} • {{ $animal->age }} years old
                        </p>
                        <p class="text-gray-700 mb-4">{{ Str::limit($animal->description, 100) }}</p>

                        <a href="/animals" class="w-full bg-primary text-white py-3 px-4 rounded-lg hover:bg-orange-600 transition-all duration-300 inline-block text-center font-semibold transform hover:scale-105">
                            <i class="fas fa-heart mr-2"></i>
                            Meet Me!
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <div class="bg-white rounded-xl p-8 max-w-md mx-auto">
                        <i class="fas fa-paw text-4xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">No featured animals available at the moment.</p>
                        <p class="text-gray-400 text-sm mt-2">Check back soon for new friends!</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Medical Services Preview -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Professional Medical Care
                </h2>
                <p class="text-xl text-gray-600">
                    Comprehensive veterinary services to keep your pets healthy and happy
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($medicalServices as $service)
                <div class="service-card bg-white rounded-xl shadow-lg p-6 text-center relative overflow-hidden {{ $service['popular'] ? 'ring-2 ring-primary' : '' }}" 
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    @if($service['popular'])
                    <div class="absolute -top-2 -right-2 bg-primary text-white text-xs px-2 py-1 rounded-full font-semibold">Popular</div>
                    @endif
                    
                    <div class="w-16 h-16 {{ $service['bgColor'] }} rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        @if($service['icon'] === 'shield')
                            <i class="fas fa-shield-alt {{ $service['color'] }} text-2xl"></i>
                        @elseif($service['icon'] === 'pill')
                            <i class="fas fa-pills {{ $service['color'] }} text-2xl"></i>
                        @elseif($service['icon'] === 'heart')
                            <i class="fas fa-heartbeat {{ $service['color'] }} text-2xl"></i>
                        @elseif($service['icon'] === 'syringe')
                            <i class="fas fa-syringe {{ $service['color'] }} text-2xl"></i>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $service['title'] }}</h3>
                    <p class="text-gray-600 mb-4">{{ $service['description'] }}</p>
                    <div class="text-2xl font-bold text-primary mb-3">{{ $service['price'] }}</div>
                    <a href="{{ route('appointments.create') }}?service={{ urlencode($service['title']) }}" 
                       class="w-full bg-primary text-white py-2 px-4 rounded-lg hover:bg-orange-600 transition-all duration-300 inline-block text-center transform hover:scale-105">
                        Book Appointment
                    </a>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12" data-aos="fade-up">
                <a href="/medical-services" class="bg-gray-800 text-white px-8 py-3 rounded-lg hover:bg-gray-700 transition-all duration-300 transform hover:scale-105">
                    View All Services
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Booking Section -->
    <div class="py-20 bg-gradient-to-br from-blue-50 to-indigo-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Book Your Pet's Care Today
                </h2>
                <p class="text-xl text-gray-600">
                    Get professional veterinary care for your beloved pets
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Consultation Card -->
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:scale-105" 
                     data-aos="slide-in-left">
                    <div class="w-20 h-20 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-stethoscope text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Book a Consultation</h3>
                    <p class="text-gray-600 mb-6">
                        Get expert advice from our veterinary team. Perfect for general checkups, 
                        vaccinations, and health concerns.
                    </p>
                    <a href="{{ route('consultations.create') }}" 
                       class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-all duration-300 transform hover:scale-105">
                        Book Consultation
                    </a>
                </div>

                <!-- Appointment Card -->
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300 transform hover:scale-105" 
                     data-aos="slide-in-right">
                    <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar-check text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Schedule an Appointment</h3>
                    <p class="text-gray-600 mb-6">
                        Book a specific time slot for surgery, emergency care, or specialized 
                        treatments with our medical team.
                    </p>
                    <a href="{{ route('appointments.create') }}" 
                       class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition-all duration-300 transform hover:scale-105">
                        Book Appointment
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Medical Team Preview -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Meet Our Medical Team
                </h2>
                <p class="text-xl text-gray-600">
                    Experienced veterinarians dedicated to animal care and recovery
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($doctors as $doctor)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:scale-105" 
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="relative overflow-hidden">
                        <img
                            src="{{ $doctor->image_url ?? '/images/default-doctor.svg' }}"
                            alt="{{ $doctor->name }} - {{ $doctor->specialization }}"
                            class="w-full h-64 object-cover"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">
                            {{ $doctor->name }}
                        </h3>
                        <p class="text-primary font-semibold mb-3">
                            {{ $doctor->specialization }}
                        </p>
                        <p class="text-gray-600 mb-4">{{ Str::limit($doctor->bio, 120) }}</p>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-star text-yellow-400"></i>
                                <span class="text-sm text-gray-600">{{ $doctor->rating ?? '5.0' }}</span>
                            </div>
                            <a href="/medical-team" class="text-primary hover:text-orange-600 transition-colors font-semibold">
                                View Profile
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <div class="bg-white rounded-xl p-8 max-w-md mx-auto">
                        <i class="fas fa-user-md text-4xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">No medical team members available at the moment.</p>
                        <p class="text-gray-400 text-sm mt-2">Check back soon for our team updates!</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Success Stories -->
    <div class="py-20 bg-gradient-to-br from-orange-50 to-amber-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Success Stories
                </h2>
                <p class="text-xl text-gray-600">
                    Heartwarming tales of rescue, recovery, and forever homes
                </p>
            </div>

            <!-- Success Stories -->
            <div class="space-y-12">
                @forelse($successStories as $story)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden {{ $story->featured ? 'ring-2 ring-primary' : '' }}" 
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    @if($story->featured)
                    <div class="absolute top-4 left-4 bg-primary text-white px-3 py-1 rounded-full text-sm font-semibold z-10">
                        Featured Story
                    </div>
                    @endif
                    
                    <div class="md:flex">
                        <!-- Before/After Images -->
                        <div class="md:w-1/2 relative">
                            <div class="grid grid-cols-2 gap-2 p-6">
                                <div class="space-y-2">
                                    <div class="text-center text-sm font-semibold text-gray-600">Before</div>
                                    @if($story->before_image)
                                        <img src="{{ $story->before_image_url }}" 
                                             alt="{{ $story->name }} - Before" 
                                             class="w-full h-48 object-cover rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-48 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400 text-3xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="space-y-2">
                                    <div class="text-center text-sm font-semibold text-gray-600">After</div>
                                    @if($story->after_image)
                                        <img src="{{ $story->after_image_url }}" 
                                             alt="{{ $story->name }} - After" 
                                             class="w-full h-48 object-cover rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-48 bg-gradient-to-br from-green-200 to-blue-200 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-heart text-green-500 text-3xl"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Story Content -->
                        <div class="md:w-1/2 p-6">
                            <div class="mb-4">
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">
                                    {{ $story->name }}'s Journey
                                </h3>
                                <div class="flex items-center space-x-4 text-sm text-gray-600 mb-3">
                                    <span class="font-semibold">{{ $story->breed }}</span>
                                    <span>•</span>
                                    <span>{{ ucfirst($story->type) }}</span>
                                </div>
                            </div>

                            <p class="text-gray-700 mb-6 leading-relaxed">
                                {{ $story->story }}
                            </p>

                            <div class="space-y-3 mb-6">
                                @foreach($story->stats as $stat)
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-primary rounded-full"></div>
                                    <span class="text-sm text-gray-700 font-medium">
                                        {{ is_array($stat) ? ($stat['label'] ?? ($stat['description'] ?? json_encode($stat))) : $stat }}
                                    </span>
                                </div>
                                @endforeach
                            </div>

                            <div class="grid grid-cols-2 gap-4 text-sm mb-6">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-calendar text-gray-400"></i>
                                    <span class="text-gray-600">Timeline: {{ $story->timeline }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-map-marker-alt text-gray-400"></i>
                                    <span class="text-gray-600">{{ $story->location }}</span>
                                </div>
                            </div>

                            <div class="border-t pt-4">
                                <div class="text-sm text-gray-600 mb-2">
                                    Adopted by <span class="font-semibold text-gray-800">{{ $story->adopted_by }}</span>
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($story->adoption_date)->format('F Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-12">
                    <div class="bg-white rounded-xl p-8 max-w-md mx-auto">
                        <i class="fas fa-heart text-4xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">No success stories available at the moment.</p>
                        <p class="text-gray-400 text-sm mt-2">Check back soon for inspiring stories!</p>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-16" data-aos="fade-up">
                <div class="bg-white rounded-2xl shadow-lg p-8 max-w-2xl mx-auto">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">
                        Be Part of the Next Success Story
                    </h3>
                    <p class="text-gray-600 mb-6">
                        Adopt a pet and give them the love and care they deserve
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/animals" class="bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-heart mr-2"></i>
                            Adopt Today
                        </a>
                        <a href="/success-stories" class="bg-gray-800 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-700 transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-book-open mr-2"></i>
                            Read More Stories
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center pulse-glow">
                            <i class="fas fa-heart text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold">Rescue The Voiceless</h3>
                            <p class="text-sm text-gray-400">Every Life Deserves Love</p>
                        </div>
                    </div>
                    <p class="text-gray-400">
                        Providing compassionate care to rescued animals and helping them find their forever homes.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-400 hover:text-white transition-colors duration-300 transform hover:translate-x-1">Home</a></li>
                        <li><a href="/medical-services" class="text-gray-400 hover:text-white transition-colors duration-300 transform hover:translate-x-1">Medical Services</a></li>
                        <li><a href="/medical-team" class="text-gray-400 hover:text-white transition-colors duration-300 transform hover:translate-x-1">Medical Team</a></li>
                        <li><a href="/success-stories" class="text-gray-400 hover:text-white transition-colors duration-300 transform hover:translate-x-1">Success Stories</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('consultations.create') }}" class="text-gray-400 hover:text-white transition-colors duration-300 transform hover:translate-x-1">Book Consultation</a></li>
                        <li><a href="{{ route('appointments.create') }}" class="text-gray-400 hover:text-white transition-colors duration-300 transform hover:translate-x-1">Book Appointment</a></li>
                        <li><a href="/animals" class="text-gray-400 hover:text-white transition-colors duration-300 transform hover:translate-x-1">Adopt an Animal</a></li>
                        <li><a href="/admin" class="text-gray-400 hover:text-white transition-colors duration-300 transform hover:translate-x-1">Admin Panel</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                    <div class="space-y-2 text-gray-400">
                        <p class="flex items-center hover:text-white transition-colors duration-300"><i class="fas fa-phone mr-2"></i> Emergency: (555) 123-4567</p>
                        <p class="flex items-center hover:text-white transition-colors duration-300"><i class="fas fa-envelope mr-2"></i> info@rescuethevoiceless.org</p>
                        <p class="flex items-center hover:text-white transition-colors duration-300"><i class="fas fa-map-marker-alt mr-2"></i> 123 Rescue Street, City, State</p>
                        <p class="flex items-center hover:text-white transition-colors duration-300"><i class="fas fa-clock mr-2"></i> 24/7 Emergency Care</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-400">&copy; 2024 Rescue The Voiceless. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="fixed bottom-8 right-8 bg-primary text-white w-12 h-12 rounded-full shadow-lg hover:bg-orange-600 transition-all duration-300 transform hover:scale-110 opacity-0 pointer-events-none z-50">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Scroll to top functionality
        const scrollToTopBtn = document.getElementById('scrollToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
                scrollToTopBtn.classList.add('opacity-100');
            } else {
                scrollToTopBtn.classList.add('opacity-0', 'pointer-events-none');
                scrollToTopBtn.classList.remove('opacity-100');
            }
        });
        
        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Add smooth scrolling to all anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
