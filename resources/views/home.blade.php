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

    <aside class="w-80 bg-[#212121] text-white flex flex-col sticky top-0 h-screen">
        <div class="p-4 font-bold text-lg border-b border-gray-700">
            Lost and Found
        </div>

        <nav class="flex flex-col mt-6 px-4 space-y-3">
            <a href="{{ route('home') }}" class="bg-white text-black rounded px-3 py-2 font-medium">Home</a>
            <a href="{{ route('profile') }}" class="hover:bg-white hover:text-black rounded px-3 py-2">My Profile</a>
            <a href="{{ route('reports.mine') }}" class="hover:bg-white hover:text-black rounded px-3 py-2">My Reports</a>
            <a href="{{ route('reports.create') }}" class="hover:bg-white hover:text-black rounded px-3 py-2">+ Report New Item</a>
            
            <!-- View All Reports untuk USER BIASA (hanya lihat) -->
            <a href="{{ route('reports.all') }}" class="hover:bg-white hover:text-black rounded px-3 py-2">View All Reports</a>
        </nav>

        <div class="mt-auto p-4 text-sm bg-[#151515] flex items-center justify-between rounded-t-lg">
            <div>
                <div class="font-medium">{{ auth()->user()->name }}</div>
                <div class="text-xs text-gray-400">{{ auth()->user()->email }}</div>
            </div>
            <a href="{{ route('logout') }}" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
            class="ml-2 text-white">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">HOME</h1>
            <a href="{{ route('reports.create') }}" class="bg-black text-white px-4 py-2 rounded shadow hover:bg-gray-800">
                + Report New Item
            </a>
        </div>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('home') }}" class="mb-6">
            <input type="text" name="search" placeholder="Search Items..."
                value="{{ request('search') }}"
                class="w-full max-w-md rounded-full px-4 py-2 border border-gray-300 
                focus:outline-none focus:ring-2 focus:ring-black placeholder-gray-400">
        </form>

        <!-- Summary Cards -->
        @if(empty(request('search')))
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="p-6 bg-white rounded-xl border border-gray-200 shadow">
                <p class="text-sm mb-2">Item Lists</p>
                <p class="font-bold text-2xl">{{ $reports->total() }}</p>
                <p class="text-xs text-gray-500">Total laporan barang</p>
            </div>
            <div class="p-6 bg-white rounded-xl border border-gray-200 shadow">
                <p class="text-sm mb-2">Items Returned</p>
                <p class="font-bold text-2xl">{{ \App\Models\Report::where('report_type', 'found')->count() }}</p>
                <p class="text-xs text-gray-500">Barang ditemukan</p>
            </div>
            <div class="p-6 bg-white rounded-xl border border-gray-200 shadow">
                <p class="text-sm mb-2">Pending Reports</p>
                <p class="font-bold text-2xl">{{ \App\Models\Report::where('report_type', 'lost')->count() }}</p>
                <p class="text-xs text-gray-500">Barang hilang</p>
            </div>
        </div>
        @endif

        <!-- Item Lists -->
        <h2 class="font-bold text-xl mb-4">Item Lists</h2>

        <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach($reports as $report)
                <div class="bg-white rounded-xl border border-gray-200 p-6 shadow flex flex-col">

                    <div class="flex justify-between mb-3">
                        <h3 class="font-semibold text-lg">{{ $report->item_name }}</h3>
                        <span
                            class="px-3 py-1 rounded-full text-sm text-white
                            {{ $report->report_type === 'lost' ? 'bg-red-500' : 'bg-green-500' }}">
                            {{ ucfirst($report->report_type) }}
                        </span>
                    </div>

                    <p class="text-gray-600 mb-4 text-sm">
                        {{ Str::limit($report->description, 100) }}
                    </p>

                    <div class="flex flex-col space-y-2 mb-4 text-gray-500 text-xs">
                        <div class="flex items-center gap-2">
                            <span>📦</span> {{ $report->category }}
                        </div>
                        <div class="flex items-center gap-2">
                            <span>📍</span> {{ $report->location }}
                        </div>
                        <div class="flex items-center gap-2">
                            <span>📅</span> 
                            @if($report->report_type === 'lost' && $report->time_lost)
                                {{ $report->time_lost->format('d M Y H:i') }}
                            @elseif($report->report_type === 'found' && $report->time_found)
                                {{ $report->time_found->format('d M Y H:i') }}
                            @else
                                {{ $report->created_at->format('d M Y H:i') }}
                            @endif
                        </div>
                    </div>

                    <div class="flex gap-2 mt-auto">
                        <a href="{{ route('reports.show', $report) }}" 
                            class="bg-black text-white px-3 py-2 rounded w-full text-center hover:bg-gray-600 transition">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($reports->hasPages())
            <div class="mt-6">
                {{ $reports->links() }}
            </div>
        @endif

        @if($reports->isEmpty())
            <p class="text-gray-500 text-center mt-6">Belum ada laporan.</p>
        @endif
    </main>
</div>

</body>
</html>