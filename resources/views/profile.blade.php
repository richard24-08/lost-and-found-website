<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Profile - Lost and Found</title>

    <!-- Tailwind CDN (preview cepat tanpa build) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

    <div class="min-h-screen flex">
    <!-- SIDEBAR -->
    <aside class="w-64 bg-black text-white flex flex-col justify-between h-screen border-r-4 border-blue-500">
        <div>
        <div class="w-full text-left px-4 py-5 font-bold text-lg border-b border-gray-800">
            <!-- icon hamburger small -->
            <div class="flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <span>Lost and Found</span>
            </div>
        </div>

        <nav class="mt-6 flex flex-col items-start px-6 space-y-3">
            <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">Home</a>
            <a href="#" class="w-full text-left px-3 py-2 rounded bg-gray-900">My Profile</a>
            <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">My Reports</a>
            <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">+ Report New Item</a>
            <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">View All Reports</a>
        </nav>
        </div>

        <div class="w-full bg-gray-900 py-4 px-4 text-left border-t border-gray-800">
        <div class="font-semibold">Richard Sebastian</div>
        <div class="text-xs text-gray-400">imsebastian@gmail.com</div>
        <div class="mt-2">
            <a href="#" class="inline-flex items-center gap-2 text-gray-300 hover:text-white">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
            Logout
            </a>
        </div>
        </div>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-8">
        <!-- grid atas: foto + personal info -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- photo card -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow p-4">
            <div class="w-full h-80 bg-gray-100 rounded-md flex items-center justify-center border-4 border-blue-300 overflow-hidden">
                <!-- Ganti src sesuai lokasi gambar (lihat penjelasan di bawah) -->
                <img src="/images/profile.jpg" alt="Profile photo" class="object-cover w-full h-full" />
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium mb-2">Update Photo</label>
                <input type="file" class="block w-full text-sm text-gray-600" />
            </div>
            <div class="mt-4">
                <button class="bg-black text-white px-4 py-2 rounded-md shadow">Update Photo</button>
            </div>
            </div>
        </div>

        <!-- personal info -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-bold mb-4 text-center">Personal Information</h2>
            <div class="border-t border-gray-100 -mx-6 px-6 pt-4">
                <div class="grid grid-cols-3 gap-4 text-sm">
                <div class="text-gray-500">Name</div>
                <div class="col-span-2 font-medium">: Richard Sebastian Kadir</div>

                <div class="text-gray-500">Birth date</div>
                <div class="col-span-2">: 24-2-1900</div>

                <div class="text-gray-500">Contact</div>
                <div class="col-span-2">: +62-1234-5678</div>

                <div class="text-gray-500">E-mail</div>
                <div class="col-span-2">: imsebastian@gmail.com</div>

                <div class="text-gray-500">Status</div>
                <div class="col-span-2">: Student (12 TKJ 3)</div>

                <div class="text-gray-500">Department</div>
                <div class="col-span-2">: SKI</div>
                </div>

                <div class="mt-6">
                <button class="bg-black text-white px-4 py-2 rounded-md shadow">Update Photo</button>
                </div>
            </div>
            </div>
        </div>
        </div>

        <!-- description / about card -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
        <h3 class="text-2xl font-bold mb-3">Lost and Found</h3>
        <p class="text-gray-600">
            This application helps students report and find lost items within the school environment.
            Each report will be recorded and can be viewed by other users, making the search process easier.
            With this feature, it is expected that lost items can be quickly found and returned to their owners.
        </p>

        <div class="border-t border-gray-100 mt-6 pt-4 grid grid-cols-2 md:grid-cols-4 gap-4 text-sm text-gray-600">
            <div>
            <div class="font-semibold">Copyright</div>
            <div class="mt-1">© 2025 Lost and Found</div>
            </div>
            <div>
            <div class="font-semibold">Links</div>
            <ul class="mt-1 space-y-1">
                <li class="text-sm text-gray-500">Terms & conditions</li>
                <li class="text-sm text-gray-500">About us</li>
            </ul>
            </div>
            <div>
            <div class="font-semibold">Support</div>
            <ul class="mt-1 space-y-1">
                <li class="text-sm text-gray-500">Privacy policy</li>
                <li class="text-sm text-gray-500">What's new</li>
            </ul>
            </div>
            <div>
            <div class="font-semibold">More</div>
            <ul class="mt-1 space-y-1">
                <li class="text-sm text-gray-500">Cookies policy</li>
                <li class="text-sm text-gray-500">Support</li>
            </ul>
            </div>
        </div>
        </div>

    </main>
    </div>

</body>
</html>