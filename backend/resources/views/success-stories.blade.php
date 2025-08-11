<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Stories - Rescue The Voiceless</title>
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
                        <p class="text-sm text-gray-500">Success Stories</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/" class="text-gray-600 hover:text-primary transition-colors">Home</a>
                    <a href="/animals" class="text-gray-600 hover:text-primary transition-colors">Animals</a>
                    <a href="/medical-services" class="text-gray-600 hover:text-primary transition-colors">Medical Services</a>
                    <a href="/medical-team" class="text-gray-600 hover:text-primary transition-colors">Medical Team</a>
                    <a href="/admin" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">Admin Panel</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="pt-20 pb-12 bg-gradient-to-br from-orange-50 to-amber-50">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-6">
                Success Stories
            </h1>
            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                Real transformations that show the power of love, care, and dedication
            </p>
            <div class="text-lg text-gray-700">
                <span class="font-semibold text-primary">{{ $totalStories }}</span> amazing stories of hope and recovery
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-white shadow-lg flex items-center justify-center">
                        <i class="fas fa-heart text-red-500 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-2">{{ $totalAnimals }}+</div>
                    <div class="text-gray-600 font-medium">Animals Rescued</div>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-white shadow-lg flex items-center justify-center">
                        <i class="fas fa-star text-yellow-500 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-2">{{ $featuredStories }}</div>
                    <div class="text-gray-600 font-medium">Featured Stories</div>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-white shadow-lg flex items-center justify-center">
                        <i class="fas fa-users text-green-500 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-2">{{ $totalAdoptions }}+</div>
                    <div class="text-gray-600 font-medium">Happy Adoptions</div>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-white shadow-lg flex items-center justify-center">
                        <i class="fas fa-calendar text-blue-500 text-2xl"></i>
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-2">24/7</div>
                    <div class="text-gray-600 font-medium">Emergency Care</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Stories Section -->
    <div class="py-20 bg-gradient-to-br from-orange-50 to-amber-50">
        <div class="max-w-7xl mx-auto px-4">
            @if($successStories->count() > 0)
                <div class="space-y-12">
                    @foreach($successStories as $story)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden {{ $story->featured ? 'border-2 border-primary' : '' }}">
                            @if($story->featured)
                                <div class="absolute top-4 left-4 bg-primary text-white px-4 py-1 rounded-full text-sm font-semibold">
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
                                                <img src="{{ asset('storage/' . $story->before_image) }}" 
                                                     alt="{{ $story->name }} - Before" 
                                                     class="w-full h-48 object-cover rounded-lg">
                                            @else
                                                <div class="w-full h-48 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center">
                                                    <i class="fas fa-image text-gray-400 text-3xl"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="space-y-2">
                                            <div class="text-center text-sm font-semibold text-gray-600">After</div>
                                            @if($story->after_image)
                                                <img src="{{ asset('storage/' . $story->after_image) }}" 
                                                     alt="{{ $story->name }} - After" 
                                                     class="w-full h-48 object-cover rounded-lg">
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
                                            {{ $story->name }}
                                        </h3>
                                        <div class="flex items-center space-x-4 text-sm text-gray-600 mb-3">
                                            <span class="font-semibold">{{ $story->breed }}</span>
                                            <span>•</span>
                                            <span class="capitalize">{{ $story->type }}</span>
                                        </div>
                                    </div>

                                    <p class="text-gray-700 mb-6 leading-relaxed">
                                        {{ $story->story }}
                                    </p>

                                    @if($story->stats && is_array($story->stats))
                                        <div class="space-y-3 mb-6">
                                            @foreach($story->stats as $stat)
                                                <div class="flex items-center space-x-2">
                                                    <div class="w-2 h-2 bg-primary rounded-full"></div>
                                                    <span class="text-sm text-gray-700 font-medium">{{ $stat }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

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
                                            {{ $story->adoption_date ? $story->adoption_date->format('F Y') : 'Recently' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- No Stories Available -->
                <div class="text-center py-16">
                    <div class="w-24 h-24 mx-auto mb-6 bg-gray-200 rounded-full flex items-center justify-center">
                        <i class="fas fa-book-open text-gray-400 text-4xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">No Success Stories Yet</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">
                        We're working on creating amazing success stories. Check back soon for inspiring tales of rescue and recovery!
                    </p>
                </div>
            @endif

            <!-- Call to Action -->
            <div class="text-center mt-16">
                <div class="bg-white rounded-2xl shadow-lg p-8 max-w-2xl mx-auto">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">
                        Be Part of the Next Success Story
                    </h3>
                    <p class="text-gray-600 mb-6">
                        Your support helps us rescue, rehabilitate, and rehome more animals in need. 
                        Every donation, volunteer hour, and adoption makes a difference.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/animals" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition-colors inline-block">
                            <i class="fas fa-heart mr-2"></i>
                            Adopt Today
                        </a>
                        <a href="/" class="border border-primary text-primary px-6 py-3 rounded-lg hover:bg-primary hover:text-white transition-colors inline-block">
                            <i class="fas fa-arrow-right mr-2"></i>
                            Back to Home
                        </a>
                    </div>
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
