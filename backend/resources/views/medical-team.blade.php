<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Team - Rescue The Voiceless</title>
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
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 50%, #06b6d4 100%);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .doctor-card:hover {
            transform: translateY(-10px);
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
        .specialization-badge {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
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
                        <p class="text-sm text-gray-500">Medical Team</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-gray-600 hover:text-primary transition-colors relative group">
                        Home
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/animals" class="text-gray-600 hover:text-primary transition-colors relative group">
                        Animals
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="/medical-services" class="text-gray-600 hover:text-primary transition-colors relative group">
                        Medical Services
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
                <i class="fas fa-user-md text-8xl opacity-20"></i>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-bold mb-6 text-glow slide-in-left">
                Our Expert Medical Team
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90 slide-in-right">
                Dedicated veterinarians committed to providing the highest quality care
            </p>
            
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                <div class="glass-effect rounded-lg px-6 py-3">
                    <i class="fas fa-stethoscope text-2xl mb-2"></i>
                    <p class="font-semibold">Expert Care</p>
                </div>
                <div class="glass-effect rounded-lg px-6 py-3">
                    <i class="fas fa-heart text-2xl mb-2"></i>
                    <p class="font-semibold">Compassionate</p>
                </div>
                <div class="glass-effect rounded-lg px-6 py-3">
                    <i class="fas fa-clock text-2xl mb-2"></i>
                    <p class="font-semibold">24/7 Available</p>
                </div>
            </div>
            
            <div class="text-4xl font-bold mb-4 stat-card" data-aos="zoom-in" data-aos-delay="500">
                {{ $doctors->count() }} Experienced Professionals
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center fade-in-up" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-16 h-16 bg-blue-500/10 rounded-full flex items-center justify-center mx-auto mb-4 pulse-glow">
                        <i class="fas fa-user-md text-blue-500 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-2">{{ $doctors->count() }}</div>
                    <div class="text-gray-600">Team Members</div>
                </div>
                <div class="text-center fade-in-up" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-16 h-16 bg-purple-500/10 rounded-full flex items-center justify-center mx-auto mb-4 pulse-glow">
                        <i class="fas fa-clock text-purple-500 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-2">{{ $doctors->avg('experience_years') ?? 10 }}+</div>
                    <div class="text-gray-600">Years Experience</div>
                </div>
                <div class="text-center fade-in-up" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-16 h-16 bg-green-500/10 rounded-full flex items-center justify-center mx-auto mb-4 pulse-glow">
                        <i class="fas fa-star text-green-500 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-2">4.9</div>
                    <div class="text-gray-600">Average Rating</div>
                </div>
                <div class="text-center fade-in-up" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-16 h-16 bg-orange-500/10 rounded-full flex items-center justify-center mx-auto mb-4 pulse-glow">
                        <i class="fas fa-award text-orange-500 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-2">100%</div>
                    <div class="text-gray-600">Licensed</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Medical Team Section -->
    <div class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Meet Our Medical Professionals
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Our team of experienced veterinarians is dedicated to providing exceptional care for every animal
                </p>
            </div>

            @if($doctors->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
                    @foreach($doctors as $doctor)
                        <div class="doctor-card bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden group" 
                             data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="relative overflow-hidden">
                                @if($doctor->image)
                                    <img 
                                        src="{{ $doctor->image_url }}" 
                                        alt="{{ $doctor->name }}" 
                                        class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                                    >
                                @else
                                    <div class="w-full h-64 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                                        <i class="fas fa-user-md text-gray-400 text-6xl"></i>
                                    </div>
                                @endif
                                
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                
                                <div class="absolute top-4 right-4 {{ $doctor->status === 'active' ? 'bg-green-500' : 'bg-gray-500' }} text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ ucfirst($doctor->status) }}
                                </div>
                            </div>
                            
                            <div class="p-6 text-center">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">
                                    {{ $doctor->name }}
                                </h3>
                                <div class="specialization-badge text-white px-4 py-1 rounded-full text-sm font-semibold mb-4 inline-block">
                                    {{ $doctor->specialization }}
                                </div>

                                <div class="flex items-center justify-center space-x-4 text-sm text-gray-600 mb-4">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-clock text-primary"></i>
                                        <span>{{ $doctor->experience_years }}+ years</span>
                                    </div>
                                    @if($doctor->qualifications)
                                        <div class="flex items-center space-x-1">
                                            <i class="fas fa-graduation-cap text-primary"></i>
                                            <span>Licensed</span>
                                        </div>
                                    @endif
                                </div>

                                @if($doctor->bio)
                                    <p class="text-gray-700 mb-4 text-sm leading-relaxed">
                                        {{ Str::limit($doctor->bio, 120) }}
                                    </p>
                                @endif

                                <div class="flex items-center justify-center space-x-2 mb-4">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                                    @endfor
                                    <span class="text-sm text-gray-600 ml-2">({{ $doctor->rating ?? '5.0' }})</span>
                                </div>

                                <div class="space-y-2">
                                    @if($doctor->specializations)
                                        <div class="text-xs text-gray-500">
                                            <strong>Specializations:</strong> {{ $doctor->specializations }}
                                        </div>
                                    @endif
                                    @if($doctor->languages)
                                        <div class="text-xs text-gray-500">
                                            <strong>Languages:</strong> {{ $doctor->languages }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12" data-aos="fade-up">
                    <div class="bg-white rounded-xl p-8 max-w-md mx-auto">
                        <i class="fas fa-user-md text-4xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 text-lg">No medical team members available at the moment.</p>
                        <p class="text-gray-400 text-sm mt-2">Check back soon for our team updates!</p>
                    </div>
                </div>
            @endif

            <!-- Call to Action -->
            <div class="text-center mt-16" data-aos="fade-up">
                <div class="bg-white rounded-2xl shadow-lg p-8 max-w-2xl mx-auto">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">
                        Ready to Meet Our Team?
                    </h3>
                    <p class="text-gray-600 mb-6">
                        Book an appointment with one of our experienced veterinarians today
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('consultations.create') }}" 
                           class="bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-stethoscope mr-2"></i>
                            Book Consultation
                        </a>
                        <a href="{{ route('appointments.create') }}" 
                           class="bg-gray-800 text-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-700 transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-calendar-check mr-2"></i>
                            Book Appointment
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
                            <p class="text-sm text-gray-400">Medical Team</p>
                        </div>
                    </div>
                    <p class="text-gray-400">
                        Providing compassionate veterinary care with our expert medical team.
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
    </script>
</body>
</html>
