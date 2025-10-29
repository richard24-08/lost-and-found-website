<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Home - Lost and Found</title>

<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

<div class="min-h-screen flex"></div>
    <aside class="w-64 bg-black text-white flex flex-col justify-between h-screen border-r-4 border-blue-500">
    <div>
        <div class="w-full px-4 py-5 font-bold text-lg border-b border-gray-800 flex items-center gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        <span>Lost and Found</span>
        </div>

        <nav class="mt-6 flex flex-col items-start px-6 space-y-3">
        <a href="#" class="w-full text-left px-3 py-2 rounded bg-gray-900">Home</a>
        <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">My Profile</a>
        <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">My Reports</a>
        <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">+ Report New Item</a>
        <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">View All Reports</a>
        </nav>
            </div>

    <div class="w-full bg-gray-900 py-4 px-4 text-left border-t border-gray-800">
        <div class="font-semibold">Richard Sebastian</div>
        <div class="text-xs text-gray-400">imsebastian@gmail.com</div>
        </div>
    </aside>

    <main class="flex-1 p-8">
        <div class="flex items-center justify-between mb-6">
        <h1 class="text-4xl font-extrabold tracking-tight">HOME</h1>
        <a href="#" class="bg-black text-white px-4 py-2 rounded-md shadow hover:bg-gray-800 transition">+ Report New Item</a>
            </div>

    <div class="mb-6">
        <input type="text" placeholder="Search Items..." 
            class="w-full max-w-xl rounded-full px-4 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400" />
    </div>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm">
        <p class="text-sm mb-2">Item Lists</p>
        <p class="font-bold text-2xl">1.234</p>
        <p class="text-xs text-gray-500">+12% from last month</p>
    </div>

    <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm">
        <p class="text-sm mb-2">Items Returned</p>
        <p class="font-bold text-2xl">1.234</p>
        <p class="text-xs text-gray-500">+12% from last month</p>
    </div>

    <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm">
        <p class="text-sm mb-2">Pending Reports</p>
        <p class="font-bold text-2xl">1.234</p>
        <p class="text-xs text-gray-500">+12% from last month</p>
        </div>
    </div>

    <h2 class="font-bold text-xl mb-4">Item Lists</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <article class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm flex flex-col">
            <div class="flex justify-between items-start mb-3">
            <h3 class="font-semibold text-lg">Black Wallet</h3>
            <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm">Lost</span>
        </div>

        <p class="text-gray-600 mb-4 text-sm">
            I lost my black leather wallet while jogging in Gotham Park. Inside there were some cash, a student ID, and a few important cards.
        </p>

        <div class="flex flex-col space-y-2 mb-4 text-gray-500 text-xs">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"></path></svg>
                <span>Accessory</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-linecap="round" stroke-linejoin="round"></circle></svg>
                <span>Park</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3M16 7V3M3 11h18M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z"></path></svg>
                <span>2025-08-09</span>
            </div>
        </div>

        <a href="#" class="mt-auto bg-black text-white py-3 rounded-md text-center hover:bg-gray-800 transition">View Details</a>
        </article>

        <article class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm flex flex-col">
        <div class="flex justify-between items-start mb-3">
            <h3 class="font-semibold text-lg">Bottle</h3>
            <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm">Lost</span>
        </div>

        <p class="text-gray-600 mb-4 text-sm">
            I misplaced my water bottle in the school cafeteria after lunch. It's a blue reusable bottle with a sticker on the side.
        </p>

        <div class="flex flex-col space-y-2 mb-4 text-gray-500 text-xs">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"></path></svg>
                <span>Bottle</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-linecap="round" stroke-linejoin="round"></circle></svg>
                <span>Cafeteria</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3M16 7V3M3 11h18M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z"></path></svg>
                <span>2025-07-08</span>
            </div>
        </div>

        <a href="#" class="mt-auto bg-black text-white py-3 rounded-md text-center hover:bg-gray-800 transition">View Details</a>
        </article>

        <article class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm flex flex-col">
            <div class="flex justify-between items-start mb-3">
                <h3 class="font-semibold text-lg">Math Textbook</h3>
            <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm">Lost</span>
        </div>

        <p class="text-gray-600 mb-4 text-sm">
            A math textbook was left in the lecture hall after class. Please help return if found.
        </p>

        <div class="flex flex-col space-y-2 mb-4 text-gray-500 text-xs">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"></path></svg>
                <span>Book</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-linecap="round" stroke-linejoin="round"></circle></svg>
                <span>Library</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3M16 7V3M3 11h18M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z"></path></svg>
                <span>2025-06-20</span>
            </div>
        </div>

        <a href="#" class="mt-auto bg-black text-white py-3 rounded-md text-center hover:bg-gray-800 transition">View Details</a>
        </article>

        <article class="bg-white rounded-lg border border-gray-200 p-6 shadow-sm flex flex-col">
        <div class="flex justify-between items-start mb-3">
            <h3 class="font-semibold text-lg">Umbrella</h3>
            <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm">Lost</span>
        </div>

        <p class="text-gray-600 mb-4 text-sm">
            A black umbrella was left on the bus stop. It's foldable with wooden handle.
        </p>

        <div class="flex flex-col space-y-2 mb-4 text-gray-500 text-xs">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"></path></svg>
                <span>Accessory</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-linecap="round" stroke-linejoin="round"></circle></svg>
                <span>Bus Stop</span>
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3M16 7V3M3 11h18M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z"></path></svg>
                <span>2025-05-11</span>
            </div>
        </div>

    <a href="#" class="mt-auto bg-black text-white py-3 rounded-md text-center hover:bg-gray-800 transition">View Details</a>
        </article>
    </div>

    </main>
</div>

</body>
</html>

