<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Admin Dashboard - Lost and Found</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-900 font-sans h-full" id="app">

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
            <a href="{{ route('admin.dashboard') }}" class="w-full py-2 bg-gray-900 rounded-md text-white font-semibold hover:bg-gray-800 transition">
                Dashboard
            </a>
            <a href="{{ route('admin.users') }}" class="w-full py-2 hover:bg-gray-800 transition">User List</a>
            <a href="{{ route('admin.reports.list') }}" class="w-full py-2 hover:bg-gray-800 transition">Report List</a>
        </nav>
    </div>

    <div class="w-full bg-gray-900 py-4 px-4 text-left border-t border-gray-800">
        <div class="flex items-center justify-between">
            <div>
                <div class="font-semibold">{{ Auth::user()->name ?? 'User' }}</div>
                <div class="text-xs text-gray-400">{{ Auth::user()->email }}</div>
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

  <main class="ml-64 flex-1 p-6 min-h-screen">
    <header class="flex items-center justify-between mb-6">
      <h1 class="text-3xl font-bold">Admin Dashboard</h1>
      <p class="text-gray-600">Welcome, {{ Auth::user()->name }} ({{ Auth::user()->status }})</p>
    </header>

    <div class="mb-6">
      <input id="globalSearch" type="text" placeholder="Search Items..." 
          class="w-full max-w-xl rounded-full px-4 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
      <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm">
          <p class="text-lg mb-2 font-semibold text-gray-800">Total Reports</p>
          <p class="font-bold text-4xl text-black">{{ number_format($totalReports) }}</p>
      </div>
      <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm">
          <p class="text-lg mb-2 font-semibold text-gray-800">Items Found</p>
          <p class="font-bold text-4xl text-black">{{ number_format($foundReports) }}</p>
      </div>
      <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm">
          <p class="text-lg mb-2 font-semibold text-gray-800">Lost Items</p>
          <p class="font-bold text-4xl text-black">{{ number_format($lostReports) }}</p>
      </div>
      <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm">
          <p class="text-lg mb-2 font-semibold text-gray-800">Total Users</p>
          <p class="font-bold text-4xl text-black">{{ number_format($totalUsers) }}</p>
      </div>
  </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
      <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
        <h3 class="font-semibold mb-4 text-lg text-gray-800">Reports Over Time (Last 30 Days)</h3>
        <div class="h-64"><canvas id="lineChart"></canvas></div>
      </div>

      <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
        <h3 class="font-semibold mb-4 text-lg text-gray-800">Report Categories</h3>
        <div class="h-64"><canvas id="pieChart"></canvas></div>
      </div>
    </div>

    <!-- Recent Reports Card -->
    <div class="bg-white rounded-lg shadow p-6 border border-gray-200">
      <div class="flex items-center justify-between mb-4">
        <div>
          <h2 class="text-xl font-semibold">Recent report</h2>
          <p class="text-sm text-gray-500">Review and manage submitted reports</p>
        </div>
        <div class="flex items-center gap-3">
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </div>
            <input id="tableSearch" type="text" placeholder="Search Items..." 
                class="pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 w-64">
          </div>
        </div>
      </div>

      <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
          <thead>
            <tr class="text-left text-gray-500 border-b">
              <th class="py-3 px-4 font-medium">Item</th>
              <th class="py-3 px-4 font-medium">category</th>
              <th class="py-3 px-4 font-medium">Location</th>
              <th class="py-3 px-4 font-medium">Reporter</th>
              <th class="py-3 px-4 font-medium">Date</th>
              <th class="py-3 px-4 font-medium">Status</th>
            </tr>
          </thead>
          <tbody id="reportsTbody" class="text-gray-700">
            @forelse($recentReports as $report)
            <tr class="border-b hover:bg-gray-50">
              <td class="py-4 px-4">{{ $report->item_name ?? 'N/A' }}</td>
              <td class="py-4 px-4">{{ $report->category ?? 'N/A' }}</td>
              <td class="py-4 px-4">{{ $report->location ?? 'N/A' }}</td>
              <td class="py-4 px-4">{{ $report->reporter_name ?? 'N/A' }}</td>
              <td class="py-4 px-4">
                @if($report->report_type === 'found' && $report->time_found)
                  {{ \Carbon\Carbon::parse($report->time_found)->format('d/m/Y') }}
                @elseif($report->report_type === 'lost' && $report->time_lost)
                  {{ \Carbon\Carbon::parse($report->time_lost)->format('d/m/Y') }}
                @else
                  N/A
                @endif
              </td>
              <td class="py-4 px-4">
                <span class="inline-block px-3 py-1 rounded-full text-xs font-medium 
                  {{ ($report->report_type === 'found') ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                  {{ $report->report_type ?? 'unknown' }}
                </span>
              </td>
            </tr>
            @empty
            <tr class="border-b">
              <td colspan="6" class="py-4 px-4 text-center text-gray-500">No reports found</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </main>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    // Data untuk line chart (Reports Over Time) - REAL DATA
    const lineLabels = {!! json_encode($reportsOverTime->pluck('date')) !!};
    const lineData = {!! json_encode($reportsOverTime->pluck('count')) !!};

    // Data untuk pie chart (Categories)
    const pieLabels = {!! json_encode($reportCategories->pluck('category')) !!};
    const pieData = {!! json_encode($reportCategories->pluck('count')) !!};

    // Colors untuk charts
    const colors = ['#06b6d4', '#ef4444', '#8b5cf6', '#f59e0b', '#10b981', '#f97316'];

    // Line Chart - REAL DATA
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