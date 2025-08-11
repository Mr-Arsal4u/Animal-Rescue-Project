<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment | Rescue The Voiceless</title>
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

    <!-- Appointment Form -->
    <div class="pt-20 pb-12">
        <div class="max-w-4xl mx-auto px-4">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm text-gray-500">
                    <li><a href="/" class="hover:text-primary">Home</a></li>
                    <li><i class="fas fa-chevron-right"></i></li>
                    <li class="text-gray-900">Book Appointment</li>
                </ol>
            </nav>

            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-4">
                    Book a Veterinary Appointment
                </h1>
                <p class="text-xl text-gray-600">
                    Schedule an appointment for your pet with our expert team
                </p>
            </div>

            <!-- Success Message -->
            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-8">
                {{ session('success') }}
            </div>
            @endif

            <!-- Validation Errors -->
            @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-8">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Form -->
            <form action="{{ route('appointments.store') }}" method="POST" class="bg-white rounded-2xl shadow-lg p-8">
                @csrf
                <!-- Owner Information -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Owner Information</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="owner_name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                            <input type="text" id="owner_name" name="owner_name" value="{{ old('owner_name') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('owner_name') border-red-500 @enderror" placeholder="Enter your full name" required />
                        </div>
                        <div>
                            <label for="owner_email" class="block text-sm font-semibold text-gray-700 mb-2">Email *</label>
                            <input type="email" id="owner_email" name="owner_email" value="{{ old('owner_email') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('owner_email') border-red-500 @enderror" placeholder="Enter your email" required />
                        </div>
                        <div>
                            <label for="owner_phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone *</label>
                            <input type="text" id="owner_phone" name="owner_phone" value="{{ old('owner_phone') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('owner_phone') border-red-500 @enderror" placeholder="Enter your phone number" required />
                        </div>
                    </div>
                </div>
                <!-- Pet Information -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Pet Information</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="pet_name" class="block text-sm font-semibold text-gray-700 mb-2">Pet Name *</label>
                            <input type="text" id="pet_name" name="pet_name" value="{{ old('pet_name') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('pet_name') border-red-500 @enderror" placeholder="Enter your pet's name" required />
                        </div>
                        <div>
                            <label for="pet_type" class="block text-sm font-semibold text-gray-700 mb-2">Pet Type *</label>
                            <input type="text" id="pet_type" name="pet_type" value="{{ old('pet_type') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('pet_type') border-red-500 @enderror" placeholder="e.g. Dog, Cat" required />
                        </div>
                        <div>
                            <label for="pet_breed" class="block text-sm font-semibold text-gray-700 mb-2">Pet Breed *</label>
                            <input type="text" id="pet_breed" name="pet_breed" value="{{ old('pet_breed') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('pet_breed') border-red-500 @enderror" placeholder="Enter breed" required />
                        </div>
                        <div>
                            <label for="pet_age" class="block text-sm font-semibold text-gray-700 mb-2">Pet Age *</label>
                            <input type="number" id="pet_age" name="pet_age" value="{{ old('pet_age') }}" min="0" max="30" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('pet_age') border-red-500 @enderror" placeholder="Enter age in years" required />
                        </div>
                    </div>
                </div>
                <!-- Appointment Details -->
                <div class="mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Appointment Details</h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="service_type" class="block text-sm font-semibold text-gray-700 mb-2">Service Type *</label>
                            <input type="text" id="service_type" name="service_type" value="{{ request('service', old('service_type')) }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('service_type') border-red-500 @enderror" placeholder="e.g. Vaccination, Surgery" required />
                        </div>
                        <div>
                            <label for="doctor_id" class="block text-sm font-semibold text-gray-700 mb-2">Preferred Doctor *</label>
                            <select id="doctor_id" name="doctor_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('doctor_id') border-red-500 @enderror" required>
                                <option value="">Select a doctor</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="appointment_date" class="block text-sm font-semibold text-gray-700 mb-2">Appointment Date *</label>
                            <input type="date" id="appointment_date" name="appointment_date" value="{{ old('appointment_date') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('appointment_date') border-red-500 @enderror" required />
                        </div>
                        <div>
                            <label for="appointment_time" class="block text-sm font-semibold text-gray-700 mb-2">Appointment Time *</label>
                            <input type="time" id="appointment_time" name="appointment_time" value="{{ old('appointment_time') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('appointment_time') border-red-500 @enderror" required />
                        </div>
                        <div class="md:col-span-2">
                            <label for="symptoms" class="block text-sm font-semibold text-gray-700 mb-2">Symptoms *</label>
                            <textarea id="symptoms" name="symptoms" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('symptoms') border-red-500 @enderror" placeholder="Describe your pet's symptoms" required>{{ old('symptoms') }}</textarea>
                        </div>
                        <div class="md:col-span-2">
                            <label for="notes" class="block text-sm font-semibold text-gray-700 mb-2">Additional Notes</label>
                            <textarea id="notes" name="notes" rows="2" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent @error('notes') border-red-500 @enderror" placeholder="Any additional information (optional)">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- Agreement -->
                <div class="mb-8">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="agreement" class="form-checkbox h-5 w-5 text-primary" required {{ old('agreement') ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700">I agree to the terms and conditions *</span>
                    </label>
                </div>
                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="bg-primary text-white px-8 py-3 rounded-lg text-lg font-semibold hover:bg-orange-600 transition-colors">
                        Book Appointment
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
