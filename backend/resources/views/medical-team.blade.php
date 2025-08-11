<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Team - Rescue The Voiceless</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
                        <p class="text-sm text-gray-500">Medical Team</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-gray-600 hover:text-primary transition-colors">Home</a>
                    <a href="/animals" class="text-gray-600 hover:text-primary transition-colors">Animals</a>
                    <a href="/medical-services" class="text-gray-600 hover:text-primary transition-colors">Medical Services</a>
                    <a href="/success-stories" class="text-gray-600 hover:text-primary transition-colors">Success Stories</a>
                    <a href="/admin" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">Admin Panel</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="pt-20 pb-12 bg-gradient-to-br from-blue-50 to-purple-50">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-6">
                Our Expert Medical Team
            </h1>
            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                Dedicated veterinarians committed to providing the highest quality care
            </p>
            <div class="text-lg text-gray-700">
                <span class="font-semibold text-primary">{{ $doctors->count() }}</span> experienced professionals ready to help
            </div>
        </div>
    </div>

    <!-- Medical Team Section -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            @if($doctors->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-20">
                    @foreach($doctors as $doctor)
                        <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                            <div class="relative">
                                @if($doctor->image)
                                    <img 
                                        src="{{ $doctor->image_url }}" 
                                        alt="{{ $doctor->name }}" 
                                        class="w-full h-64 object-cover"
                                    >
                                @else
                                    <div class="w-full h-64 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                                        <i class="fas fa-user-md text-gray-400 text-6xl"></i>
                                    </div>
                                @endif
                                
                                <div class="absolute top-4 right-4 {{ $doctor->status === 'active' ? 'bg-green-500' : 'bg-gray-500' }} text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ ucfirst($doctor->status) }}
                                </div>
                            </div>
                            
                            <div class="p-6 text-center">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">
                                    {{ $doctor->name }}
                                </h3>
                                <p class="text-primary font-semibold mb-4">
                                    {{ $doctor->specialization }}
                                </p>

                                <div class="flex items-center justify-center space-x-4 text-sm text-gray-600 mb-4">
                                    <div class="flex items-center space-x-1">
                                        <i class="fas fa-clock"></i>
                                        <span>{{ $doctor->experience_years }}+ years</span>
                                    </div>
                                    @if($doctor->qualifications)
                                        <div class="flex items-center space-x-1">
                                            <i class="fas fa-award"></i>
                                            <span>Certified</span>
                                        </div>
                                    @endif
                                </div>

                                @if($doctor->bio)
                                    <div class="text-center mb-4">
                                        <p class="text-sm text-gray-600 leading-relaxed">
                                            {{ Str::limit($doctor->bio, 120) }}
                                        </p>
                                    </div>
                                @endif

                                @if($doctor->qualifications)
                                    <div class="space-y-2 mb-4">
                                        <div class="flex items-center space-x-2">
                                            <i class="fas fa-shield-alt text-primary"></i>
                                            <span class="text-sm text-gray-700">{{ Str::limit($doctor->qualifications, 30) }}</span>
                                        </div>
                                    </div>
                                @endif

                                @if($doctor->working_hours && is_array($doctor->working_hours))
                                    <div class="mb-4 p-3 bg-gray-50 rounded-lg">
                                        <h4 class="font-semibold text-gray-800 mb-2 text-sm">Working Hours</h4>
                                        <div class="text-xs text-gray-600 space-y-1">
                                            @foreach($doctor->working_hours as $day => $hours)
                                                <div class="flex justify-between">
                                                    <span class="capitalize">{{ $day }}:</span>
                                                    <span>{{ $hours }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <a href="{{ route('consultations.create') }}?doctor={{ urlencode($doctor->name) }}&specialization={{ urlencode($doctor->specialization) }}" class="w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-primary hover:text-white transition-colors inline-block text-center">
                                    <i class="fas fa-stethoscope mr-2"></i>
                                    Book Consultation
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- No Doctors Available -->
                <div class="text-center py-16">
                    <div class="w-24 h-24 mx-auto mb-6 bg-gray-200 rounded-full flex items-center justify-center">
                        <i class="fas fa-user-md text-gray-400 text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">No Medical Team Available</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">
                        We're currently building our medical team. Check back soon to meet our expert veterinarians!
                    </p>
                </div>
            @endif

            <!-- Call to Action Section -->
            <div class="text-center">
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-8 max-w-4xl mx-auto">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">
                        Need Immediate Medical Care?
                    </h3>
                    <p class="text-gray-600 mb-6">
                        Our team is here to provide emergency care and consultations. Don't hesitate to reach out for urgent medical attention.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('consultations.create') }}" class="bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors inline-block">
                            <i class="fas fa-stethoscope mr-2"></i>
                            Book Consultation
                        </a>
                        <a href="{{ route('appointments.create') }}" class="border border-primary text-primary px-8 py-3 rounded-lg font-semibold hover:bg-primary hover:text-white transition-colors inline-block">
                            <i class="fas fa-calendar-check mr-2"></i>
                            Schedule Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="py-16 bg-gradient-to-br from-blue-50 to-purple-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-white shadow-lg flex items-center justify-center">
                        <i class="fas fa-user-md text-blue-500 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-2">{{ $doctors->count() }}</div>
                    <div class="text-gray-600 font-medium">Medical Professionals</div>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-white shadow-lg flex items-center justify-center">
                        <i class="fas fa-clock text-green-500 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-2">{{ $doctors->avg('experience_years') }}+</div>
                    <div class="text-gray-600 font-medium">Avg. Experience</div>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-white shadow-lg flex items-center justify-center">
                        <i class="fas fa-stethoscope text-purple-500 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-2">{{ $doctors->unique('specialization')->count() }}</div>
                    <div class="text-gray-600 font-medium">Specializations</div>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-white shadow-lg flex items-center justify-center">
                        <i class="fas fa-calendar text-orange-500 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-2">24/7</div>
                    <div class="text-gray-600 font-medium">Emergency Care</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} Rescue The Voiceless. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
