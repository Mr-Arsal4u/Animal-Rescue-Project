<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Services - Rescue The Voiceless</title>
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
                        <p class="text-sm text-gray-500">Medical Services</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-gray-600 hover:text-primary transition-colors">Home</a>
                    <a href="/medical-team" class="text-gray-600 hover:text-primary transition-colors">Medical Team</a>
                    <a href="/success-stories" class="text-gray-600 hover:text-primary transition-colors">Success Stories</a>
                    <a href="/admin" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">Admin Panel</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="pt-20 pb-12 bg-gradient-to-br from-orange-50 to-amber-50">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-6">
                Professional Medical Care
            </h1>
            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                Comprehensive veterinary services to keep your pets healthy and happy
            </p>
            <div class="flex justify-center items-center space-x-2 text-primary">
                <i class="fas fa-star"></i>
                <span class="font-semibold">Licensed Veterinarians</span>
                <i class="fas fa-star"></i>
            </div>
        </div>
    </div>

    <!-- Medical Services Grid -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Vaccination Services -->
                <div class="relative bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-primary">
                    <div class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-primary text-white px-4 py-1 rounded-full text-sm font-semibold">
                        Most Popular
                    </div>
                    
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">
                            Vaccination Services
                        </h3>
                        <p class="text-gray-600 mb-6">
                            Complete vaccination protocols for all pets including core vaccines and boosters
                        </p>
                        
                        <div class="space-y-3 mb-6 text-left">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Core Vaccines</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Booster Shots</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Rabies Vaccination</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Health Certificates</span>
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="text-2xl font-bold text-primary mb-3">
                                From $45
                            </div>
                            <button class="w-full bg-primary text-white py-2 px-4 rounded-lg hover:bg-orange-600 transition-colors">
                                Book Appointment
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Preventive Medicine -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-pills text-green-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">
                            Preventive Medicine
                        </h3>
                        <p class="text-gray-600 mb-6">
                            Comprehensive preventive care including flea, tick, and heartworm prevention
                        </p>
                        
                        <div class="space-y-3 mb-6 text-left">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Flea & Tick Control</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Heartworm Prevention</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Deworming</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Nutritional Supplements</span>
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="text-2xl font-bold text-primary mb-3">
                                From $35
                            </div>
                            <button class="w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-primary hover:text-white transition-colors">
                                Book Appointment
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Emergency Care -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-heartbeat text-red-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">
                            Emergency Care
                        </h3>
                        <p class="text-gray-600 mb-6">
                            24/7 emergency medical services for critical situations
                        </p>
                        
                        <div class="space-y-3 mb-6 text-left">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Emergency Surgery</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Critical Care</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Trauma Treatment</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Pain Management</span>
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="text-2xl font-bold text-primary mb-3">
                                From $150
                            </div>
                            <button class="w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-primary hover:text-white transition-colors">
                                Book Appointment
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Specialized Treatments -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="p-6 text-center">
                        <div class="w-16 h-16 bg-purple-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-syringe text-purple-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">
                            Specialized Treatments
                        </h3>
                        <p class="text-gray-600 mb-6">
                            Advanced medical treatments and specialized care for complex conditions
                        </p>
                        
                        <div class="space-y-3 mb-6 text-left">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Chemotherapy</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Dermatology</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Cardiology</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span class="text-sm text-gray-700">Orthopedic Care</span>
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="text-2xl font-bold text-primary mb-3">
                                From $200
                            </div>
                            <button class="w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-primary hover:text-white transition-colors">
                                Book Appointment
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <button class="bg-gray-800 text-white px-8 py-3 rounded-lg hover:bg-gray-700 transition-colors">
                    View All Services
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
