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
        </div>
    </div>

    <!-- Medical Team Section -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8 mb-20">
                <!-- Dr. Sarah Johnson -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                    <div class="relative">
                        <div class="w-full h-64 bg-gradient-to-br from-blue-100 to-purple-100 flex items-center justify-center">
                            <i class="fas fa-user-md text-gray-400 text-6xl"></i>
                        </div>
                        <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Available
                        </div>
                    </div>
                    
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">
                            Dr. Sarah Johnson
                        </h3>
                        <p class="text-primary font-semibold mb-4">
                            Veterinary Surgery
                        </p>

                        <div class="flex items-center justify-center space-x-4 text-sm text-gray-600 mb-4">
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-clock"></i>
                                <span>8+ years</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-award"></i>
                                <span>Expert</span>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <h4 class="font-semibold text-gray-800 mb-2">
                                Orthopedic Surgery
                            </h4>
                            <p class="text-sm text-gray-600">
                                Performing complex orthopedic procedures to restore mobility in injured animals
                            </p>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-shield-alt text-primary"></i>
                                <span class="text-sm text-gray-700">Board Certified</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-shield-alt text-primary"></i>
                                <span class="text-sm text-gray-700">500+ Surgeries</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-shield-alt text-primary"></i>
                                <span class="text-sm text-gray-700">Emergency Specialist</span>
                            </div>
                        </div>

                        <button class="w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-primary hover:text-white transition-colors" onclick="window.location='{{ route('consultations.create') }}'">
                            <i class="fas fa-stethoscope mr-2"></i>
                            Book Consultation
                        </button>
                    </div>
                </div>

                <!-- Dr. Michael Chen -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                    <div class="relative">
                        <div class="w-full h-64 bg-gradient-to-br from-red-100 to-orange-100 flex items-center justify-center">
                            <i class="fas fa-user-md text-gray-400 text-6xl"></i>
                        </div>
                        <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Available
                        </div>
                    </div>
                    
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">
                            Dr. Michael Chen
                        </h3>
                        <p class="text-primary font-semibold mb-4">
                            Emergency Medicine
                        </p>

                        <div class="flex items-center justify-center space-x-4 text-sm text-gray-600 mb-4">
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-clock"></i>
                                <span>6+ years</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-award"></i>
                                <span>Expert</span>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <h4 class="font-semibold text-gray-800 mb-2">
                                Emergency Trauma Care
                            </h4>
                            <p class="text-sm text-gray-600">
                                Providing critical care and emergency treatment for animals in life-threatening situations
                            </p>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-shield-alt text-primary"></i>
                                <span class="text-sm text-gray-700">Critical Care Certified</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-shield-alt text-primary"></i>
                                <span class="text-sm text-gray-700">24/7 Emergency</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-shield-alt text-primary"></i>
                                <span class="text-sm text-gray-700">Trauma Expert</span>
                            </div>
                        </div>

                        <button class="w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-primary hover:text-white transition-colors" onclick="window.location='{{ route('consultations.create') }}'">
                            <i class="fas fa-stethoscope mr-2"></i>
                            Book Consultation
                        </button>
                    </div>
                </div>

                <!-- Dr. Emily Rodriguez -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                    <div class="relative">
                        <div class="w-full h-64 bg-gradient-to-br from-green-100 to-blue-100 flex items-center justify-center">
                            <i class="fas fa-user-md text-gray-400 text-6xl"></i>
                        </div>
                        <div class="absolute top-4 right-4 bg-green-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Available
                        </div>
                    </div>
                    
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">
                            Dr. Emily Rodriguez
                        </h3>
                        <p class="text-primary font-semibold mb-4">
                            General Practice
                        </p>

                        <div class="flex items-center justify-center space-x-4 text-sm text-gray-600 mb-4">
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-clock"></i>
                                <span>5+ years</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <i class="fas fa-award"></i>
                                <span>Expert</span>
                            </div>
                        </div>

                        <div class="text-center mb-4">
                            <h4 class="font-semibold text-gray-800 mb-2">
                                Preventive Care
                            </h4>
                            <p class="text-sm text-gray-600">
                                Comprehensive wellness exams and preventive medicine for all types of pets
                            </p>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-shield-alt text-primary"></i>
                                <span class="text-sm text-gray-700">Preventive Specialist</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-shield-alt text-primary"></i>
                                <span class="text-sm text-gray-700">Nutrition Expert</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-shield-alt text-primary"></i>
                                <span class="text-sm text-gray-700">Behavioral Medicine</span>
                            </div>
                        </div>

                        <button class="w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-primary hover:text-white transition-colors" onclick="window.location='{{ route('consultations.create') }}'">
                            <i class="fas fa-stethoscope mr-2"></i>
                            Book Consultation
                        </button>
                    </div>
                </div>
            </div>

            <!-- Facilities Section -->
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    State-of-the-Art Facilities
                </h2>
                <p class="text-xl text-gray-600">
                    Advanced medical equipment and facilities for comprehensive care
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Surgical Procedures -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <div class="relative overflow-hidden">
                        <div class="w-full h-48 bg-gradient-to-br from-gray-100 to-blue-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-procedures text-gray-400 text-4xl"></i>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">
                            Surgical Procedures
                        </h3>
                        <p class="text-gray-600 mb-4">
                            State-of-the-art surgical suite equipped for complex procedures
                        </p>
                        
                        <div class="space-y-3">
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-primary rounded-full"></div>
                                <span class="text-sm text-gray-700 font-medium">500+ Surgeries</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-primary rounded-full"></div>
                                <span class="text-sm text-gray-700 font-medium">98% Success Rate</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-primary rounded-full"></div>
                                <span class="text-sm text-gray-700 font-medium">24/7 Availability</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Emergency Care -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <div class="relative overflow-hidden">
                        <div class="w-full h-48 bg-gradient-to-br from-red-100 to-orange-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-ambulance text-gray-400 text-4xl"></i>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">
                            Emergency Care
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Round-the-clock emergency services for critical situations
                        </p>
                        
                        <div class="space-y-3">
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-primary rounded-full"></div>
                                <span class="text-sm text-gray-700 font-medium">24/7 Emergency</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-primary rounded-full"></div>
                                <span class="text-sm text-gray-700 font-medium">Rapid Response</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-primary rounded-full"></div>
                                <span class="text-sm text-gray-700 font-medium">Critical Care Unit</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Diagnostic Imaging -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
                    <div class="relative overflow-hidden">
                        <div class="w-full h-48 bg-gradient-to-br from-purple-100 to-pink-100 flex items-center justify-center group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-x-ray text-gray-400 text-4xl"></i>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">
                            Diagnostic Imaging
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Advanced imaging technology for accurate diagnosis and treatment
                        </p>
                        
                        <div class="space-y-3">
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-primary rounded-full"></div>
                                <span class="text-sm text-gray-700 font-medium">X-Ray</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-primary rounded-full"></div>
                                <span class="text-sm text-gray-700 font-medium">Ultrasound</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-primary rounded-full"></div>
                                <span class="text-sm text-gray-700 font-medium">Digital Imaging</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <button class="bg-gray-800 text-white px-8 py-3 rounded-lg hover:bg-gray-700 transition-colors">
                    Meet Our Full Team
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 Rescue The Voiceless. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
