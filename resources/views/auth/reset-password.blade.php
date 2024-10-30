<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 w-full sm:w-96">
        <h1 class="text-2xl font-semibold mb-4">Reset Password</h1>
        <p class="text-gray-700 mb-4">Please enter a new password for your account.</p>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Current Password</label>
                <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}"
                    class="p-2 mt-1 block w-full bg-gray-200 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
                <div>
                    @error('email')
                        <div class="rounded-md bg-red-50 p-3 text-sm font-medium text-red-800">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium">New Password</label>
                <input type="password" id="password" name="password"
                    class="p-2 mt-1 block w-full bg-gray-200 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
                <div>
                    @error('password')
                        <div class="rounded-md bg-red-50 p-3 text-sm font-medium text-red-800">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="confirmPassword" class="block text-gray-700 font-medium">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="p-2 mt-1 block w-full bg-gray-200 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300">
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50">Reset
                Password</button>
        </form>
        <p class="mt-4 text-gray-600 text-sm text-center"><a href="{{ url('/') }}"
                class="text-blue-500 hover:underline">Back to Login</a></p>
    </div>
</body>

</html>

{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
