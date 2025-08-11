<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Services - Rescue The Voiceless</title>
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
        .service-card:hover {
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 50%, #dc2626 100%);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                        <i class="fas fa-heart text-white"></i>
                    </div>
                    <div>
                        <h1 class="text-xl font-semibold text-gray-900">Rescue The Voiceless</h1>
                        <p class="text-sm text-gray-500">Medical Services</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-gray-600 hover:text-primary transition-colors">Home</a>
                    <a href="/medical-services" class="text-primary font-semibold">Medical Services</a>
                    <a href="/medical-team" class="text-gray-600 hover:text-primary transition-colors">Medical Team</a>
                    <a href="/success-stories" class="text-gray-600 hover:text-primary transition-colors">Success Stories</a>
                    <a href="/admin" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">Admin Panel</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="pt-40 pb-20 gradient-bg relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative max-w-7xl mx-auto px-4 text-center text-white">
            <div class="floating mb-8">
                <i class="fas fa-stethoscope text-8xl opacity-20"></i>
            </div>
            <h1 class="text-5xl md:text-7xl font-bold mb-6 slide-in-left">
                Professional Medical Care
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90 slide-in-right">
                Comprehensive veterinary services with state-of-the-art facilities
            </p>
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                <div class="glass-effect rounded-lg px-6 py-3">
                    <i class="fas fa-clock text-2xl mb-2"></i>
                    <p class="font-semibold">24/7 Emergency Care</p>
                </div>
                <div class="glass-effect rounded-lg px-6 py-3">
                    <i class="fas fa-user-md text-2xl mb-2"></i>
                    <p class="font-semibold">Expert Veterinarians</p>
                </div>
                <div class="glass-effect rounded-lg px-6 py-3">
                    <i class="fas fa-heart text-2xl mb-2"></i>
                    <p class="font-semibold">Compassionate Care</p>
                </div>
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
                        <i class="fas fa-{{ $stat['icon'] }} text-primary text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-2">{{ $stat['number'] }}</div>
                    <div class="text-gray-600">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Main Services Section -->
    <div class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Core Services</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Professional veterinary care designed to keep your pets healthy and happy. 
                    From routine checkups to emergency care, we're here for every need.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($medicalServices as $service)
                <div class="service-card bg-white rounded-xl shadow-lg p-6 text-center relative overflow-hidden" 
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    @if($service['popular'])
                    <div class="absolute -top-2 -right-2 bg-primary text-white text-xs px-3 py-1 rounded-full font-semibold">
                        Popular
                    </div>
                    @endif
                    
                    <div class="w-16 h-16 {{ $service['bgColor'] }} rounded-full flex items-center justify-center mx-auto mb-4">
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
                    
                    <div class="space-y-2 mb-4">
                        @foreach($service['features'] as $feature)
                        <div class="flex items-center justify-center space-x-2">
                            <i class="fas fa-check text-green-500 text-sm"></i>
                            <span class="text-sm text-gray-700">{{ $feature }}</span>
                        </div>
                        @endforeach
                    </div>
                    
                    <div class="text-2xl font-bold text-primary mb-4">{{ $service['price'] }}</div>
                    <a href="{{ route('appointments.create') }}?service={{ urlencode($service['title']) }}" 
                       class="w-full bg-primary text-white py-3 px-4 rounded-lg hover:bg-orange-600 transition-colors inline-block text-center font-semibold">
                        Book Appointment
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Additional Services Section -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Additional Services</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Comprehensive care options to address all aspects of your pet's health and well-being
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($additionalServices as $service)
                <div class="group bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:border-primary/30 transition-all duration-300" 
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                    <div class="w-16 h-16 {{ $service['bgColor'] }} rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        @if($service['icon'] === 'stethoscope')
                            <i class="fas fa-stethoscope {{ $service['color'] }} text-2xl"></i>
                        @elseif($service['icon'] === 'scissors')
                            <i class="fas fa-cut {{ $service['color'] }} text-2xl"></i>
                        @elseif($service['icon'] === 'tooth')
                            <i class="fas fa-tooth {{ $service['color'] }} text-2xl"></i>
                        @elseif($service['icon'] === 'flask')
                            <i class="fas fa-flask {{ $service['color'] }} text-2xl"></i>
                        @elseif($service['icon'] === 'x-ray')
                            <i class="fas fa-x-ray {{ $service['color'] }} text-2xl"></i>
                        @elseif($service['icon'] === 'dumbbell')
                            <i class="fas fa-dumbbell {{ $service['color'] }} text-2xl"></i>
                        @endif
                    </div>
                    
                    <h3 class="text-xl font-bold text-gray-800 mb-3 text-center">{{ $service['title'] }}</h3>
                    <p class="text-gray-600 text-center">{{ $service['description'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Quick Booking Section -->
    <div class="py-20 bg-gradient-to-br from-blue-50 to-indigo-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Book Your Pet's Care Today</h2>
                <p class="text-xl text-gray-600">
                    Get professional veterinary care for your beloved pets
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Consultation Card -->
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300" 
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
                       class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                        Book Consultation
                    </a>
                </div>

                <!-- Appointment Card -->
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300" 
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
                       class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                        Book Appointment
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">What Pet Parents Say</h2>
                <p class="text-xl text-gray-600">
                    Hear from families who have experienced our exceptional care
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($testimonials as $testimonial)
                <div class="bg-gray-50 rounded-xl p-6 hover:shadow-lg transition-shadow duration-300" 
                     data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="flex items-center mb-4">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star text-yellow-400"></i>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-4 italic">"{{ $testimonial['content'] }}"</p>
                    <div class="border-t pt-4">
                        <p class="font-semibold text-gray-800">{{ $testimonial['name'] }}</p>
                        <p class="text-sm text-gray-600">{{ $testimonial['pet'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Success Stories Section -->
    <div class="py-20 bg-gradient-to-br from-primary/5 to-orange-100">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Medical Success Stories</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    See the incredible transformations and healing journeys of animals who received our medical care
                </p>
            </div>

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
                                    <div class="text-center text-sm font-semibold text-gray-600">Before Treatment</div>
                                    @if($story->before_image)
                                        <img src="{{ $story->before_image_url }}" 
                                             alt="{{ $story->name }} - Before Treatment" 
                                             class="w-full h-48 object-cover rounded-lg shadow-md hover:scale-105 transition-transform duration-300">
                                    @else
                                        <div class="w-full h-48 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400 text-3xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="space-y-2">
                                    <div class="text-center text-sm font-semibold text-gray-600">After Recovery</div>
                                    @if($story->after_image)
                                        <img src="{{ $story->after_image_url }}" 
                                             alt="{{ $story->name }} - After Recovery" 
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
                                    {{ $story->name }}'s Recovery Journey
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
                        <p class="text-gray-400 text-sm mt-2">Check back soon for inspiring recovery stories!</p>
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
                        Your pet's journey to health and happiness starts here. Book a consultation or appointment today.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('consultations.create') }}" 
                           class="bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                            Book Consultation
                        </a>
                        <a href="{{ route('appointments.create') }}" 
                           class="bg-gray-800 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-700 transition-colors">
                            Book Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Why Choose Our Medical Services?</h2>
                <p class="text-xl text-gray-600">
                    We provide exceptional care with a focus on compassion and expertise
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-md text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Expert Veterinarians</h3>
                    <p class="text-gray-600">Licensed professionals with years of experience in animal care</p>
                </div>

                <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">24/7 Availability</h3>
                    <p class="text-gray-600">Emergency care available around the clock for urgent situations</p>
                </div>

                <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heart text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Compassionate Care</h3>
                    <p class="text-gray-600">Treating every animal with love, respect, and understanding</p>
                </div>

                <div class="text-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Modern Facilities</h3>
                    <p class="text-gray-600">State-of-the-art equipment and clean, safe treatment areas</p>
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
                        <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                            <i class="fas fa-heart text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold">Rescue The Voiceless</h3>
                            <p class="text-sm text-gray-400">Medical Services</p>
                        </div>
                    </div>
                    <p class="text-gray-400">
                        Providing compassionate veterinary care to rescued animals and helping them find their forever homes.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="/medical-services" class="text-gray-400 hover:text-white transition-colors">Medical Services</a></li>
                        <li><a href="/medical-team" class="text-gray-400 hover:text-white transition-colors">Medical Team</a></li>
                        <li><a href="/success-stories" class="text-gray-400 hover:text-white transition-colors">Success Stories</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('consultations.create') }}" class="text-gray-400 hover:text-white transition-colors">Book Consultation</a></li>
                        <li><a href="{{ route('appointments.create') }}" class="text-gray-400 hover:text-white transition-colors">Book Appointment</a></li>
                        <li><a href="/animals" class="text-gray-400 hover:text-white transition-colors">Adopt an Animal</a></li>
                        <li><a href="/admin" class="text-gray-400 hover:text-white transition-colors">Admin Panel</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                    <div class="space-y-2 text-gray-400">
                        <p><i class="fas fa-phone mr-2"></i> Emergency: (555) 123-4567</p>
                        <p><i class="fas fa-envelope mr-2"></i> info@rescuethevoiceless.org</p>
                        <p><i class="fas fa-map-marker-alt mr-2"></i> 123 Rescue Street, City, State</p>
                        <p><i class="fas fa-clock mr-2"></i> 24/7 Emergency Care</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-400">&copy; 2024 Rescue The Voiceless. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    </script>
</body>
</html>
