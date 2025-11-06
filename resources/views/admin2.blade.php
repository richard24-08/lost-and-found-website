<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Home - Lost and Found</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">
  <div class="flex min-h-screen">

<div class="min-h-screen flex"></div>
<aside class="w-64 bg-black text-white flex flex-col p-4 border-r-4 border-blue-500 overflow-auto">
    <div>
        <div class="w-full px-4 py-5 font-bold text-lg border-b border-gray-800 flex items-center gap-3">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
            <span>Lost and Found</span>
    </div>

    <nav class="flex flex-col items-center flex-grow space-y-4 text-center mt-6">
        <a href="#" class="w-full py-2 bg-gray-900 rounded-md text-white font-semibold hover:bg-gray-800 transition">
            Home
        </a>
        <a href="#" class="w-full py-2 hover:bg-gray-800 transition">User List</a>
        <a href="#" class="w-full py-2 hover:bg-gray-800 transition">Report list</a>
    </nav>

    </div>

      <div class="w-full bg-gray-900 py-4 px-4 text-left border-t border-gray-800 mt-auto">
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

    <main class="flex-1 p-6">
      <header class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold">Home</h1>
        <a href="#" class="bg-black text-white px-3 py-2 rounded">+ Report</a>
      </header>

    <div class="mb-6">
        <input id="globalSearch" type="text" placeholder="Search Items..." 
            class="w-full max-w-xl rounded-full px-4 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
    </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm">
            <p class="text-sm mb-2">Item Lists</p>
            <p class="font-bold text-2xl">2.034</p>
            <p class="text-xs text-gray-500">+12% from last month</p>
        </div>

        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm">
            <p class="text-sm mb-2">Items Returned</p>
            <p class="font-bold text-2xl">1.434</p>
            <p class="text-xs text-gray-500">+12% from last month</p>
        </div>

        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm">
            <p class="text-sm mb-2">Pending Reports</p>
            <p class="font-bold text-2xl">134</p>
            <p class="text-xs text-gray-500">+12% from last month</p>
        </div>

        <div class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm">
            <p class="text-sm mb-2">Active Users</p>
            <p class="font-bold text-2xl">1.500</p>
            <p class="text-xs text-gray-500">+2% from last month</p>
        </div>
        </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
        <div class="bg-white p-4 rounded shadow">
          <h3 class="font-semibold mb-2">Reports Over Time</h3>
          <div class="h-56"><canvas id="lineChart"></canvas></div>
        </div>

        <div class="bg-white p-4 rounded shadow">
          <h3 class="font-semibold mb-2">Category</h3>
          <div class="flex">
            <div class="w-1/2 h-56"><canvas id="pieChart"></canvas></div>
            <div id="legend" class="pl-4 text-sm"></div>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow p-6 border border-gray-200">
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
                <th class="py-3 px-4">category</th>
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

  <script>
    const lineLabels = ['1 Okt','5 Okt','10 Okt','15 Okt','20 Okt','25 Okt','30 Okt'];
    const lineData = [5,20,50,30,20,20,5];

    const pieLabels = ['Document','Electronic','Accessories','Personal'];
    const pieData = [30,40,15,25];

    // Line chart
    const ctxL = document.getElementById('lineChart').getContext('2d');
    new Chart(ctxL, { type: 'line', data: { labels: lineLabels, datasets: [{ label: 'Reports', data: lineData, borderColor: '#06b6d4', tension: 0.3, fill: true }] }, options: { responsive: true, maintainAspectRatio: false } });

    // Pie chart
    const ctxP = document.getElementById('pieChart').getContext('2d');
    const pie = new Chart(ctxP, { type: 'doughnut', data: { labels: pieLabels, datasets: [{ data: pieData }] }, options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } } } });

    // simple legend
    const legend = document.getElementById('legend');
    pie.data.labels.forEach((label,i) => { legend.innerHTML += `<div class="mb-2">• ${label}: ${pie.data.datasets[0].data[i]}</div>`; });

    // search fungsi sederhana
    const tbody = document.getElementById('reportsTbody');
    document.getElementById('tableSearch').addEventListener('input', function(){
      const q = this.value.toLowerCase().trim();
      Array.from(tbody.querySelectorAll('tr')).forEach(row => { row.style.display = row.innerText.toLowerCase().includes(q) ? '' : 'none'; });
    });
    document.getElementById('globalSearch').addEventListener('input', function(){ document.getElementById('tableSearch').value = this.value; document.getElementById('tableSearch').dispatchEvent(new Event('input')); });
  </script>
</body>
</html>
