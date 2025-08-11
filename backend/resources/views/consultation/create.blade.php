<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Consultation | Rescue The Voiceless</title>
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

    <!-- Consultation Form -->
    <div class="pt-20 pb-12">
        <div class="max-w-4xl mx-auto px-4">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm text-gray-500">
                    <li><a href="/" class="hover:text-primary">Home</a></li>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li class="text-gray-900">Book Consultation</li>
                </ol>
            </nav>

            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">
                    Book a Veterinary Consultation
                </h1>
                <p class="text-xl text-gray-600">
                    Get expert veterinary care for your beloved pets
                </p>
            </div>

            <!-- Success Message -->
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-8">
                {{ session('success') }}
            </div>
            @endif

            <!-- Form -->
            <form action="{{ route('consultations.store') }}" method="POST" class="bg-white rounded-2xl shadow-lg p-8">
                @csrf
                
                <!-- Client Information -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Client Information</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="client_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Full Name *
                            </label>
                            <input
                                type="text"
                                id="client_name"
                                name="client_name"
                                value="{{ old('client_name') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('client_name') border-red-500 @enderror"
                                placeholder="Enter your full name"
                                required
                            />
                            @error('client_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="client_email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Email Address *
                            </label>
                            <input
                                type="email"
                                id="client_email"
                                name="client_email"
                                value="{{ old('client_email') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('client_email') border-red-500 @enderror"
                                placeholder="Enter your email address"
                                required
                            />
                            @error('client_email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="client_phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                Phone Number *
                            </label>
                            <input
                                type="tel"
                                id="client_phone"
                                name="client_phone"
                                value="{{ old('client_phone') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('client_phone') border-red-500 @enderror"
                                placeholder="Enter your phone number"
                                required
                            />
                            @error('client_phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="emergency_contact" class="block text-sm font-semibold text-gray-700 mb-2">
                                Emergency Contact *
                            </label>
                            <input
                                type="text"
                                id="emergency_contact"
                                name="emergency_contact"
                                value="{{ old('emergency_contact') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('emergency_contact') border-red-500 @enderror"
                                placeholder="Emergency contact person and number"
                                required
                            />
                            @error('emergency_contact')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Pet Information -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Pet Information</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="pet_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                Pet Name *
                            </label>
                            <input
                                type="text"
                                id="pet_name"
                                name="pet_name"
                                value="{{ old('pet_name') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('pet_name') border-red-500 @enderror"
                                placeholder="Enter your pet's name"
                                required
                            />
                            @error('pet_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="pet_type" class="block text-sm font-semibold text-gray-700 mb-2">
                                Pet Type *
                            </label>
                            <select
                                id="pet_type"
                                name="pet_type"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('pet_type') border-red-500 @enderror"
                                required
                            >
                                <option value="">Select pet type</option>
                                <option value="dog" {{ old('pet_type') == 'dog' ? 'selected' : '' }}>Dog</option>
                                <option value="cat" {{ old('pet_type') == 'cat' ? 'selected' : '' }}>Cat</option>
                                <option value="bird" {{ old('pet_type') == 'bird' ? 'selected' : '' }}>Bird</option>
                                <option value="rabbit" {{ old('pet_type') == 'rabbit' ? 'selected' : '' }}>Rabbit</option>
                                <option value="hamster" {{ old('pet_type') == 'hamster' ? 'selected' : '' }}>Hamster</option>
                                <option value="other" {{ old('pet_type') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('pet_type')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="pet_breed" class="block text-sm font-semibold text-gray-700 mb-2">
                                Pet Breed *
                            </label>
                            <input
                                type="text"
                                id="pet_breed"
                                name="pet_breed"
                                value="{{ old('pet_breed') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('pet_breed') border-red-500 @enderror"
                                placeholder="Enter your pet's breed"
                                required
                            />
                            @error('pet_breed')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="pet_age" class="block text-sm font-semibold text-gray-700 mb-2">
                                Pet Age (years) *
                            </label>
                            <input
                                type="number"
                                id="pet_age"
                                name="pet_age"
                                value="{{ old('pet_age') }}"
                                min="0"
                                max="30"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('pet_age') border-red-500 @enderror"
                                placeholder="Enter your pet's age"
                                required
                            />
                            @error('pet_age')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Consultation Details -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Consultation Details</h3>
                    <div class="space-y-6">
                        <div>
                            <label for="consultation_type" class="block text-sm font-semibold text-gray-700 mb-2">
                                Consultation Type *
                            </label>
                            <select
                                id="consultation_type"
                                name="consultation_type"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('consultation_type') border-red-500 @enderror"
                                required
                            >
                                <option value="">Select consultation type</option>
                                <option value="general_checkup" {{ old('consultation_type') == 'general_checkup' ? 'selected' : '' }}>General Checkup</option>
                                <option value="vaccination" {{ old('consultation_type') == 'vaccination' ? 'selected' : '' }}>Vaccination</option>
                                <option value="sick_pet" {{ old('consultation_type') == 'sick_pet' ? 'selected' : '' }}>Sick Pet Consultation</option>
                                <option value="dental_care" {{ old('consultation_type') == 'dental_care' ? 'selected' : '' }}>Dental Care</option>
                                <option value="surgery_consultation" {{ old('consultation_type') == 'surgery_consultation' ? 'selected' : '' }}>Surgery Consultation</option>
                                <option value="emergency" {{ old('consultation_type') == 'emergency' ? 'selected' : '' }}>Emergency Consultation</option>
                                <option value="other" {{ old('consultation_type') == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('consultation_type')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="symptoms_description" class="block text-sm font-semibold text-gray-700 mb-2">
                                Symptoms/Reason for Consultation *
                            </label>
                            <textarea
                                id="symptoms_description"
                                name="symptoms_description"
                                rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('symptoms_description') border-red-500 @enderror"
                                placeholder="Describe your pet's symptoms or reason for consultation..."
                                required
                            >{{ old('symptoms_description') }}</textarea>
                            @error('symptoms_description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="preferred_date" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Preferred Date *
                                </label>
                                <input
                                    type="date"
                                    id="preferred_date"
                                    name="preferred_date"
                                    value="{{ old('preferred_date') }}"
                                    min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('preferred_date') border-red-500 @enderror"
                                    required
                                />
                                @error('preferred_date')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="preferred_time" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Preferred Time *
                                </label>
                                <select
                                    id="preferred_time"
                                    name="preferred_time"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('preferred_time') border-red-500 @enderror"
                                    required
                                >
                                    <option value="">Select time</option>
                                    <option value="09:00" {{ old('preferred_time') == '09:00' ? 'selected' : '' }}>9:00 AM</option>
                                    <option value="10:00" {{ old('preferred_time') == '10:00' ? 'selected' : '' }}>10:00 AM</option>
                                    <option value="11:00" {{ old('preferred_time') == '11:00' ? 'selected' : '' }}>11:00 AM</option>
                                    <option value="12:00" {{ old('preferred_time') == '12:00' ? 'selected' : '' }}>12:00 PM</option>
                                    <option value="14:00" {{ old('preferred_time') == '14:00' ? 'selected' : '' }}>2:00 PM</option>
                                    <option value="15:00" {{ old('preferred_time') == '15:00' ? 'selected' : '' }}>3:00 PM</option>
                                    <option value="16:00" {{ old('preferred_time') == '16:00' ? 'selected' : '' }}>4:00 PM</option>
                                    <option value="17:00" {{ old('preferred_time') == '17:00' ? 'selected' : '' }}>5:00 PM</option>
                                </select>
                                @error('preferred_time')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="additional_notes" class="block text-sm font-semibold text-gray-700 mb-2">
                                Additional Notes (Optional)
                            </label>
                            <textarea
                                id="additional_notes"
                                name="additional_notes"
                                rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('additional_notes') border-red-500 @enderror"
                                placeholder="Any additional information you'd like to share..."
                            >{{ old('additional_notes') }}</textarea>
                            @error('additional_notes')
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
                            I understand that this is a consultation request and I will be contacted to confirm the appointment. I agree to the consultation terms and conditions. *
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
                        <i class="fas fa-calendar-check mr-2"></i>
                        Submit Consultation Request
                    </button>
                    <a
                        href="/"
                        class="flex-1 border-2 border-gray-300 text-gray-700 py-4 px-8 rounded-lg font-semibold text-lg hover:border-primary hover:text-primary transition-colors text-center"
                    >
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Home
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
                    <p>• We'll review your consultation request within 24 hours</p>
                    <p>• You'll receive a confirmation call or email</p>
                    <p>• We may request additional information if needed</p>
                    <p>• Consultation fees will be discussed during confirmation</p>
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
