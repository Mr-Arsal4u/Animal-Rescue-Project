<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $animal->name }} - {{ $animal->breed }} | Rescue The Voiceless</title>
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
                    <a href="/animals" class="text-gray-600 hover:text-primary transition-colors">Animals</a>
                    <a href="/medical-services" class="text-gray-600 hover:text-primary transition-colors">Medical Services</a>
                    <a href="/medical-team" class="text-gray-600 hover:text-primary transition-colors">Medical Team</a>
                    <a href="/success-stories" class="text-gray-600 hover:text-primary transition-colors">Success Stories</a>
                    <a href="/admin" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition-colors">Admin Panel</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Success Message -->
    @if(session('success'))
    <div class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
        {{ session('success') }}
    </div>
    @endif

    <!-- Animal Details -->
    <div class="pt-20 pb-12">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm text-gray-500">
                    <li><a href="/" class="hover:text-primary">Home</a></li>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li><a href="/animals" class="hover:text-primary">Animals</a></li>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li class="text-gray-900">{{ $animal->name }}</li>
                </ol>
            </nav>

            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Animal Image -->
                <div class="space-y-6">
                    <div class="relative">
                        <img
                            src="{{ $animal->image_url ?? '/images/default-animal.svg' }}"
                            alt="{{ $animal->name }} - {{ $animal->breed }}"
                            class="w-full h-96 lg:h-[500px] object-cover rounded-2xl shadow-lg"
                        />
                        @if($animal->featured)
                        <div class="absolute top-4 left-4 bg-primary text-white px-4 py-2 rounded-full text-lg font-semibold">
                            Featured Animal
                        </div>
                        @endif
                        <div class="absolute top-4 right-4 bg-white bg-opacity-90 text-gray-800 px-4 py-2 rounded-full text-lg font-semibold">
                            {{ ucfirst($animal->type) }}
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-3 gap-4">
                        <div class="bg-white p-4 rounded-lg shadow text-center">
                            <div class="text-2xl font-bold text-primary">{{ $animal->age }}</div>
                            <div class="text-sm text-gray-600">Years Old</div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow text-center">
                            <div class="text-2xl font-bold text-primary">{{ ucfirst($animal->size) }}</div>
                            <div class="text-sm text-gray-600">Size</div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow text-center">
                            <div class="text-2xl font-bold text-primary">{{ ucfirst($animal->energy) }}</div>
                            <div class="text-sm text-gray-600">Energy Level</div>
                        </div>
                    </div>
                </div>

                <!-- Animal Information -->
                <div class="space-y-8">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $animal->name }}</h1>
                        <p class="text-2xl text-gray-600 mb-4">{{ $animal->breed }}</p>
                        <div class="flex items-center space-x-4 mb-6">
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">
                                Available for Adoption
                            </span>
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">
                                ID: {{ $animal->id }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">About {{ $animal->name }}</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $animal->description }}</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Characteristics</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="font-semibold text-gray-800">Type</div>
                                <div class="text-gray-600">{{ ucfirst($animal->type) }}</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="font-semibold text-gray-800">Breed</div>
                                <div class="text-gray-600">{{ $animal->breed }}</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="font-semibold text-gray-800">Age</div>
                                <div class="text-gray-600">{{ $animal->age }} years old</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="font-semibold text-gray-800">Size</div>
                                <div class="text-gray-600">{{ ucfirst($animal->size) }}</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="font-semibold text-gray-800">Energy Level</div>
                                <div class="text-gray-600">{{ ucfirst($animal->energy) }}</div>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="font-semibold text-gray-800">Status</div>
                                <div class="text-gray-600">{{ ucfirst($animal->status->value) }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Adoption CTA -->
                    <div class="bg-gradient-to-r from-primary to-orange-500 p-6 rounded-2xl text-white">
                        <h3 class="text-2xl font-bold mb-3">Ready to Give {{ $animal->name }} a Forever Home?</h3>
                        <p class="mb-6 opacity-90">
                            {{ $animal->name }} is looking for a loving family. Click below to start your adoption journey!
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('adoption.create', $animal) }}" class="bg-white text-primary px-8 py-4 rounded-lg font-bold text-lg hover:bg-gray-100 transition-colors text-center">
                                <i class="fas fa-heart mr-2"></i>
                                Adopt {{ $animal->name }} Now!
                            </a>
                            <a href="/animals" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-primary transition-colors text-center">
                                <i class="fas fa-search mr-2"></i>
                                View Other Animals
                            </a>
                        </div>
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
