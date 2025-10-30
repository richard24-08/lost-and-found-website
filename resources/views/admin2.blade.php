{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Home - Lost and Found</title>

  <!-- Tailwind CDN (quick preview) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* sedikit styling untuk mirror tampilan referensi */
    .card-radius { border-radius: 12px; }
  </style>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

  <div class="min-h-screen flex">
    <!-- SIDEBAR -->
    <aside class="w-64 bg-black text-white flex flex-col justify-between h-screen border-r-4 border-blue-500">
      <div>
        <div class="w-full px-4 py-5 font-bold text-lg border-b border-gray-800 flex items-center gap-3">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
          <span>Lost and Found</span>
        </div>

        <nav class="mt-6 flex flex-col items-start px-6 space-y-3">
          <a href="#" class="w-full text-left px-3 py-2 rounded bg-gray-900">Home</a>
          <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">My Profile</a>
          <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">My Reports</a>
          <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">+ Report New Item</a>
          <a href="#" class="w-full text-left px-3 py-2 rounded hover:bg-gray-800 transition">View All Reports</a>
        </nav>
      </div>

      <div class="w-full bg-gray-900 py-4 px-4 text-left border-t border-gray-800">
        <div class="font-semibold">Richard Sebastian</div>
        <div class="text-xs text-gray-400">imsebastian@gmail.com</div>
      </div>
    </aside>

    <!-- MAIN -->
    <main class="flex-1 p-8">
      <!-- header -->
      <div class="flex items-center justify-between mb-6">
        <h1 class="text-4xl font-extrabold tracking-tight">HOME</h1>
        <a href="#" class="bg-black text-white px-4 py-2 rounded-md shadow hover:bg-gray-800 transition">+ Report New Item</a>
      </div>

      <!-- search -->
      <div class="mb-6">
        <input id="globalSearch" type="text" placeholder="Search Items..." 
               class="w-full max-w-xl rounded-full px-4 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400" />
      </div>

      <!-- summary cards -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm card-radius">
          <p class="text-sm mb-2">Item Lists</p>
          <p class="font-bold text-2xl">2.034</p>
          <p class="text-xs text-gray-500">+12% from last month</p>
        </div>

        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm card-radius">
          <p class="text-sm mb-2">Items Returned</p>
          <p class="font-bold text-2xl">1.434</p>
          <p class="text-xs text-gray-500">+12% from last month</p>
        </div>

        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm card-radius">
          <p class="text-sm mb-2">Pending Reports</p>
          <p class="font-bold text-2xl">134</p>
          <p class="text-xs text-gray-500">+12% from last month</p>
        </div>

        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm card-radius">
          <p class="text-sm mb-2">Active Users</p>
          <p class="font-bold text-2xl">1.500</p>
          <p class="text-xs text-gray-500">+2% from last month</p>
        </div>
      </div>

      <!-- CHARTS: line + pie side-by-side (matches reference) -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Line Chart Card -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm card-radius">
          <h3 class="text-lg font-semibold mb-4">Report Over time</h3>
          <div class="h-64">
            <canvas id="lineChart" class="w-full h-full"></canvas>
          </div>
        </div>

        <!-- Pie Chart Card -->
        <div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm card-radius">
          <h3 class="text-lg font-semibold mb-4">Category</h3>
          <div class="flex items-center">
            <div class="w-1/2 h-64">
              <canvas id="pieChart" class="w-full h-full"></canvas>
            </div>
            <div id="pieLegend" class="ml-6 text-sm"></div>
          </div>
        </div>
      </div>

      <!-- Recent report card -->
      <div class="bg-white rounded-lg shadow p-6 border border-gray-200 card-radius">
        <div class="flex items-center justify-between mb-4">
          <div>
            <h2 class="text-xl font-semibold">Recent report</h2>
            <p class="text-sm text-gray-500">Review and manage submitted reports</p>
          </div>

          <div class="flex items-center gap-3">
            <input id="tableSearch" type="text" placeholder="Search Items..." 
                   class="rounded-md border border-gray-300 px-3 py-2 outline-none focus:ring-2 focus:ring-blue-400" />
          </div>
        </div>

        <div class="overflow-x-auto">
          <table class="min-w-full text-sm">
            <thead>
              <tr class="text-left text-gray-500">
                <th class="py-3 px-4">Item</th>
                <th class="py-3 px-4">Category</th>
                <th class="py-3 px-4">Location</th>
                <th class="py-3 px-4">Reporter</th>
                <th class="py-3 px-4">Date</th>
                <th class="py-3 px-4">Status</th>
              </tr>
            </thead>
            <tbody id="reportsTbody" class="text-gray-700">
              <tr class="border-t">
                <td class="py-4 px-4">iphone</td>
                <td class="py-4 px-4">electronic</td>
                <td class="py-4 px-4">park</td>
                <td class="py-4 px-4">sam</td>
                <td class="py-4 px-4">19/1/2024</td>
                <td class="py-4 px-4">
                  <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">found</span>
                </td>
              </tr>

              <tr class="border-t">
                <td class="py-4 px-4">laptop</td>
                <td class="py-4 px-4">electronic</td>
                <td class="py-4 px-4">cafe</td>
                <td class="py-4 px-4">max</td>
                <td class="py-4 px-4">29/6/2024</td>
                <td class="py-4 px-4">
                  <span class="inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">lost</span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </main>
  </div>

  <!-- Chart.js CDN -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    // Example line chart labels & values (October style)
    const lineLabels = ['1 october','5 october','10 october','15 october','20 october','25 october','30 october'];
    const lineData = [5, 20, 50, 30, 20, 20, 5];

    // Pie chart data
    const pieLabels = ['Document','Electronic','Accesoris','Personal Item'];
    const pieData = [30, 40, 15, 25];

    // If you want dynamic server data, in controller pass arrays and uncomment below lines:

    // ---------- LINE CHART ----------
    const ctxLine = document.getElementById('lineChart').getContext('2d');
    const gradient = ctxLine.createLinearGradient(0,0,0,300);
    gradient.addColorStop(0, 'rgba(14,165,233,0.20)');
    gradient.addColorStop(1, 'rgba(14,165,233,0.02)');

    const lineChart = new Chart(ctxLine, {
      type: 'line',
      data: {
        labels: lineLabels,
        datasets: [{
          label: 'Reports',
          data: lineData,
          borderColor: '#06b6d4',
          backgroundColor: gradient,
          tension: 0.35,
          pointRadius: 4,
          pointBackgroundColor: '#ffffff',
          pointBorderColor: '#06b6d4',
          pointHoverRadius: 6,
          fill: true,
          borderWidth: 3
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false }, tooltip: { mode: 'index', intersect: false } },
        scales: {
          x: { grid: { color: 'rgba(0,0,0,0.04)' }, ticks: { color: '#6b7280', font: { size: 11 } } },
          y: { beginAtZero: true, grid: { borderDash: [4,4], color: 'rgba(0,0,0,0.04)' }, ticks: { color: '#6b7280', stepSize: 10 } }
        }
      }
    });

    // ---------- PIE (doughnut) CHART ----------
    const ctxPie = document.getElementById('pieChart').getContext('2d');
    const pieColors = ['#20c997','#e11d48','#8b5cf6','#f59e0b']; // green, red, purple, amber
    const pieChart = new Chart(ctxPie, {
      type: 'doughnut',
      data: {
        labels: pieLabels,
        datasets: [{
          data: pieData,
          backgroundColor: pieColors,
          borderColor: '#ffffff',
          borderWidth: 2,
          hoverOffset: 8
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '45%',
        plugins: {
          legend: { display: false },
          tooltip: { callbacks: { label: (ctx) => `${ctx.label}: ${ctx.parsed}` } }
        }
      }
    });

    // Render simple custom legend for pie
    function renderPieLegend(chart, containerId) {
      const container = document.getElementById(containerId);
      const items = chart.data.labels.map((label, i) => {
        const color = chart.data.datasets[0].backgroundColor[i];
        const value = chart.data.datasets[0].data[i];
        return `<div class="mb-3 flex items-center gap-3">
                  <span style="width:14px;height:14px;background:${color};display:inline-block;border-radius:4px;"></span>
                  <div>
                    <div class="font-semibold" style="color:${color}">${label}</div>
                    <div class="text-xs text-gray-500">${value}</div>
                  </div>
                </div>`;
      }).join('');
      container.innerHTML = items;
    }
    renderPieLegend(pieChart, 'pieLegend');

    // table search + global search wiring
    (function () {
      const tableSearch = document.getElementById('tableSearch');
      const tbody = document.getElementById('reportsTbody');

      tableSearch?.addEventListener('input', function () {
        const q = this.value.toLowerCase().trim();
        Array.from(tbody.querySelectorAll('tr')).forEach(row => {
          const text = row.innerText.toLowerCase();
          row.style.display = text.includes(q) ? '' : 'none';
        });
      });

      document.getElementById('globalSearch')?.addEventListener('input', function () {
        const v = this.value.trim();
        document.getElementById('tableSearch').value = v;
        document.getElementById('tableSearch').dispatchEvent(new Event('input'));
      });

      // redraw charts on resize for consistent look
      window.addEventListener('resize', () => {
        lineChart.resize();
        pieChart.resize();
      });
    })();
  </script>
</body>
</html>
