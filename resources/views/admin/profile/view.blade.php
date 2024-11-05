@extends('admin.dashboard')
@section('content')
    <div class="bg-white shadow-md rounded-lg p-4">

        <h2 class="text-2xl font-semibold mb-6 text-gray-700">My Profile</h2>
        <div class="flex items-center space-x-4">
            <img id="profile_Preview" src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : '' }}"
                alt="user profile" class="object-cover w-20 h-20 rounded-full border border-gray-300">
            <div>
                <h3 class="text-lg font-semibold">{{ Auth::user()->name }}</h3>
                <p class="text-gray-500">{{ Auth::user()->role }}</p>
            </div>
        </div>

        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Name Field -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}"
                    placeholder="Enter full name"
                    class="w-full p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                    required>
            </div>

            <!-- Phone Number Field -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone', Auth::user()->phone) }}"
                    placeholder="Enter phone number"
                    class="w-full p-3 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                    required>
            </div>

            <!-- Profile Image Field -->
            <div>
                <label for="profile_image" class="block text-sm font-medium text-gray-700 mb-1">Profile Image</label>
                <input type="file" id="profile_image" name="image" accept="image/*"
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-gray-700"
                    onchange="previewImage(event)">
            </div>

            <!-- Image Preview -->
            <div class="mt-4">
                <img id="image_preview" src="{{ Auth::user()->image ? asset('storage/' . Auth::user()->image) : '' }}"
                    alt="Image Preview" class="object-cover w-20 h-20 rounded-full border border-gray-300 hidden">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-3 rounded-md transition duration-200">
                    Save Profile
                </button>
            </div>
        </form>
    </div>
@endsection
