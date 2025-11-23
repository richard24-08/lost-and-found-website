<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Report List - Lost & Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-white text-gray-900 font-sans">

<aside class="sidebar fixed top-0 left-0 h-full w-64 bg-black text-white flex flex-col justify-between border-r-4 border-blue-500 z-40 overflow-auto">
    <div>
        <div class="w-full px-4 py-5 font-bold text-lg border-b border-gray-800 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <i class="fas fa-bars"></i>
                <span>Lost and Found</span>
            </div>
            <button id="closeSidebar" class="md:hidden text-gray-400 hover:text-white">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <nav class="flex flex-col items-center flex-grow space-y-4 text-center mt-6">
            <a href="{{ route('admin.dashboard') }}" class="w-full py-2 hover:bg-gray-800 transition">
                Dashboard
            </a>
            <a href="{{ route('admin.users') }}" class="w-full py-2 hover:bg-gray-800 transition">
                User List
            </a>
            <a href="{{ route('admin.reports.list') }}" class="w-full py-2 bg-gray-900 rounded-md text-white font-semibold hover:bg-gray-800 transition">
                Report List
            </a>
        </nav>
    </div>

    <div class="w-full bg-gray-900 py-4 px-4 text-left border-t border-gray-800">
        <div class="flex items-center justify-between">
            <div>
                <div class="font-semibold">{{ Auth::user()->name ?? 'User' }}</div>
                <div class="text-xs text-gray-400">{{ Auth::user()->email ?? 'email@example.com' }}</div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-300 hover:text-white ml-4">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </div>
</aside>

<main class="ml-64 p-8 min-h-screen">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-4xl font-extrabold tracking-tight">REPORT LIST</h1>
    </div>

    <!-- Search Bar Only -->
    <div class="mb-6">
        <input id="globalSearch" type="text" placeholder="Search by item name, location, or description..."
            class="w-full md:max-w-2xl rounded-full px-4 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400" />
    </div>

    <section class="bg-white rounded-2xl border border-gray-200 shadow p-6">
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">Report List</h2>
                <p class="text-sm text-gray-500">Review and manage all reports</p>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('admin.reports.lost') }}" class="inline-block bg-gray-800 text-white px-4 py-2 rounded-lg border border-gray-300 shadow hover:bg-gray-700 transition">
                    Lost Items
                </a>
                <a href="{{ route('admin.reports.found') }}" class="inline-block bg-gray-800 text-white px-4 py-2 rounded-lg border border-gray-300 shadow hover:bg-gray-700 transition">
                    Found Items
                </a>
                <a href="{{ route('admin.reports.list') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg border border-blue-700 shadow hover:bg-blue-700 transition">
                    All Reports
                </a>
            </div>
        </div>

        <div class="overflow-auto rounded-lg border border-gray-100">
            <table class="min-w-full text-sm">
                <thead class="bg-white sticky top-0">
                    <tr class="text-left text-gray-600 font-bold tracking-wide">
                        <th class="py-3 px-4 w-3/12">Name</th>
                        <th class="py-3 px-4 w-2/12">Location</th>
                        <th class="py-3 px-4 w-2/12">Category</th>
                        <th class="py-3 px-4 w-2/12">Time</th>
                        <th class="py-3 px-4 w-2/12">Status</th>
                        <th class="py-3 px-4 w-1/12">Actions</th>
                    </tr>
                </thead>
                <tbody id="usersTbody" class="text-gray-700">
                    @forelse($reports as $report)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="py-3 px-4 break-words">
                                <div class="font-medium">{{ $report->item_name }}</div>
                                @if($report->brand)
                                    <div class="text-xs text-gray-500">Brand: {{ $report->brand }}</div>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                @if($report->report_type === 'lost')
                                    {{ $report->last_seen }}
                                @else
                                    {{ $report->location }}
                                @endif
                            </td>
                            <td class="py-3 px-4">{{ $report->category }}</td>
                            <td class="py-3 px-4 break-words">
                                @if($report->report_type === 'lost' && $report->time_lost)
                                    {{ $report->time_lost->format('M d, Y H:i') }}
                                @elseif($report->report_type === 'found' && $report->time_found)
                                    {{ $report->time_found->format('M d, Y H:i') }}
                                @else
                                    {{ $report->created_at->format('M d, Y H:i') }}
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <span class="px-2 py-1 rounded-full text-xs font-medium 
                                    {{ $report->report_type === 'lost' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                    {{ $report->report_type === 'lost' ? 'Lost' : 'Found' }}
                                </span>
                            </td>
                            <td class="py-3 px-4">
                                <form action="{{ route('admin.reports.delete', $report) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-800 transition" 
                                            title="Delete Report"
                                            onclick="return confirm('Are you sure you want to delete this report?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 px-4 text-center text-gray-500">
                                <i class="fas fa-inbox text-4xl text-gray-400 mb-2 block"></i>
                                <p class="mt-2">No reports found.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($reports->hasPages())
            <div class="mt-4">
                {{ $reports->links() }}
            </div>
        @endif
    </section>
</main>

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