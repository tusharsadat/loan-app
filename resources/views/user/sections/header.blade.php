<header class="bg-gradient-to-r from-blue-500 to-indigo-700 px-6 py-3">
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <img src="user-profile-picture.jpg" alt="Logo" class="w-12 h-12 rounded-full">
            <div>
                <h2 class="text-xl font-semibold text-white">Title of the programme</h2>

            </div>
        </div>
        <div class="relative inline-block text-gray-200">
            <!-- <button id="profileButton" class="text-white hover:underline">Profile</button> -->
            <div class="flex items-center space-x-4" id="profileButton">
                <img src="user-profile-picture.jpg" alt="User Profile" class="w-12 h-12 rounded-full cursor-pointer">
                <div>
                    <h2 class="text-xl font-semibold text-white cursor-pointer">Welcome, {{ Auth::user()->name }}</h2>
                    <p class="text-gray-200 text-sm cursor-pointer">{{ Auth::user()->role }}</p>
                </div>
            </div>
            <ul id="profileDropdown" class="hidden mt-2 py-2 w-32 bg-white border rounded-lg shadow-lg absolute right-0"
                x-cloak>
                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">My Profile</a></li>
                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Settings</a></li>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a>
                    </li>
                </form>

            </ul>
        </div>
    </div>
</header>
