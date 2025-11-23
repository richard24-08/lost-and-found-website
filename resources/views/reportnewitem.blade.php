<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Report New Item</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-white font-sans min-h-screen flex text-xl">

    <!-- Sidebar dengan fixed height -->
    <aside class="w-80 bg-[#212121] text-white flex flex-col sticky top-0 h-screen shadow-[4px_0_4px_0_rgba(0,0,0,0.25)]">
        <div class="p-4 font-bold text-3xl border-b border-gray-700 text-center">
            Lost and Found
        </div>

        <nav class="flex flex-col mt-6 px-4 space-y-3">
            <a href="{{ route('home') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">Home</a>
            <a href="{{ route('profile') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">My Profile</a>
            <a href="{{ route('reports.mine') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">My Reports</a>
            <a href="{{ route('reports.create') }}" class="bg-white text-black rounded px-3 py-2 font-medium text-center text-xl">+ Report New Item</a>
            
            <!-- View All Reports untuk USER BIASA (hanya lihat) -->
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

    <!-- Main content dengan scroll independent -->
    <main class="flex-1 p-10 overflow-auto">
        <h1 class="text-6xl font-extrabold mb-8 uppercase">REPORT NEW ITEM</h1>

        <form method="POST" action="{{ route('reports.store') }}" enctype="multipart/form-data" class="max-w-3xl">
            @csrf
            
            <!-- Report Type (hidden) -->
            <input type="hidden" name="report_type" value="lost">

            <!-- Reporter Name -->
            <label class="block mb-3 font-medium text-2xl">Reporter name:</label>
            <input type="text" name="reporter_name" placeholder="Enter reporter name*" 
                   class="w-full rounded-lg border border-gray-300 py-4 px-5 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] mb-6 focus:ring-2 focus:ring-black outline-none text-xl" required />

            <!-- Item Name -->
            <label class="block mb-3 font-medium text-2xl">What is the name of the item:</label>
            <input type="text" name="item_name" placeholder="Enter item name*" 
                   class="w-full rounded-lg border border-gray-300 py-4 px-5 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] mb-6 focus:ring-2 focus:ring-black outline-none text-xl" required />

            <!-- Last Seen -->
            <label class="block mb-3 font-medium text-2xl">Last seen location:</label>
            <input type="text" name="last_seen" placeholder="Enter last seen location*" 
                   class="w-full rounded-lg border border-gray-300 py-4 px-5 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] mb-6 focus:ring-2 focus:ring-black outline-none text-xl" required />

            <!-- Location (hidden, sama dengan last_seen untuk lost item) -->
            <input type="hidden" name="location" value="Unknown">

            <!-- Time Lost -->
            <label class="block mb-3 font-medium text-2xl">When was it lost:</label>
            <input type="datetime-local" name="time_lost"
                   class="w-full rounded-lg border border-gray-300 py-4 px-5 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] mb-6 focus:ring-2 focus:ring-black outline-none text-xl" required />

            <!-- Category -->
            <label class="block mb-3 font-medium text-2xl">What category is this item:</label>
            <input type="text" name="category" placeholder="Enter category*" 
                   class="w-full rounded-lg border border-gray-300 py-4 px-5 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] mb-6 focus:ring-2 focus:ring-black outline-none text-xl" required />

            <!-- Brand -->
            <label class="block mb-3 font-medium text-2xl">What brand is this item from:</label>
            <input type="text" name="brand" placeholder="Enter brand" 
                   class="w-full rounded-lg border border-gray-300 py-4 px-5 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] mb-6 focus:ring-2 focus:ring-black outline-none text-xl" />

            <!-- Size -->
            <label class="block mb-3 font-medium text-2xl">What size is this item:</label>
            <input type="text" name="size" placeholder="Enter size" 
                   class="w-full rounded-lg border border-gray-300 py-4 px-5 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] mb-6 focus:ring-2 focus:ring-black outline-none text-xl" />

            <!-- Color -->
            <label class="block mb-3 font-medium text-2xl">What color is this item:</label>
            <input type="text" name="color" placeholder="Enter color" 
                   class="w-full rounded-lg border border-gray-300 py-4 px-5 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] mb-6 focus:ring-2 focus:ring-black outline-none text-xl" />

            <!-- Description -->
            <label class="block mb-3 font-medium text-2xl">Write a description of the item:</label>
            <textarea name="description" placeholder="Enter description*" rows="4"
                   class="w-full rounded-lg border border-gray-300 py-4 px-5 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] mb-6 focus:ring-2 focus:ring-black outline-none text-xl" required></textarea>

            <!-- Image Upload -->
            <label class="block mb-3 font-medium text-2xl">Please upload some picture of the item:</label>
            <div class="border border-gray-300 rounded-lg px-5 py-4 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] mb-6 flex items-center space-x-4 cursor-pointer bg-white text-xl" onclick="document.getElementById('image').click()">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-6-4v8m0-8l-3 3m3-3l3 3M4 8h16M4 8l4-4m12 4l-4-4" />
                </svg>
                <span class="text-gray-600">Upload image</span>
                <input type="file" id="image" name="image" accept="image/*" class="hidden" />
            </div>

            <!-- Image Preview -->
            <div id="preview" class="mb-6"></div>

            <!-- Submit Button -->
            <button type="submit" 
                    class="bg-black text-white py-4 px-10 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:bg-gray-800 transition text-2xl">
                Submit Report
            </button>
        </form>
    </main>

    <script>
    const fileInput = document.getElementById('image');
    const preview = document.getElementById('preview');

    fileInput.addEventListener('change', function() {
        preview.innerHTML = '';
        const file = this.files[0];
        if (!file) return;
        
        // Validasi file type
        if (!file.type.startsWith('image/')) {
            alert('Please select an image file');
            this.value = '';
            return;
        }
        
        // Validasi file size (max 3MB)
        if (file.size > 3 * 1024 * 1024) {
            alert('Image size should be less than 3MB');
            this.value = '';
            return;
        }
        
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.className = 'mt-3 w-64 h-64 object-contain border rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]';
        preview.appendChild(img);
    });

    // Set default datetime untuk time_lost
    document.addEventListener('DOMContentLoaded', function() {
        const now = new Date();
        const timeLostInput = document.querySelector('input[name="time_lost"]');
        if (timeLostInput) timeLostInput.value = now.toISOString().slice(0, 16);
    });
    </script>
</body>
</html>