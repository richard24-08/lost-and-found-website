<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lost and Found - Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col">
        <!-- Logo / Title -->
        <div class="p-4 font-bold text-lg border-b border-gray-700">
            Lost and Found
        </div>

        <!-- Navigation -->
        <nav class="flex flex-col mt-6 px-4 space-y-2">
            <a href="#" class="bg-white text-black rounded px-3 py-2 font-medium">Home</a>
            <a href="#" class="hover:bg-white hover:text-black rounded px-3 py-2">My Profile</a>
            <a href="#" class="hover:bg-white hover:text-black rounded px-3 py-2">My Reports</a>
            <a href="#" class="hover:bg-white hover:text-black rounded px-3 py-2">+ Report New Item</a>
            <a href="#" class="hover:bg-white hover:text-black rounded px-3 py-2">View All Reports</a>
        </nav>

        <!-- User Info -->
        <div class="mt-auto p-4 text-sm bg-gray-800 flex items-center justify-between rounded-t-lg">
            <div>
                <div class="font-medium">Richard Sebastian</div>
                <div class="text-xs text-gray-400">imsebastian@gmail.com</div>
            </div>
            <a href="#" class="ml-2 text-white">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" 
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" 
                    d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">HOME</h1>
            <button class="bg-black text-white px-4 py-2 rounded shadow hover:bg-gray-800">
                + Report New Item
            </button>
        </div>

        <!-- Search Bar -->
        <div class="mb-6">
            <input type="text" placeholder="Search Items..." 
                class="w-full max-w-md rounded-full px-4 py-2 border border-gray-300 
                focus:outline-none focus:ring-2 focus:ring-black placeholder-gray-400">
        </div>

        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="p-6 bg-white rounded-xl border border-gray-200 shadow">
                <p class="text-sm mb-2">Item Lists</p>
                <p class="font-bold text-2xl">1,234</p>
                <p class="text-xs text-gray-500">+12% from last month</p>
            </div>
            <div class="p-6 bg-white rounded-xl border border-gray-200 shadow">
                <p class="text-sm mb-2">Items Returned</p>
                <p class="font-bold text-2xl">1,234</p>
                <p class="text-xs text-gray-500">+12% from last month</p>
            </div>
            <div class="p-6 bg-white rounded-xl border border-gray-200 shadow">
                <p class="text-sm mb-2">Pending Reports</p>
                <p class="font-bold text-2xl">1,234</p>
                <p class="text-xs text-gray-500">+12% from last month</p>
            </div>
        </div>

        <!-- Item Lists -->
        <h2 class="font-bold text-xl mb-4">Item Lists</h2>

        <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <!-- Card Item -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 shadow flex flex-col">
                <div class="flex justify-between mb-3">
                    <h3 class="font-semibold text-lg">Item Name</h3>
                    <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm">Lost</span>
                </div>
                <p class="text-gray-600 mb-4 text-sm">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.
                </p>
                <div class="flex flex-col space-y-2 mb-4 text-gray-500 text-xs">
                    <div class="flex items-center gap-2">
                        <span>📂</span> Category
                    </div>
                    <div class="flex items-center gap-2">
                        <span>📍</span> Location
                    </div>
                    <div class="flex items-center gap-2">
                        <span>📅</span> Date
                    </div>
                </div>
                <button class="bg-black text-white py-2 rounded hover:bg-gray-800 mt-auto">
                    View Details
                </button>
            </div>

            <!-- Duplicate Card -->
            <div class="bg-white rounded-xl border border-gray-200 p-6 shadow flex flex-col">
                <div class="flex justify-between mb-3">
                    <h3 class="font-semibold text-lg">Item Name</h3>
                    <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm">Lost</span>
                </div>
                <p class="text-gray-600 mb-4 text-sm">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.
                </p>
                <div class="flex flex-col space-y-2 mb-4 text-gray-500 text-xs">
                    <div class="flex items-center gap-2">
                        <span>📂</span> Category
                    </div>
                    <div class="flex items-center gap-2">
                        <span>📍</span> Location
                    </div>
                    <div class="flex items-center gap-2">
                        <span>📅</span> Date
                    </div>
                </div>
                <button class="bg-black text-white py-2 rounded hover:bg-gray-800 mt-auto">
                    View Details
                </button>
            </div>
        </div>
    </main>
</div>

</body>
</html>