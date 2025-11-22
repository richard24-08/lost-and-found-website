<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Report List - Lost & Found</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
    .card-radius { border-radius: 12px; }
    .table-head th { font-weight: 700; letter-spacing: 0.2px; }
</style>
</head>
<body class="bg-white text-gray-900 font-sans">

<aside class="fixed top-0 left-0 h-full w-64 bg-black text-white flex flex-col justify-between border-r-4 border-blue-500 z-40 overflow-auto">
<div>
    <div class="w-full px-4 py-5 font-bold text-lg border-b border-gray-800 flex items-center gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <span>Lost and Found</span>
    </div>

    <nav class="flex flex-col items-center flex-grow space-y-4 text-center mt-6">
    <a href="{{ route('admin2') ?? '#' }}" class="w-full py-2 hover:bg-gray-800 transition">Home</a>
    <a href="{{ route('userlist') ?? '#' }}" class="w-full py-2 hover:bg-gray-800 transition">User List</a>
    <a href="{{ route('reportlist') ?? '#' }}" class="w-full py-2 bg-gray-900 rounded-md text-white font-semibold hover:bg-gray-800 transition">
        Report List
    </a>

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

<main class="ml-64 p-8 min-h-screen">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-4xl font-extrabold tracking-tight">HOME</h1>
    </div>

    <div class="mb-6">
    <input id="globalSearch" type="text" placeholder="Search..."
        class="w-full max-w-2xl rounded-full px-4 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400" />
    </div>

    <section class="bg-white card-radius rounded border border-gray-200 shadow p-6">
    <div class="flex items-center justify-between mb-4">
        <div>
        <h2 class="text-lg font-semibold">Report list</h2>
        <p class="text-sm text-gray-500">Review and manage Registered user</p>
        </div>

        <div>
            <a href="#" class="inline-block bg-white text-black px-4 py-2 rounded-md border border-gray-300 shadow hover:bg-gray-100">Add user</a>
        </div>
    </div>

    <div class="overflow-auto rounded border border-gray-100">
        <table class="min-w-full text-sm table-fixed">
        <thead class="bg-white sticky top-0">
            <tr class="text-left text-gray-600">
                <th class="py-3 px-4 w-2/12 font-semibold">Name</th>
                <th class="py-3 px-4 w-2/12 font-semibold">Location</th>
                <th class="py-3 px-4 w-2/12 font-semibold">Condition</th>
                <th class="py-3 px-4 w-4/12 font-semibold">Time</th>
                <th class="py-3 px-4 w-1/12 font-semibold">Status</th>
            </tr>
        </thead>
        <tbody id="usersTbody" class="text-gray-700"></tbody>
            @php
            if (!isset($users)) {
                $users = collect([
                    ['name'=>'arsha','location'=>'XII TKJ 3','condition'=>'Safe','time'=>'10.00','status'=>'Lost'],
                    ['name'=>'David','location'=>'X TKJ 3','condition'=>'Safe','time'=>'10.00','status'=>'Found'],
                    ['name'=>'Davin','location'=>'XI TKJ 1','condition'=>'Safe','time'=>'12.00','status'=>'Lost'],
                    ['name'=>'Cloudio','location'=>'XII TKJ 2','condition'=>'Safe','time'=>'13.00','status'=>'Lost'],
                    ['name'=>'Gibson','location'=>'X TKJ 3','condition'=>'Safe','time'=>'08.00','status'=>'Found'],
                    ['name'=>'Declane','location'=>'XII AKL 2','condition'=>'Safe','time'=>'11.00','status'=>'Lost'],
                    ['name'=>'Peter','location'=>'XII AKL 1','condition'=>'Safe','time'=>'10.00','status'=>'Found'],
                    ['name'=>'Evlina','location'=>'XI TKJ 2','condition'=>'Safe','time'=>'12.00','status'=>'Found'],
                    ['name'=>'Edbert','location'=>'XI TKJ 2','condition'=>'Safe','time'=>'14.00','status'=>'Lost'],
                    ['name'=>'FareI','location'=>'X TKJ 3','condition'=>'Safe','time'=>'15.00','status'=>'Lost'],
                    ['name'=>'Ferdi','location'=>'X TKJ 1','condition'=>'Safe','time'=>'10.00','status'=>'Lost'],
                    ['name'=>'Caerwyn','location'=>'XII TKJ 3','condition'=>'Safe','time'=>'12.00','status'=>'Found'],
                    ['name'=>'Liko','location'=>'XII PM','condition'=>'Safe','time'=>'11.00','status'=>'Found'],
            ]);
            }
            @endphp

            @foreach($users as $u)
                <tr class="border-t">
                <td class="py-3 px-4 break-words">{{ $u['name'] ?? $u->name ?? '—' }}</td>
                <td class="py-3 px-4">{{ $u['location'] ?? ($u->location ?? '—') }}</td>
                <td class="py-3 px-4">{{ $u['condition'] ?? ($u->condition ?? '—') }}</td>
                <td class="py-3 px-4 break-words">{{ $u['time'] ?? ($u->time ?? '—') }}</td>
                <td class="py-3 px-4">{{ $u['status'] ?? ($u->status ?? '—') }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    </section>
    <div class="flex justify-end mt-6">
        <button id="deleteBtn" class="bg-red-400 hover:bg-red-500 text-white px-6 py-2 rounded-full shadow">Delete user</button>
    </div>


</main>
<script>
    (function(){
        const tbody = document.getElementById('usersTbody');
        const tableSearch = document.getElementById('tableSearch');  
        const globalSearch = document.getElementById('globalSearch');
        function filterTable(q){
            q = q.toLowerCase().trim();
            Array.from(tbody.querySelectorAll('tr')).forEach(row=>{
                row.style.display = row.innerText.toLowerCase().includes(q) ? '' : 'none';
            });
            }
        tableSearch?.addEventListener('input', function(){ filterTable(this.value); });
        globalSearch?.addEventListener('input', function(){ filterTable(this.value); });
    })();
</script>
</body>
</html>