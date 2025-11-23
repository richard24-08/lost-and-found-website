<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Report List - Lost & Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gray: {
                            808080: '#808080',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans text-xl">

<div class="flex h-screen">

  <aside class="w-80 bg-[#212121] text-white flex flex-col sticky top-0 h-screen shadow-[4px_0_4px_0_rgba(0,0,0,0.25)]">
    <div class="p-4 font-bold text-3xl border-b border-gray-700 text-center">
        Lost and Found
    </div>

    <nav class="flex flex-col mt-6 px-4 space-y-3">
        <a href="{{ route('admin.dashboard') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">Dashboard</a>
        <a href="{{ route('admin.users') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">User List</a>
        <a href="{{ route('admin.reports.list') }}" class="bg-white text-black rounded px-3 py-2 font-medium text-center text-xl">Report List</a>
    </nav>

    <div class="mt-auto p-4 text-lg bg-[#151515] flex items-center justify-between rounded-t-lg">
        <div>
            <div class="font-medium">{{ Auth::user()->name ?? 'User' }}</div>
            <div class="text-sm text-gray-400">{{ Auth::user()->email ?? 'email@example.com' }}</div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="ml-2 text-white">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </button>
        </form>
    </div>
  </aside>

  <main class="flex-1 p-8 overflow-y-auto">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-6xl font-bold text-black">REPORT LIST</h1>
        <p class="text-2xl text-gray-808080">Review and manage all reports</p>
    </div>


    <div class="mb-6">
        <input id="globalSearch" type="text" placeholder="Search by item name, location, or description..."
            class="w-full max-w-2xl rounded-lg px-6 py-3 border border-gray-300 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] focus:outline-none focus:ring-2 focus:ring-black text-2xl" />
    </div>

    <section class="bg-white rounded-xl shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] p-6 border border-gray-200">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-4xl font-semibold text-black">Report List</h2>
                <p class="text-xl text-gray-808080 mt-2">Review and manage all reports</p>
            </div>

            <div class="flex gap-4">
                <a href="{{ route('admin.reports.lost') }}" class="inline-block bg-black text-white px-6 py-3 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:bg-gray-800 transition text-xl">
                    Lost Items
                </a>
                <a href="{{ route('admin.reports.found') }}" class="inline-block bg-black text-white px-6 py-3 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:bg-gray-800 transition text-xl">
                    Found Items
                </a>
                <a href="{{ route('admin.reports.list') }}" class="inline-block bg-black text-white px-6 py-3 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:bg-gray-800 transition text-xl">
                    All Reports
                </a>
            </div>
        </div>

        <div class="overflow-auto">
            <table class="min-w-full text-2xl">
                <thead class="bg-white sticky top-0">
                    <tr class="text-left text-gray-808080 border-b">
                        <th class="py-4 px-6 font-medium w-3/12">Name</th>
                        <th class="py-4 px-6 font-medium w-2/12">Location</th>
                        <th class="py-4 px-6 font-medium w-2/12">Category</th>
                        <th class="py-4 px-6 font-medium w-2/12">Time</th>
                        <th class="py-4 px-6 font-medium w-2/12">Status</th>
                        <th class="py-4 px-6 font-medium w-1/12">Actions</th>
                    </tr>
                </thead>
                <tbody id="usersTbody" class="text-gray-808080">
                    @forelse($reports as $report)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="py-4 px-6 break-words">
                                <div class="font-medium text-black">{{ $report->item_name }}</div>
                                @if($report->brand)
                                    <div class="text-xl text-gray-808080 mt-1">Brand: {{ $report->brand }}</div>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                @if($report->report_type === 'lost')
                                    {{ $report->last_seen }}
                                @else
                                    {{ $report->location }}
                                @endif
                            </td>
                            <td class="py-4 px-6">{{ $report->category }}</td>
                            <td class="py-4 px-6 break-words">
                                @if($report->report_type === 'lost' && $report->time_lost)
                                    {{ $report->time_lost->format('M d, Y H:i') }}
                                @elseif($report->report_type === 'found' && $report->time_found)
                                    {{ $report->time_found->format('M d, Y H:i') }}
                                @else
                                    {{ $report->created_at->format('M d, Y H:i') }}
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <span class="inline-block px-4 py-2 rounded-lg text-xl font-medium 
                                    {{ $report->report_type === 'lost' ? 'bg-red-500 text-white' : 'bg-green-500 text-white' }}">
                                    {{ $report->report_type === 'lost' ? 'Lost' : 'Found' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <form action="{{ route('admin.reports.delete', $report) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800 transition text-2xl" 
                                            title="Delete Report"
                                            onclick="return confirm('Are you sure you want to delete this report?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 px-6 text-center text-gray-808080">
                                <i class="fas fa-inbox text-5xl text-gray-400 mb-4 block"></i>
                                <p class="text-2xl">No reports found.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($reports->hasPages())
            <div class="mt-6 text-xl">
                {{ $reports->links() }}
            </div>
        @endif
    </section>
  </main>
</div>

<script>
    (function(){
        const tbody = document.getElementById('usersTbody');
        const globalSearch = document.getElementById('globalSearch');

        function filterTable() {
            const searchQuery = globalSearch.value.toLowerCase().trim();

            Array.from(tbody.querySelectorAll('tr')).forEach(row => {
                if (row.cells.length < 2) return;
                
                const rowText = row.innerText.toLowerCase();
                const matchesSearch = !searchQuery || rowText.includes(searchQuery);

                row.style.display = matchesSearch ? '' : 'none';
            });
        }

        globalSearch?.addEventListener('input', filterTable);
    })();
</script>
</body>
</html>