@extends('admin.dashboard')
@section('content')
    <div class="p-6">
        <div class="mx-auto max-w-xl">
            <div class="bg-white shadow-md rounded-lg p-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('storage/' . $user->image) }}" alt="User Profile" class="w-16 h-16 rounded-full">
                        <div>
                            <h2 class="text-2xl font-semibold">{{ $user->name }}</h2>
                            <p class="text-gray-500">{{ $user->role }}</p>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('admin.allUser') }}"
                            class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            Back</a>
                    </div>
                </div>
                <hr class="my-4 mt-2 border-t border-gray-300">
                <div>
                    <h3 class="text-xl font-semibold mb-2">User Details</h3>
                    <ul class="text-gray-600">
                        <li>Email: {{ $user->email }}</li>
                        <li>Phone: {{ $user->phone }}</li>
                        <li>Role: {{ $user->role }}</li>
                        <li>Stutas:<button
                                class="bg-green-500 text-white py-1 px-3 rounded-md hover:bg-green-600 transition duration-200 ml-2">
                                {{ $user->status }}</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
