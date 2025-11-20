<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>All Reports - Lost and Found</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans text-gray-800">

<div class="min-h-screen flex">

<aside class="w-64 bg-black text-white flex flex-col justify-between h-screen border-r border-blue-500">
        <div class="w-full text-left px-4 py-5 font-bold text-lg border-b border-gray-800">
            <div class="flex items-center gap-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <span>Lost and Found</span>
            </div>
        </div>

    <nav class="flex flex-col items-center flex-grow space-y-4 text-center mt-6">
        <a href="{{ route('home') ?? '#' }}" class="w-full py-2 hover:bg-gray-800 transition">Home</a>
        <a href="{{ route('profile') ?? '#' }}" class="w-full py-2 hover:bg-gray-800 transition">My Profile</a>
        <a href="{{ route('reportnewitem') ?? '#' }}" class="w-full py-2 hover:bg-gray-800 transition">+ Report New Item </a>
        <a href="{{ route('myreport') ?? '#' }}" class="w-full py-2 hover:bg-gray-800 transition">My Reports</a>
        <a href="{{ route('allreports') ?? '#' }}" class="w-full py-2 bg-gray-900 rounded-md text-white font-semibold hover:bg-gray-800 transition">
            View All Reports
        </a>
    </nav>

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

    <main class="flex-1 p-8">
      <div class="flex items-center justify-between mb-6">
        <h1 class="text-4xl font-extrabold tracking-tight">ALL REPORTS</h1>
        <div class="flex items-center gap-4">
          <input type="text" placeholder="Search items..." class="rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
          <button class="bg-black text-white px-4 py-2 rounded-md shadow hover:bg-gray-800 transition">+ Report New Item</button>
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <article class="bg-white rounded-lg shadow p-6 border-2 border-blue-200">
          <div class="flex justify-between items-start mb-3">
            <h2 class="text-xl font-semibold">Phone</h2>
            <span class="inline-block bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">Found</span>
          </div>

          <p class="text-sm text-gray-600 mb-4">
            An iPhone 100 Pro Max was reported found around Gotham Park. The phone seems to be in good condition.
          </p>

          <div class="text-sm text-gray-500 space-y-3 mb-4">
            <div class="flex items-center gap-3">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"></path></svg>
              <div>Electronic</div>
            </div>
            <div class="flex items-center gap-3">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 100 20 10 10 0 000-20z"></path></svg>
              <div>Park</div>
            </div>
            <div class="flex items-center gap-3">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M3 11h18M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z"></path></svg>
              <div>2025-08-07</div>
            </div>
          </div>

          <div class="mt-4">
            <button class="w-full bg-black text-white py-3 rounded-lg text-lg font-medium hover:bg-gray-800 transition">View Details</button>
          </div>
        </article>

        <article class="bg-white rounded-lg shadow p-6 border border-gray-200">
          <div class="flex justify-between items-start mb-3">
            <h2 class="text-xl font-semibold">Bracelet</h2>
            <span class="inline-block bg-red-600 text-white px-3 py-1 rounded-full text-sm font-medium">Lost</span>
          </div>

          <p class="text-sm text-gray-600 mb-4">
            A silver bracelet went missing near the school lobby. It has a simple chain design, please kindly report if found.
          </p>

          <div class="text-sm text-gray-500 space-y-3 mb-4">
            <div class="flex items-center gap-3">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"></path></svg>
              <div>Accessory</div>
            </div>
            <div class="flex items-center gap-3">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 100 20 10 10 0 000-20z"></path></svg>
              <div>Lobby</div>
            </div>
            <div class="flex items-center gap-3">
              <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M3 11h18M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z"></path></svg>
              <div>2025-09-08</div>
            </div>
          </div>

          <div class="mt-4">
            <button class="w-full bg-black text-white py-3 rounded-lg text-lg font-medium hover:bg-gray-800 transition">View Details</button>
          </div>
        </article>

        <article class="bg-white rounded-lg shadow p-6 border border-gray-200">
          <div class="flex justify-between items-start mb-3">
            <h2 class="text-xl font-semibold">Pencil Case</h2>
            <span class="inline-block bg-red-600 text-white px-3 py-1 rounded-full text-sm font-medium">Lost</span>
          </div>

          <p class="text-sm text-gray-600 mb-4">
            A black pencil case was lost in the lab after the web exam. Inside are pens, markers, and a small scientific calculator.
          </p>

          <div class="text-sm text-gray-500 space-y-3 mb-4">
            <div class="flex items-center gap-3"><svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"></path></svg><div>Accessory</div></div>
            <div class="flex items-center gap-3"><svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 100 20 10 10 0 000-20z"></path></svg><div>Lab</div></div>
            <div class="flex items-center gap-3"><svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M3 11h18M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z"></path></svg><div>2025-09-12</div></div>
          </div>

          <div class="mt-4">
            <button class="w-full bg-black text-white py-3 rounded-lg text-lg font-medium hover:bg-gray-800 transition">View Details</button>
          </div>
        </article>

        <article class="bg-white rounded-lg shadow p-6 border border-gray-200">
          <div class="flex justify-between items-start mb-3">
            <h2 class="text-xl font-semibold">Bottle</h2>
            <span class="inline-block bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium">Found</span>
          </div>

          <p class="text-sm text-gray-600 mb-4">
            A stainless-steel water bottle was left in the cafeteria. It has a blue cap and some minor scratches on the side.
          </p>

          <div class="text-sm text-gray-500 space-y-3 mb-4">
            <div class="flex items-center gap-3"><svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"></path></svg><div>Bottle</div></div>
            <div class="flex items-center gap-3"><svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 100 20 10 10 0 000-20z"></path></svg><div>Cafeteria</div></div>
            <div class="flex items-center gap-3"><svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M3 11h18M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z"></path></svg><div>2025-07-08</div></div>
          </div>

          <div class="mt-4">
            <button class="w-full bg-black text-white py-3 rounded-lg text-lg font-medium hover:bg-gray-800 transition">View Details</button>
          </div>
        </article>

      </div>
    </main>
  </div>

</body>
</html>
