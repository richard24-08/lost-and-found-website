<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>My Reports - Lost & Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
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
<body class="bg-gray-50 font-sans text-black text-xl">

<div class="min-h-screen flex">

    <aside class="w-80 bg-[#212121] text-white flex flex-col sticky top-0 h-screen shadow-[4px_0_4px_0_rgba(0,0,0,0.25)]">
        <div class="p-4 font-bold text-3xl border-b border-gray-700 text-center">
            Lost and Found
        </div>

        <nav class="flex flex-col mt-6 px-4 space-y-3">
            <a href="{{ route('home') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">Home</a>
            <a href="{{ route('profile') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">My Profile</a>
            <a href="{{ route('reports.mine') }}" class="bg-white text-black rounded px-3 py-2 font-medium text-center text-xl">My Reports</a>
            <a href="{{ route('reports.create') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">+ Report New Item</a>
            

            <a href="{{ route('reports.all') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">View All Reports</a>
        </nav>

        <div class="mt-auto p-4 text-lg bg-[#151515] flex items-center justify-between rounded-t-lg">
            <div>
                <div class="font-medium">{{ auth()->user()->name }}</div>
                <div class="text-sm text-gray-400">{{ auth()->user()->email }}</div>
            </div>
            <a href="{{ route('logout') }}" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
            class="ml-2 text-white">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
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
            <h1 class="text-6xl font-extrabold tracking-tight">MY REPORTS</h1>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-50 text-green-800 rounded text-xl">{{ session('success') }}</div>
        @endif

        @if($reports->count() > 0)
            <div class="space-y-6">
                @foreach($reports as $report)
                    <div class="bg-white rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] p-6 border border-gray-200">
                        <div class="max-w-full">
                            <h2 class="text-2xl font-bold uppercase mb-4 text-black">{{ $report->item_name }}</h2>

                            <div class="space-y-3 text-xl text-black">
                                <div class="flex items-start">
                                    <div class="font-semibold w-48 text-gray-808080">FOUND BY</div>
                                    <div class="text-gray-808080">: {{ $report->finder_name ?? $report->reporter_name }}</div>
                                </div>

                                <div class="flex items-start">
                                    <div class="font-semibold w-48 text-gray-808080">FOUND AT</div>
                                    <div class="text-gray-808080">: {{ $report->location }}</div>
                                </div>

                                <div class="flex items-start">
                                    <div class="font-semibold w-48 text-gray-808080">DATE</div>
                                    <div class="text-gray-808080">: {{ \Carbon\Carbon::parse($report->found_date ?? $report->time_lost ?? $report->created_at)->format('d-m-Y') }}</div>
                                </div>

                                <div class="flex items-start">
                                    <div class="font-semibold w-48 text-gray-808080">TIME</div>
                                    <div class="text-gray-808080">: {{ \Carbon\Carbon::parse($report->found_date ?? $report->time_lost ?? $report->created_at)->format('H:i') }}</div>
                                </div>

                                <div class="flex items-start">
                                    <div class="font-semibold w-48 text-gray-808080">DESCRIPTION</div>
                                    <div class="text-gray-808080 flex-1">: {{ $report->description }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] p-8 text-center">
                <p class="text-black text-2xl">No reports found.</p>
                <a href="{{ route('reports.create') }}" class="inline-block mt-4 bg-black text-white px-6 py-3 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:bg-gray-800 transition text-xl">
                    + Report New Item
                </a>
            </div>
        @endif
    </main>
</div>

</body>
</html>