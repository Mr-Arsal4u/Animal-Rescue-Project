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
    <div class="pt-40 pb-12 bg-gradient-to-br from-primary via-orange-400 to-yellow-300">
        <div class="max-w-7xl mx-auto px-4 text-center text-white">
            <h1 class="text-5xl md:text-7xl font-bold mb-6">
                Every Life Deserves Love
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90">
                Join us in giving abandoned animals a second chance at happiness
            </p>
            <div class="text-4xl font-bold mb-8">{{ $statistics[0]['number'] }}</div>
            <div class="space-x-4">
                <a href="/animals" class="inline-block bg-white text-primary px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors">
                    Find Your Best Friend
                </a>
                <a href="/medical-services" class="inline-block border-2 border-white text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-white hover:text-primary transition-colors">
                    Book Medical Care
                </a>
            </div>
        </div>
    </div>

    <!-- Featured Animals Section -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Meet Our Featured Friends
                </h2>
                <p class="text-xl text-gray-600">
                    These amazing animals are looking for their forever homes
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($featuredAnimals as $animal)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 group">
                    <img
                        src="{{ $animal->image_url ?? '/images/default-animal.svg' }}"
                        alt="{{ $animal->name }} - {{ $animal->breed }}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                    />

                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-2">
                            {{ $animal->name }}
                        </h3>
                        <p class="text-gray-600 mb-3">
                            {{ $animal->breed }} • {{ $animal->age }} years old
                        </p>
                        <p class="text-gray-700 mb-4">{{ Str::limit($animal->description, 100) }}</p>

                        <a href="/animals" class="w-full bg-primary text-white py-3 px-4 rounded-lg hover:bg-orange-600 transition-colors inline-block text-center font-semibold">
                            <i class="fas fa-heart mr-2"></i>
                            Meet Me!
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 text-lg">No featured animals available at the moment.</p>
                </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="/animals" class="bg-gray-800 text-white px-8 py-3 rounded-lg hover:bg-gray-700 transition-colors">
                    View All Animals
                </a>
            </div>
        </div>
    </div>

    <!-- Medical Services Preview -->
    <div class="py-20 bg-gray-50">
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
                @foreach($medicalServices as $service)
                <div class="bg-white rounded-xl shadow-lg p-6 text-center {{ $service['popular'] ? 'ring-2 ring-primary' : '' }}">
                    @if($service['popular'])
                    <div class="absolute -top-2 -right-2 bg-primary text-white text-xs px-2 py-1 rounded-full">Popular</div>
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
                    <div class="text-2xl font-bold text-primary mb-3">{{ $service['price'] }}</div>
                    <a href="/medical-services" class="w-full bg-primary text-white py-2 px-4 rounded-lg hover:bg-orange-600 transition-colors inline-block text-center">
                        Book Appointment
                    </a>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="/medical-services" class="bg-gray-800 text-white px-8 py-3 rounded-lg hover:bg-gray-700 transition-colors">
                    View All Services
                </a>
            </div>
        </div>
    </div>

    <!-- Quick Booking Section -->
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Book Your Pet's Care Today
                </h2>
                <p class="text-xl text-gray-600">
                    Get professional veterinary care for your beloved pets
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <!-- Consultation Card -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl shadow-lg p-8 text-center">
                    <div class="w-20 h-20 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-stethoscope text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Book a Consultation</h3>
                    <p class="text-gray-600 mb-6">
                        Get expert advice from our veterinary team. Perfect for general checkups, 
                        vaccinations, and health concerns.
                    </p>
                    <a href="/medical-services" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                        Book Consultation
                    </a>
                </div>

                <!-- Appointment Card -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-100 rounded-2xl shadow-lg p-8 text-center">
                    <div class="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar-check text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">Schedule an Appointment</h3>
                    <p class="text-gray-600 mb-6">
                        Book a specific time slot for surgery, emergency care, or specialized 
                        treatments with our medical team.
                    </p>
                    <a href="/medical-services" class="inline-block bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                        Book Appointment
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Medical Team Preview -->
    <div class="py-20 bg-white">
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
                @forelse($doctors as $doctor)
                <div class="bg-white rounded-xl shadow-lg p-6 text-center">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        @if($doctor->image_url)
                            <img src="{{ $doctor->image_url }}" alt="{{ $doctor->name }}" class="w-full h-full rounded-full object-cover">
                        @else
                            <i class="fas fa-user-md text-gray-400 text-3xl"></i>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $doctor->name }}</h3>
                    <p class="text-primary font-semibold mb-4">{{ $doctor->specialization }}</p>
                    <p class="text-sm text-gray-600 mb-4">{{ $doctor->experience }} years experience • {{ $doctor->qualifications }}</p>
                    <a href="/medical-services" class="w-full border border-primary text-primary py-2 px-4 rounded-lg hover:bg-primary hover:text-white transition-colors inline-block text-center">
                        Book Consultation
                    </a>
                </div>
                @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-gray-500 text-lg">No doctors available at the moment.</p>
                </div>
                @endforelse
            </div>

            <div class="text-center mt-12">
                <a href="/medical-team" class="bg-gray-800 text-white px-8 py-3 rounded-lg hover:bg-gray-700 transition-colors">
                    Meet Our Full Team
                </a>
            </div>
        </div>
    </div>

    <!-- Success Stories Section -->
    <div class="py-20 bg-gradient-to-br from-orange-50 to-amber-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">
                    Success Stories
                </h2>
                <p class="text-xl text-gray-600 mb-8">
                    Real transformations that show the power of love, care, and dedication
                </p>
            </div>

            <!-- Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">
                @foreach($statistics as $stat)
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-white shadow-lg flex items-center justify-center">
                        @if($stat['icon'] === 'heart')
                            <i class="fas fa-heart {{ $stat['color'] }} text-2xl"></i>
                        @elseif($stat['icon'] === 'star')
                            <i class="fas fa-star {{ $stat['color'] }} text-2xl"></i>
                        @elseif($stat['icon'] === 'users')
                            <i class="fas fa-users {{ $stat['color'] }} text-2xl"></i>
                        @elseif($stat['icon'] === 'calendar')
                            <i class="fas fa-calendar {{ $stat['color'] }} text-2xl"></i>
                        @endif
                    </div>
                    <div class="text-3xl font-bold text-gray-800 mb-2">{{ $stat['number'] }}</div>
                    <div class="text-gray-600 font-medium">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>

            <!-- Success Stories -->
            <div class="space-y-12">
                @forelse($successStories as $story)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden {{ $story->featured ? 'ring-2 ring-primary' : '' }}">
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
                                    <div class="text-center text-sm font-semibold text-gray-600">Before</div>
                                    <div class="w-full h-48 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-heart text-gray-400 text-3xl"></i>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="text-center text-sm font-semibold text-gray-600">After</div>
                                    <div class="w-full h-48 bg-gradient-to-br from-green-200 to-blue-200 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-heart text-green-500 text-3xl"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Story Content -->
                        <div class="md:w-1/2 p-6">
                            <div class="mb-4">
                                <h3 class="text-2xl font-bold text-gray-800 mb-2">
                                    {{ $story->name }}'s Journey
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
                                    <span class="text-sm text-gray-700 font-medium">{{ $stat }}</span>
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
                    <p class="text-gray-500 text-lg">No success stories available at the moment.</p>
                </div>
                @endforelse
            </div>

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
                        <a href="/animals" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                            <i class="fas fa-heart mr-2"></i>
                            Adopt Today
                        </a>
                        <a href="/success-stories" class="border border-primary text-primary px-6 py-3 rounded-lg font-semibold hover:bg-primary hover:text-white transition-colors">
                            View More Stories
                        </a>
                    </div>
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
