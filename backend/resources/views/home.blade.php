<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rescue The Voiceless - Home</title>
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
                        <p class="text-sm text-gray-500">Every Life Deserves Love</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-gray-600 hover:text-primary transition-colors">Home</a>
                    <a href="/medical-services" class="text-gray-600 hover:text-primary transition-colors">Medical Services</a>
                    <a href="/medical-team" class="text-gray-600 hover:text-primary transition-colors">Medical Team</a>
                    <a href="/success-stories" class="text-gray-600 hover:text-primary transition-colors">Success Stories</a>
                    <a href="/admin" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">Admin Panel</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="pt-20 pb-12 bg-gradient-to-br from-primary via-orange-400 to-yellow-300">
        <div class="max-w-7xl mx-auto px-4 text-center text-white">
            <h1 class="text-5xl md:text-7xl font-bold mb-6">
                Every Life Deserves Love
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                Join us in giving abandoned animals a second chance at happiness
            </p>
            <div class="text-4xl font-bold mb-8">500+</div>
            <div class="space-x-4">
                <a href="/animals" class="inline-block bg-white text-primary px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors">
                    Find Your Best Friend
                </a>
                <button class="inline-block border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-primary transition-colors">
                    Volunteer Today
                </button>
            </div>
        </div>
    </div>

    <!-- Medical Services Preview -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Professional Medical Care
                </h2>
                <p class="text-xl text-gray-600">
                    Comprehensive veterinary services to keep your pets healthy and happy
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Vaccination Services</h3>
                    <p class="text-gray-600 mb-4">Complete vaccination protocols</p>
                    <div class="text-2xl font-bold text-primary mb-3">From $45</div>
                    <button class="w-full bg-primary text-white py-2 px-4 rounded-lg hover:bg-orange-600 transition-colors">
                        Book Appointment
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-heartbeat text-red-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Emergency Care</h3>
                    <p class="text-gray-600 mb-4">24/7 emergency services</p>
                    <div class="text-2xl font-bold text-primary mb-3">From $150</div>
                    <button class="w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-primary hover:text-white transition-colors">
                        Book Appointment
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-pills text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Preventive Medicine</h3>
                    <p class="text-gray-600 mb-4">Comprehensive preventive care</p>
                    <div class="text-2xl font-bold text-primary mb-3">From $35</div>
                    <button class="w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-primary hover:text-white transition-colors">
                        Book Appointment
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-16 h-16 bg-purple-50 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-syringe text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Specialized Treatments</h3>
                    <p class="text-gray-600 mb-4">Advanced medical treatments</p>
                    <div class="text-2xl font-bold text-primary mb-3">From $200</div>
                    <button class="w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-primary hover:text-white transition-colors">
                        Book Appointment
                    </button>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="/medical-services" class="bg-gray-800 text-white px-8 py-3 rounded-lg hover:bg-gray-700 transition-colors">
                    View All Services
                </a>
            </div>
        </div>
    </div>

    <!-- Medical Team Preview -->
    <div class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Our Expert Medical Team
                </h2>
                <p class="text-xl text-gray-600">
                    Dedicated veterinarians committed to providing the highest quality care
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-md text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Dr. Sarah Johnson</h3>
                    <p class="text-primary font-semibold mb-4">Veterinary Surgery</p>
                    <p class="text-sm text-gray-600 mb-4">8+ years experience • Board Certified</p>
                    <button class="w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-primary hover:text-white transition-colors">
                        Book Consultation
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-red-100 to-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-md text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Dr. Michael Chen</h3>
                    <p class="text-primary font-semibold mb-4">Emergency Medicine</p>
                    <p class="text-sm text-gray-600 mb-4">6+ years experience • Critical Care Certified</p>
                    <button class="w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-primary hover:text-white transition-colors">
                        Book Consultation
                    </button>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-green-100 to-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-md text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Dr. Emily Rodriguez</h3>
                    <p class="text-primary font-semibold mb-4">General Practice</p>
                    <p class="text-sm text-gray-600 mb-4">5+ years experience • Preventive Specialist</p>
                    <button class="w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-primary hover:text-white transition-colors">
                        Book Consultation
                    </button>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="/medical-team" class="bg-gray-800 text-white px-8 py-3 rounded-lg hover:bg-gray-700 transition-colors">
                    Meet Our Full Team
                </a>
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
