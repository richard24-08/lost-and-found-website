<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lost and Found - Dashboard</title>
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-50 font-sans">

<div class="flex h-screen">

    <!-- Sidebar kiri -->
    <aside class="w-64 bg-gray-200 flex flex-col">
    <div class="p-4 font-bold text-lg border-b border-gray-300">
        Lost and Found
    </div>
    <nav class="flex flex-col mt-6 px-4 space-y-2">
        <a href="#" class="bg-black text-white rounded px-3 py-2">Home</a>
        <a href="#" class="hover:bg-black hover:text-white rounded px-3 py-2">My Profile</a>
        <a href="#" class="hover:bg-black hover:text-white rounded px-3 py-2">My Reports</a>
        <a href="#" class="hover:bg-black hover:text-white rounded px-3 py-2">+ Report Lost Item</a>
        <a href="#" class="hover:bg-black hover:text-white rounded px-3 py-2">View All Reports</a>
    </nav>

    <div class="mt-auto p-4 text-sm text-gray-700 bg-gray-300 flex items-center justify-between">
    <div>
        <div>Richard Sebastian</div>
        <div class="text-xs text-gray-600">imsebastian@gmail.com</div>
    </div>
    <a href="#" class="ml-2 text-black">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
    </a>
    </div>
</aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-auto">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">HOME</h1>
        <button class="bg-black text-white px-4 py-2 rounded shadow hover:bg-gray-800">+ Report New Item</button>
    </div>

    <!-- Search Bar -->
    <div>
        <input type="text" placeholder="Search Items..." class="w-full max-w-md rounded-full px-4 py-2 border border-gray-300 focus:outline-none focus:ring focus:ring-gray-400 placeholder-gray-400 mb-6">
    </div>

    <!-- Cards Summary -->
    <div class="flex space-x-6 mb-8">
        <div class="flex-1 p-6 bg-white rounded-lg border border-gray-300 shadow-sm">
        <p class="text-sm mb-2">Item Lists</p>
        <p class="font-bold text-2xl">1,234</p>
        <p class="text-xs text-gray-500">+12% from last month</p>
        </div>
        <div class="flex-1 p-6 bg-white rounded-lg border border-gray-300 shadow-sm">
        <p class="text-sm mb-2">Items Returned</p>
        <p class="font-bold text-2xl">1,234</p>
        <p class="text-xs text-gray-500">+12% from last month</p>
        </div>
        <div class="flex-1 p-6 bg-white rounded-lg border border-gray-300 shadow-sm">
        <p class="text-sm mb-2">Pending Reports</p>
        <p class="font-bold text-2xl">1,234</p>
        <p class="text-xs text-gray-500">+12% from last month</p>
        </div>
    </div>

    <!-- Item Lists -->
    <h2 class="font-bold text-xl mb-4">Item Lists</h2>

    <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">

        <!-- Card Item example -->
        <div class="bg-white rounded-lg border border-gray-300 p-6 shadow-sm flex flex-col">
        <div class="flex justify-between mb-3">
            <h3 class="font-semibold text-lg">Item Name</h3>
            <span class="bg-black text-white px-3 py-1 rounded-full text-sm self-start">Lost</span>
        </div>
        <p class="text-gray-600 mb-4 text-sm">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <div class="flex flex-col space-y-2 mb-4 text-gray-500 text-xs">
            <div class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 6h18M3 14h18M7 18h10"></path></svg>Category</div>
            <div class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-linecap="round" stroke-linejoin="round"></circle></svg>Location</div>
            <div class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3M16 7V3M3 11h18M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z"></path></svg>Date</div>
        </div>
        <button class="bg-black text-white py-2 rounded hover:bg-gray-800 mt-auto">View Details</button>
        </div>

        <!-- Duplicate Card Item untuk contoh -->
        <div class="bg-white rounded-lg border border-gray-300 p-6 shadow-sm flex flex-col">
        <div class="flex justify-between mb-3">
            <h3 class="font-semibold text-lg">Item Name</h3>
            <span class="bg-black text-white px-3 py-1 rounded-full text-sm self-start">Lost</span>
        </div>
        <p class="text-gray-600 mb-4 text-sm">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <div class="flex flex-col space-y-2 mb-4 text-gray-500 text-xs">
            <div class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 6h18M3 14h18M7 18h10"></path></svg>Category</div>
            <div class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-linecap="round" stroke-linejoin="round"></circle></svg>Location</div>
            <div class="flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3M16 7V3M3 11h18M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z"></path></svg>Date</div>
        </div>
        <button class="bg-black text-white py-2 rounded hover:bg-gray-800 mt-auto">View Details</button>
    </div>

    </div>
</main>

</div>

</body>
</html>