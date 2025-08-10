<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Animals - Rescue The Voiceless</title>
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

    <!-- Header Section -->
    <div class="pt-20 pb-12 bg-gradient-to-br from-primary via-orange-400 to-yellow-300">
        <div class="max-w-7xl mx-auto px-4 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">
                Meet Our Animals
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                Find your perfect companion from our rescued animals
            </p>
            <div class="text-2xl font-semibold opacity-90">
                {{ $animals->total() }} animals looking for homes
            </div>
        </div>
    </div>

    <!-- Animals Grid -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Filter and Search -->
            <div class="mb-8 flex flex-col md:flex-row gap-4 justify-between items-center">
                <div class="text-gray-600">
                    Showing {{ $animals->firstItem() ?? 0 }} to {{ $animals->lastItem() ?? 0 }} of {{ $animals->total() }} animals
                </div>
                <div class="flex gap-2">
                    <input type="text" placeholder="Search animals..." class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        <option value="">All Types</option>
                        <option value="dog">Dogs</option>
                        <option value="cat">Cats</option>
                        <option value="bird">Birds</option>
                        <option value="rabbit">Rabbits</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>

            <!-- Animals Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($animals as $animal)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 group">
                    <div class="relative">
                        <img
                            src="{{ $animal->image_url ?? '/images/default-animal.svg' }}"
                            alt="{{ $animal->name }} - {{ $animal->breed }}"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                        />
                        @if($animal->featured)
                        <div class="absolute top-4 left-4 bg-primary text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Featured
                        </div>
                        @endif
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-gray-800 px-3 py-1 rounded-full text-sm font-semibold">
                            {{ ucfirst($animal->type) }}
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">
                            {{ $animal->name }}
                        </h3>
                        <p class="text-gray-600 mb-3">
                            {{ $animal->breed }} • {{ $animal->age }} years old
                        </p>
                        <p class="text-gray-700 mb-4">{{ Str::limit($animal->description, 100) }}</p>

                        <div class="flex gap-2 mb-4">
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                                {{ ucfirst($animal->size) }}
                            </span>
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                                {{ ucfirst($animal->energy) }} Energy
                            </span>
                        </div>

                        <a href="{{ route('animals.show', $animal) }}" class="w-full bg-gray-800 text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition-colors inline-block text-center font-semibold mb-2">
                            <i class="fas fa-eye mr-2"></i>
                            View Details
                        </a>

                        <a href="{{ route('adoption.create', $animal) }}" class="w-full bg-primary text-white py-3 px-4 rounded-lg hover:bg-orange-600 transition-colors inline-block text-center font-semibold">
                            <i class="fas fa-heart mr-2"></i>
                            Adopt Me!
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <div class="text-gray-500 text-lg mb-4">No animals available at the moment.</div>
                    <p class="text-gray-400">Please check back later or contact us for more information.</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($animals->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $animals->links() }}
            </div>
            @endif
        </div>
    </div>

    <!-- Call to Action -->
    <div class="py-20 bg-gradient-to-br from-orange-50 to-amber-50">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                Can't Find Your Perfect Match?
            </h2>
            <p class="text-xl text-gray-600 mb-8">
                We rescue new animals regularly. Contact us to be notified when new animals arrive, or consider fostering while you wait for the perfect companion.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/" class="bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                    <i class="fas fa-home mr-2"></i>
                    Back to Home
                </a>
                <button class="border border-primary text-primary px-8 py-3 rounded-lg font-semibold hover:bg-primary hover:text-white transition-colors">
                    <i class="fas fa-envelope mr-2"></i>
                    Contact Us
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
