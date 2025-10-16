<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>My Reports - Lost and Found</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

    <div class="min-h-screen flex">
    <!-- SIDEBAR -->
    <aside class="w-64 bg-black text-white flex flex-col justify-between h-screen border-r-4 border-blue-500">
        <div>
            <div class="w-full text-left px-4 py-5 font-bold text-lg border-b border-gray-800">
            <div class="flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <span>Lost and Found</span>
            </div>
        </div>

        <nav class="mt-6 flex flex-col items-start px-6 space-y-3">
            <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">Home</a>
            <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">My Profile</a>
            <a href="#" class="w-full text-left px-3 py-2 rounded bg-gray-900">My Reports</a>
            <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">+ Report New Item</a>
            <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">View All Reports</a>
        </nav>
        </div>

        <div class="w-full bg-gray-900 py-4 px-4 text-left border-t border-gray-800">
            <div class="font-semibold">Richard Sebastian</div>
        <div class="text-xs text-gray-400">imsebastian@gmail.com</div>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-10">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-extrabold tracking-wide">MY REPORTS</h1>
        <button class="bg-black text-white px-5 py-2 rounded-md hover:bg-gray-800 transition">
            + Report New Item
        </button>
        </div>

        <!-- Search Bar -->
        <div class="mb-6">
        <input type="text" placeholder="Search Items..." 
                class="w-full max-w-md border border-gray-300 rounded-md px-4 py-2 outline-none focus:ring-2 focus:ring-blue-400" />
        </div>

        <!-- Report Cards -->
        <div class="space-y-5">
        <!-- Report 1 -->
        <div class="bg-white border border-blue-400 rounded-lg shadow-sm p-5">
            <div class="flex justify-between mb-2">
                <h2 class="font-bold text-lg">BLACK WALLET</h2>
                <span class="text-sm font-semibold">STATUS : <span class="text-blue-500">sent</span></span>
            </div>
            <div class="text-sm space-y-1">
            <p><span class="font-semibold">FOUND BY</span> : Arshavin</p>
            <p><span class="font-semibold">FOUND AT</span> : Park</p>
            <p><span class="font-semibold">FOUND AT</span> : 2025-10-20</p>
            <p><span class="font-semibold">ON</span> : 19.35 pm</p>
            <p><span class="font-semibold">DESCRIPTION</span> : I was running at the park and then I saw a wallet lying on a chair and it was around 19.35 pm.</p>
            </div>
        </div>

        <!-- Report 2 -->
        <div class="bg-white border border-gray-300 rounded-lg shadow-sm p-5">
            <div class="flex justify-between mb-2">
            <h2 class="font-bold text-lg">PHONE</h2>
            <span class="text-sm font-semibold">STATUS : <span class="text-green-600">seen</span></span>
            </div>
            <div class="text-sm space-y-1">
            <p><span class="font-semibold">FOUND BY</span> : Arshavin</p>
            <p><span class="font-semibold">FOUND AT</span> : Office table 20 section 1</p>
            <p><span class="font-semibold">FOUND AT</span> : 2025-10-09</p>
            <p><span class="font-semibold">ON</span> : 12.30 pm</p>
            <p><span class="font-semibold">DESCRIPTION</span> : My coworker sent a picture in the chat asking 'whose phone is this', and I realized it looked familiar.</p>
            </div>
        </div>
    </div>
    </main>
</div>

</body>
</html>