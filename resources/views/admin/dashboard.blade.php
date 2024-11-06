<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex flex-col bg-gray-100">

        @include('admin.sections.header')

        <!-- Main Content -->
        <div class="flex-1">
            <div class="flex h-full">
                <!-- Sidebar -->
                @include('admin.sections.sideber')

                <!-- Page content -->
                <div class="flex-1 p-10">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('admin.sections.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <script>
        const profileButton = document.getElementById('profileButton');
        const profileDropdown = document.getElementById('profileDropdown');

        profileButton.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
        });

        window.addEventListener('click', (event) => {
            if (!profileDropdown.contains(event.target) && !profileButton.contains(event.target)) {
                profileDropdown.classList.add('hidden');
            }
        });
    </script>
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('image_preview');
            const profilePreview = document.getElementById('profile_Preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    profilePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                };

                reader.readAsDataURL(file);
            }
        }
    </script>

</body>

</html>
