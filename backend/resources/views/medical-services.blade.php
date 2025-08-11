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
                    <a href="/medical-services" class="text-gray-600 hover:text-primary transition-colors">Medical Services</a>
                    <a href="/medical-team" class="text-gray-600 hover:text-primary transition-colors">Medical Team</a>
                    <a href="/success-stories" class="text-gray-600 hover:text-primary transition-colors">Success Stories</a>
                    <a href="/admin" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">Admin Panel</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="pt-40 pb-12 bg-gradient-to-br from-primary via-orange-400 to-yellow-300">
        <div class="max-w-7xl mx-auto px-4 text-center text-white">
            <h1 class="text-5xl md:text-7xl font-bold mb-6">
                Medical Services
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                Comprehensive veterinary care for rescued animals
            </p>
        </div>
    </div>

    <!-- Medical Services Grid -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Services</h2>
                <p class="text-xl text-gray-600">
                    Explore the range of medical services we offer to support animal health and recovery.
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- General Checkups -->
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">
                        General Checkups
                    </h3>
                    <p class="text-primary font-semibold mb-4">
                        Routine health assessments for all rescued animals.
                    </p>
                </div>

                <!-- Surgery -->
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">
                        Surgery
                    </h3>
                    <p class="text-primary font-semibold mb-4">
                        Expert surgical care for injuries and illnesses.
                    </p>
                </div>

                <!-- Vaccinations -->
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">
                        Vaccinations
                    </h3>
                    <p class="text-primary font-semibold mb-4">
                        Protecting animals from common diseases.
                    </p>
                </div>
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
