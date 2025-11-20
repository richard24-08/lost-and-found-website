<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Profile - Lost and Found</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

<aside class="fixed top-0 left-0 h-full w-64 bg-black text-white flex flex-col justify-between border-r-4 border-blue-500 overflow-auto z-40">
        <div class="w-full text-left px-4 py-5 font-bold text-lg border-b border-gray-800">
            <div class="flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <span>Lost and Found</span>
            </div>
        </div>

    <nav class="flex flex-col items-center flex-grow space-y-4 text-center mt-6">
        <a href="{{ route('home') ?? '#' }}" class="w-full py-2 hover:bg-gray-800 transition">Home</a>
        <a href="{{ route('profile') ?? '#' }}" class="w-full py-2 bg-gray-900 rounded-md text-white font-semibold hover:bg-gray-800 transition">
            My Profile
        </a>
        <a href="{{ route('reportnewitem') ?? '#' }}" class="w-full py-2 hover:bg-gray-800 transition">+ Report New Item</a>
        <a href="{{ route('myreport') ?? '#' }}" class="w-full py-2 hover:bg-gray-800 transition">My Reports</a>
        <a href="{{ route('allreports') ?? '#' }}" class="w-full py-2 hover:bg-gray-800 transition">View All Reports</a>
    </nav>

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

    <main class="ml-64 p-6 min-h-screen">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow p-4">
            <div class="w-full h-80 bg-gray-100 rounded-md flex items-center justify-center border-4 border-blue-300 overflow-hidden">
                <img src="/images/profile.jpg" alt="Profile photo" class="object-cover w-full h-full" />
            </div>

            </div>
        </div>
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
