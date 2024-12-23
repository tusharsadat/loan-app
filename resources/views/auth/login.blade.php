<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="{{ asset('backend/css/tailwind.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 w-full sm:w-96">
        <h1 class="text-2xl font-semibold mb-4 text-center">Login Form</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    placeholder="Enter your email"
                    class="mt-1 block w-full bg-gray-200 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300 p-2">
                <div>
                    @error('email')
                        <div class="rounded-md bg-red-50 p-3 text-sm font-medium text-red-800">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium ">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter password"
                    class="mt-1 block w-full bg-gray-200 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-300 p-2">
                <div>
                    @error('password')
                        <div class="rounded-md bg-red-50 p-3 text-sm font-medium text-red-800">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="flex justify-between items-center">
                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="text-blue-500 hover:underline">Forgot Password?</a>
                </div>
                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50">Login</button>
            </div>
        </form>
        <p class="mt-4 text-gray-600 text-sm text-center">Don't have an account? <a href="{{ route('register') }}"
                class="text-blue-500 hover:underline">Sign up</a></p>
    </div>
</body>

</html>

{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
