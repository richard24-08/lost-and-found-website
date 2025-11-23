<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>All Reports - Lost and Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans text-gray-800">

<div class="min-h-screen flex">

    <aside class="w-80 bg-[#212121] text-white flex flex-col sticky top-0 h-screen">
        <div class="p-4 font-bold text-lg border-b border-gray-700">
            Lost and Found
        </div>

        <nav class="flex flex-col mt-6 px-4 space-y-3">
            <a href="{{ route('home') }}" class="hover:bg-white hover:text-black rounded px-3 py-2">Home</a>
            <a href="{{ route('profile') }}" class="hover:bg-white hover:text-black rounded px-3 py-2">My Profile</a>
            <a href="{{ route('reports.mine') }}" class="hover:bg-white hover:text-black rounded px-3 py-2">My Reports</a>
            <a href="{{ route('reports.create') }}" class="hover:bg-white hover:text-black rounded px-3 py-2">+ Report New Item</a>
            
            <!-- View All Reports untuk USER BIASA (hanya lihat) -->
            <a href="{{ route('reports.all') }}" class="bg-white text-black rounded px-3 py-2 font-medium">View All Reports</a>
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

    <main class="flex-1 p-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-4xl font-extrabold tracking-tight">ALL REPORTS</h1>
        </div>

        @if($reports->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($reports as $report)
                    <article class="bg-white rounded-lg shadow p-6 border border-gray-200">
                        <div class="flex justify-between items-start mb-3">
                            <h2 class="text-xl font-semibold">{{ $report->item_name }}</h2>
                            <span class="inline-block 
                                @if($report->report_type == 'found') bg-green-500 text-white
                                @elseif($report->report_type == 'lost') bg-red-600 text-white
                                @else bg-gray-500 text-white @endif 
                                px-3 py-1 rounded-full text-sm font-medium">
                                {{ ucfirst($report->report_type) }}
                            </span>
                        </div>

                        <p class="text-sm text-gray-600 mb-4">
                            {{ Str::limit($report->description, 120) }}
                        </p>

                        <div class="text-sm text-gray-500 space-y-3 mb-4">
                            <div class="flex items-center gap-3">
                                <span class="text-gray-400">📦</span>
                                <div>{{ $report->category ?? 'Uncategorized' }}</div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-gray-400">📍</span>
                                <div>{{ $report->location }}</div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-gray-400">📅</span>
                                <div>
                                    @if($report->report_type == 'found' && $report->time_found)
                                        {{ \Carbon\Carbon::parse($report->time_found)->format('d-m-Y') }}
                                    @elseif($report->report_type == 'lost' && $report->time_lost)
                                        {{ \Carbon\Carbon::parse($report->time_lost)->format('d-m-Y') }}
                                    @else
                                        {{ \Carbon\Carbon::parse($report->created_at)->format('d-m-Y') }}
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-gray-400">👤</span>
                                <div>By: {{ $report->reporter_name }}</div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('reports.show', $report) }}" class="w-full bg-black text-white py-3 rounded-lg text-lg font-medium hover:bg-gray-800 transition block text-center">
                                View Details
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow p-8 text-center">
                <p class="text-gray-500 text-lg">No reports found.</p>
            </div>
        @endif
    </main>
</div>

</body>
</html>