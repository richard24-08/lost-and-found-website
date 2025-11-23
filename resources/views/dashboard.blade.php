<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Admin Dashboard - Lost and Found</title>
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
        <a href="{{ route('admin.dashboard') }}" class="bg-white text-black rounded px-3 py-2 font-medium text-center text-xl">Dashboard</a>
        <a href="{{ route('admin.users') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">User List</a>
        <a href="{{ route('admin.reports.list') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">Report List</a>
    </nav>

    <div class="mt-auto p-4 text-lg bg-[#151515] flex items-center justify-between rounded-t-lg">
        <div>
            <div class="font-medium">{{ Auth::user()->name ?? 'User' }}</div>
            <div class="text-sm text-gray-400">{{ Auth::user()->email }}</div>
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
    <header class="flex items-center justify-between mb-6">
      <h1 class="text-6xl font-bold text-black">DASHBOARD</h1>
      <p class="text-gray-808080 text-2xl">Welcome, {{ Auth::user()->name }} ({{ Auth::user()->status }})</p>
    </header>

    
    <div class="mb-6">
      <input id="globalSearch" type="text" placeholder="Search Items..." 
          class="w-full max-w-xl rounded-lg px-6 py-3 border border-gray-300 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] focus:outline-none focus:ring-2 focus:ring-black text-2xl">
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
      <div class="p-6 bg-white rounded-xl border border-gray-200 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
          <p class="text-2xl mb-2 text-gray-808080">Total Reports</p>
          <p class="font-bold text-5xl text-black">{{ number_format($totalReports) }}</p>
      </div>
      <div class="p-6 bg-white rounded-xl border border-gray-200 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
          <p class="text-2xl mb-2 text-gray-808080">Items Found</p>
          <p class="font-bold text-5xl text-black">{{ number_format($foundReports) }}</p>
      </div>
      <div class="p-6 bg-white rounded-xl border border-gray-200 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
          <p class="text-2xl mb-2 text-gray-808080">Lost Items</p>
          <p class="font-bold text-5xl text-black">{{ number_format($lostReports) }}</p>
      </div>
      <div class="p-6 bg-white rounded-xl border border-gray-200 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
          <p class="text-2xl mb-2 text-gray-808080">Total Users</p>
          <p class="font-bold text-5xl text-black">{{ number_format($totalUsers) }}</p>
      </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
      <div class="bg-white p-6 rounded-xl shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] border border-gray-200">
        <h3 class="font-semibold mb-4 text-3xl text-black">Reports Over Time (Last 30 Days)</h3>
        <div class="h-64"><canvas id="lineChart"></canvas></div>
      </div>

      <div class="bg-white p-6 rounded-xl shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] border border-gray-200">
        <h3 class="font-semibold mb-4 text-3xl text-black">Report Categories</h3>
        <div class="h-64"><canvas id="pieChart"></canvas></div>
      </div>
    </div>

    <!-- Recent Reports Card -->
    <div class="bg-white rounded-xl shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] p-6 border border-gray-200">
      <div class="flex items-center justify-between mb-6">
        <div>
          <h2 class="text-4xl font-semibold text-black">Recent report</h2>
          <p class="text-xl text-gray-808080">Review and manage submitted reports</p>
        </div>
        <div class="flex items-center gap-4">
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
              <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </div>
            <input id="tableSearch" type="text" placeholder="Search Items..." 
                class="pl-12 pr-6 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-black w-80 text-xl">
          </div>
        </div>
      </div>

      <div class="overflow-x-auto">
        <table class="min-w-full text-2xl">
          <thead>
            <tr class="text-left text-gray-808080 border-b">
              <th class="py-4 px-6 font-medium">Item</th>
              <th class="py-4 px-6 font-medium">Category</th>
              <th class="py-4 px-6 font-medium">Location</th>
              <th class="py-4 px-6 font-medium">Reporter</th>
              <th class="py-4 px-6 font-medium">Date</th>
              <th class="py-4 px-6 font-medium">Status</th>
            </tr>
          </thead>
          <tbody id="reportsTbody" class="text-gray-808080">
            @forelse($recentReports as $report)
            <tr class="border-b hover:bg-gray-50">
              <td class="py-5 px-6">{{ $report->item_name ?? 'N/A' }}</td>
              <td class="py-5 px-6">{{ $report->category ?? 'N/A' }}</td>
              <td class="py-5 px-6">{{ $report->location ?? 'N/A' }}</td>
              <td class="py-5 px-6">{{ $report->reporter_name ?? 'N/A' }}</td>
              <td class="py-5 px-6">
                @if($report->report_type === 'found' && $report->time_found)
                  {{ \Carbon\Carbon::parse($report->time_found)->format('d/m/Y') }}
                @elseif($report->report_type === 'lost' && $report->time_lost)
                  {{ \Carbon\Carbon::parse($report->time_lost)->format('d/m/Y') }}
                @else
                  N/A
                @endif
              </td>
              <td class="py-5 px-6">
                <span class="inline-block px-4 py-2 rounded-lg text-xl font-medium 
                  {{ ($report->report_type === 'found') ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                  {{ $report->report_type ?? 'unknown' }}
                </span>
              </td>
            </tr>
            @empty
            <tr class="border-b">
              <td colspan="6" class="py-5 px-6 text-center text-gray-808080">No reports found</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
 
  const lineLabels = {!! json_encode($reportsOverTime->pluck('date')) !!};
  const lineData = {!! json_encode($reportsOverTime->pluck('count')) !!};

  const pieLabels = {!! json_encode($reportCategories->pluck('category')) !!};
  const pieData = {!! json_encode($reportCategories->pluck('count')) !!};

  const colors = ['#06b6d4', '#ef4444', '#8b5cf6', '#f59e0b', '#10b981', '#f97316'];

  const ctxL = document.getElementById('lineChart');
  if (ctxL) {
    new Chart(ctxL, {
      type: 'line',
      data: {
        labels: lineLabels,
        datasets: [{ 
          label: 'Reports', 
          data: lineData, 
          borderColor: '#06b6d4', 
          backgroundColor: 'rgba(6, 182, 212, 0.1)',
          tension: 0.3, 
          fill: true 
        }]
      },
      options: { 
        responsive: true, 
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 1
            }
          }
        }
      }
    });
  }

  // Pie Chart
  const ctxP = document.getElementById('pieChart');
  if (ctxP) {
    new Chart(ctxP, {
      type: 'pie',
      data: { 
        labels: pieLabels, 
        datasets: [{ 
          data: pieData, 
          backgroundColor: colors 
        }] 
      },
      options: { 
        responsive: true, 
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'right',
            labels: {
              font: {
                size: 12
              }
            }
          }
        }
      }
    });
  }

  // Search functionality untuk table
  const tbody = document.getElementById('reportsTbody');
  const tableSearch = document.getElementById('tableSearch');
  const globalSearch = document.getElementById('globalSearch');

  if (tbody && tableSearch) {
    tableSearch.addEventListener('input', function(){
      const q = this.value.toLowerCase().trim();
      Array.from(tbody.querySelectorAll('tr')).forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(q) ? '' : 'none';
      });
    });

    // Global search juga mempengaruhi table search
    if (globalSearch) {
      globalSearch.addEventListener('input', function(){
        tableSearch.value = this.value;
        tableSearch.dispatchEvent(new Event('input'));
      });
    }
  }
</script>
</body>
</html>