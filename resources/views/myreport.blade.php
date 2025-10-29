<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>My Reports - Lost & Found</title>

<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

<div class="min-h-screen flex">

    <aside class="w-64 bg-black text-white flex flex-col justify-between h-screen border-r border-blue-500">
        <div class="w-full text-left px-4 py-5 font-bold text-lg border-b border-gray-800">
            <div class="flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <span>Lost and Found</span>
            </div>
        </div>

    <nav class="flex flex-col items-center flex-grow space-y-4 text-center mt-6">
        <a href="#" class="w-full py-2 hover:bg-gray-800 transition">Home</a>
        <a href="#" class="w-full py-2 hover:bg-gray-800 transition">My Profile</a>
        <a href="#" class="w-full py-2 bg-gray-900 rounded-md text-white font-semibold hover:bg-gray-800 transition">
            + Report New Item
        </a>
        <a href="#" class="w-full py-2 hover:bg-gray-800 transition">My Reports</a>
        <a href="#" class="w-full py-2 hover:bg-gray-800 transition">View All Reports</a>
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
                <div class="text-gray-700">: <span class="font-semibold text-blue-700">sent</span></div>
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
                <div class="text-gray-700">: <span class="font-semibold text-green-600">seen</span></div>
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

    </div>
    </main>
</div>

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
</body>
</html>
