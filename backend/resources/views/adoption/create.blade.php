<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt {{ $animal->name }} | Rescue The Voiceless</title>
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

    <!-- Adoption Form -->
    <div class="pt-20 pb-12">
        <div class="max-w-4xl mx-auto px-4">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm text-gray-500">
                    <li><a href="/" class="hover:text-primary">Home</a></li>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li><a href="/animals" class="hover:text-primary">Animals</a></li>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li><a href="{{ route('animals.show', $animal) }}" class="hover:text-primary">{{ $animal->name }}</a></li>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li class="text-gray-900">Adoption Form</li>
                </ol>
            </nav>

            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">
                    Adopt {{ $animal->name }}
                </h1>
                <p class="text-xl text-gray-600">
                    Complete this form to start your adoption journey with {{ $animal->name }}
                </p>
            </div>

            <!-- Animal Preview -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                <div class="flex items-center space-x-6">
                    <img
                        src="{{ $animal->image_url ?? '/images/default-animal.svg' }}"
                        alt="{{ $animal->name }}"
                        class="w-24 h-24 object-cover rounded-lg"
                    />
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $animal->name }}</h3>
                        <p class="text-gray-600">{{ $animal->breed }} • {{ $animal->age }} years old</p>
                        <p class="text-gray-500">{{ ucfirst($animal->type) }}</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('adoption.store', $animal) }}" method="POST" class="bg-white rounded-2xl shadow-lg p-8">
                @csrf
                
                <!-- Personal Information -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Personal Information</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="adopter_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Full Name *
                            </label>
                            <input
                                type="text"
                                id="adopter_name"
                                name="adopter_name"
                                value="{{ old('adopter_name') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('adopter_name') border-red-500 @enderror"
                                placeholder="Enter your full name"
                                required
                            />
                            @error('adopter_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="adopter_email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Email Address *
                            </label>
                            <input
                                type="email"
                                id="adopter_email"
                                name="adopter_email"
                                value="{{ old('adopter_email') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('adopter_email') border-red-500 @enderror"
                                placeholder="Enter your email address"
                                required
                            />
                            @error('adopter_email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="adopter_phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                Phone Number *
                            </label>
                            <input
                                type="tel"
                                id="adopter_phone"
                                name="adopter_phone"
                                value="{{ old('adopter_phone') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('adopter_phone') border-red-500 @enderror"
                                placeholder="Enter your phone number"
                                required
                            />
                            @error('adopter_phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="adopter_address" class="block text-sm font-semibold text-gray-700 mb-2">
                                Address *
                            </label>
                            <textarea
                                id="adopter_address"
                                name="adopter_address"
                                rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('adopter_address') border-red-500 @enderror"
                                placeholder="Enter your full address"
                                required
                            >{{ old('adopter_address') }}</textarea>
                            @error('adopter_address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Adoption Details -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Adoption Details</h3>
                    <div class="space-y-6">
                        <div>
                            <label for="adopter_reason" class="block text-sm font-semibold text-gray-700 mb-2">
                                Why do you want to adopt {{ $animal->name }}? *
                            </label>
                            <textarea
                                id="adopter_reason"
                                name="adopter_reason"
                                rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('adopter_reason') border-red-500 @enderror"
                                placeholder="Tell us about your motivation for adoption..."
                                required
                            >{{ old('adopter_reason') }}</textarea>
                            @error('adopter_reason')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="adopter_experience" class="block text-sm font-semibold text-gray-700 mb-2">
                                What experience do you have with pets? *
                            </label>
                            <textarea
                                id="adopter_experience"
                                name="adopter_experience"
                                rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('adopter_experience') border-red-500 @enderror"
                                placeholder="Describe your experience with pets..."
                                required
                            >{{ old('adopter_experience') }}</textarea>
                            @error('adopter_experience')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="adopter_housing_type" class="block text-sm font-semibold text-gray-700 mb-2">
                                Describe your living situation *
                            </label>
                            <textarea
                                id="adopter_housing_type"
                                name="adopter_housing_type"
                                rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('adopter_housing_type') border-red-500 @enderror"
                                placeholder="Tell us about your home, yard, etc..."
                                required
                            >{{ old('adopter_housing_type') }}</textarea>
                            @error('adopter_housing_type')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="adopter_other_pets" class="block text-sm font-semibold text-gray-700 mb-2">
                                Do you have other pets? (Optional)
                            </label>
                            <textarea
                                id="adopter_other_pets"
                                name="adopter_other_pets"
                                rows="2"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('adopter_other_pets') border-red-500 @enderror"
                                placeholder="Tell us about any other pets in your home..."
                            >{{ old('adopter_other_pets') }}</textarea>
                            @error('adopter_other_pets')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Agreement -->
                <div class="mb-8">
                    <div class="flex items-start space-x-3">
                        <input
                            type="checkbox"
                            id="agreement"
                            name="agreement"
                            class="mt-1 w-5 h-5 text-primary border-gray-300 rounded focus:ring-primary @error('agreement') border-red-500 @enderror"
                            required
                        />
                        <label for="agreement" class="text-sm text-gray-700">
                            I understand that adopting a pet is a lifelong commitment and I am prepared to provide {{ $animal->name }} with a loving, permanent home. I agree to the adoption terms and conditions. *
                        </label>
                    </div>
                    @error('agreement')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button
                        type="submit"
                        class="flex-1 bg-primary text-white py-4 px-8 rounded-lg font-bold text-lg hover:bg-orange-600 transition-colors"
                    >
                        <i class="fas fa-heart mr-2"></i>
                        Submit Adoption Request
                    </button>
                    <a
                        href="{{ route('animals.show', $animal) }}"
                        class="flex-1 border-2 border-gray-300 text-gray-700 py-4 px-8 rounded-lg font-semibold text-lg hover:border-primary hover:text-primary transition-colors text-center"
                    >
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to {{ $animal->name }}
                    </a>
                </div>
            </form>

            <!-- Information Box -->
            <div class="mt-8 bg-blue-50 border border-blue-200 rounded-2xl p-6">
                <h4 class="text-lg font-semibold text-blue-800 mb-3">
                    <i class="fas fa-info-circle mr-2"></i>
                    What happens next?
                </h4>
                <div class="text-blue-700 space-y-2">
                    <p>• We'll review your application within 2-3 business days</p>
                    <p>• You may be contacted for additional information or a home visit</p>
                    <p>• If approved, we'll schedule a meet-and-greet with {{ $animal->name }}</p>
                    <p>• Adoption fees and final paperwork will be completed upon approval</p>
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
