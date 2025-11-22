<!DOCTYPE html>
<html lang="id">
<head>
<<<<<<< HEAD
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
=======
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>My Reports - Lost & Found</title>

<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

<div class="min-h-screen flex">

    <aside class="w-80 bg-[#212121] text-white flex flex-col">
        <div class="p-4 font-bold text-lg border-b border-gray-700">
            Lost and Found
        </div>

        <nav class="flex flex-col mt-6 px-4 space-y-3">
            <a href="{{ route('home') }}" 
            class="hover:bg-white hover:text-black rounded px-3 py-2">Home</a>

            <a href="{{ route('profile') }}" 
            class="hover:bg-white hover:text-black rounded px-3 py-2">My Profile</a>

            <a href="{{ route('report.mine') }}" 
            class="bg-white text-black rounded px-3 py-2 font-medium">My Reports</a>

            <a href="{{ route('report.create') }}" 
            class="hover:bg-white hover:text-black rounded px-3 py-2">+ Report New Item</a>

            <a href="{{ route('reports.all') }}" 
            class="hover:bg-white hover:text-black rounded px-3 py-2">View All Reports</a>
        </nav>

        <div class="mt-auto p-4 text-sm bg-[#151515] flex items-center justify-between rounded-t-lg">
            <div>
                <div class="font-medium">{{ auth()->user()->name }}</div>
                <div class="text-xs text-gray-400">{{ auth()->user()->email }}</div>
            </div>
            <a href="#" class="ml-2 text-white">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </aside>

    <main class="flex-1 p-8">
        <div class="flex items-center justify-between mb-6">
        <h1 class="text-4xl font-extrabold tracking-tight">MY REPORTS</h1>

        <div class="flex items-center gap-4">
            <input id="search" type="text" placeholder="Search Items..."
                    class="rounded-lg border border-gray-300 px-4 py-2 w-72 outline-none focus:ring-2 focus:ring-blue-400" />

            <a href="#" class="bg-black text-white px-4 py-2 rounded-md shadow hover:bg-gray-800 transition">+ Report New Item</a>
        </div>
            </div>

        @if(session('success'))
        <div class="mb-4 p-3 bg-green-50 text-green-800 rounded">{{ session('success') }}</div>
        @endif

        <div class="space-y-6">
        <div class="bg-white rounded-lg shadow p-6 border border-gray-200 flex justify-between items-start">
            <div class="max-w-[75%]">
            <h2 class="text-lg font-bold uppercase">BLACK WALLET</h2>

            <div class="grid grid-cols-2 gap-x-6 gap-y-2 text-sm text-gray-600 mt-3">
                <div class="flex gap-2">
                <div class="font-semibold">FOUND BY</div>
                <div class="text-gray-700">: Arshavin</div>
                </div>
                <div class="flex gap-2">
                <div class="font-semibold">STATUS</div>
                <div class="text-gray-700">: <span class="font-semibold text-green-700">sent</span></div>
                    </div>

            <div class="flex gap-2">
                <div class="font-semibold">FOUND AT</div>
                <div class="text-gray-700">: Park</div>
                </div>
            <div class="flex gap-2">
                <div class="font-semibold">ON</div>
                <div class="text-gray-700">: 19.35</div>
                </div>

                <div class="col-span-2 mt-2">
                <div class="font-semibold">DESCRIPTION</div>
                <div class="text-gray-600 text-sm mt-1">I was running at the park and then i saw a wallet lying on a chair and it was around 19.35 pm</div>
                </div>
            </div>
        </div>

            <div class="flex flex-col items-end space-y-3">
            <button class="bg-black text-white px-4 py-2 rounded-md text-sm hover:bg-gray-800 transition"
                    onclick="handleUpdate(1)">update</button>
            <button class="bg-red-600 text-white px-4 py-2 rounded-md text-sm hover:bg-red-700 transition"
                    onclick="handleDelete(1)">delete</button>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 border border-gray-200 flex justify-between items-start">
            <div class="max-w-[75%]">
                <h2 class="text-lg font-bold uppercase">PHONE</h2>

            <div class="grid grid-cols-2 gap-x-6 gap-y-2 text-sm text-gray-600 mt-3">
                <div class="flex gap-2">
                <div class="font-semibold">FOUND BY</div>
                <div class="text-gray-700">: Arshavin</div>
                </div>
                <div class="flex gap-2">
                <div class="font-semibold">STATUS</div>
                <div class="text-gray-700">: <span class="font-semibold text-green-600">sent</span></div>
                </div>

                <div class="flex gap-2">
                <div class="font-semibold">FOUND AT</div>
                <div class="text-gray-700">: Office table 20 section 1</div>
                </div>
                <div class="flex gap-2">
                <div class="font-semibold">ON</div>
                <div class="text-gray-700">: 12.30</div>
                </div>

                <div class="col-span-2 mt-2">
                <div class="font-semibold">DESCRIPTION</div>
                <div class="text-gray-600 text-sm mt-1">My coworker sent a picture in the chat asking 'whose phone is this', and I realized it looked familiar.</div>
                </div>
            </div>
        </div>

        <div class="flex flex-col items-end space-y-3">
            <button class="bg-black text-white px-4 py-2 rounded-md text-sm hover:bg-gray-800 transition"
                    onclick="handleUpdate(2)">update</button>
            <button class="bg-red-600 text-white px-4 py-2 rounded-md text-sm hover:bg-red-700 transition"
                    onclick="handleDelete(2)">delete</button>
        </div>
        </div>

>>>>>>> 4579bda (update baru)
    </div>
    </main>
</div>

<<<<<<< HEAD
=======
<script>
    function handleUpdate(id){
        const url = '/reports/' + id + '/edit';
        if (!confirm('Open update page for report #' + id + '?')) return;
    window.location.href = url;
    }

    function handleDelete(id){
        if (!confirm('Are you sure you want to delete report #' + id + '?')) return;
        alert('Pretend delete report ' + id + ' (implement backend route to actually delete)');
    }
</script>
>>>>>>> 4579bda (update baru)
</body>
</html>