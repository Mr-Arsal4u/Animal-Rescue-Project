<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Rescue The Voiceless</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-lg fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center"></div>
                    <div>
                        <h1 class="text-xl font-semibold text-gray-900">Rescue The Voiceless</h1>
                        <p class="text-sm text-gray-500">Admin Panel</p>
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
    <div class="pt-40 pb-12 bg-gradient-to-br from-primary via-orange-400 to-yellow-300">
        <div class="max-w-7xl mx-auto px-4 text-center text-white">
            <h1 class="text-5xl md:text-7xl font-bold mb-6">Admin Panel</h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">Manage rescue operations and site content</p>
        </div>
    </div>
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Welcome, Admin!</h2>
                <p class="text-xl text-gray-600">Use the panel below to manage animals, doctors, and stories.</p>
            </div>
            <!-- Example admin card -->
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Manage Animals</h3>
                    <p class="text-primary font-semibold mb-4">Add, edit, or remove animal records.</p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Manage Doctors</h3>
                    <p class="text-primary font-semibold mb-4">Add, edit, or remove doctor profiles.</p>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Manage Stories</h3>
                    <p class="text-primary font-semibold mb-4">Publish and update success stories.</p>
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
