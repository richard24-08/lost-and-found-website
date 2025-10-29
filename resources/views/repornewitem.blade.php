<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Report New Item</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans min-h-screen flex">

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
        <a href="#" class="w-full py-2 hover:bg-gray-800 transition">Home</a>
        <a href="#" class="w-full py-2 hover:bg-gray-800 transition">My Profile</a>
        <a href="#" class="w-full py-2 bg-gray-900 rounded-md text-white font-semibold hover:bg-gray-800 transition">
            + Report New Item
        </a>
        <a href="#" class="w-full py-2 hover:bg-gray-800 transition">My Reports</a>
        <a href="#" class="w-full py-2 hover:bg-gray-800 transition">View All Reports</a>
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

    <main class="flex-1 p-10">
    <h1 class="text-3xl font-extrabold mb-6">Hey, You found something new ?</h1>

    <form class="max-w-3xl">
        <label class="block mb-2 font-medium">Reporter name:</label>
        <input type="text" placeholder="Enter Your answer*" 
        class="w-full rounded-md border border-gray-300 py-3 px-4 shadow-sm mb-5 focus:ring-2 focus:ring-black outline-none" />

        <label class="block mb-2 font-medium">Where did you found this item:</label>
        <input type="text" placeholder="Enter Your answer*" 
        class="w-full rounded-md border border-gray-300 py-3 px-4 shadow-sm mb-5 focus:ring-2 focus:ring-black outline-none" />

        <label class="block mb-2 font-medium">What is the condition of this item:</label>
        <input type="text" placeholder="Enter Your answer*" 
        class="w-full rounded-md border border-gray-300 py-3 px-4 shadow-sm mb-5 focus:ring-2 focus:ring-black outline-none" />

        <label class="block mb-2 font-medium">What time did you found this item:</label>
        <input type="datetime-local" 
        class="w-full rounded-md border border-gray-300 py-3 px-4 shadow-sm mb-5 focus:ring-2 focus:ring-black outline-none" />

        <label class="block mb-2 font-medium">Please upload some picture of the item:</label>
        <div class="border border-gray-300 rounded-md px-4 py-3 shadow-sm mb-6 flex items-center space-x-3 cursor-pointer bg-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-6-4v8m0-8l-3 3m3-3l3 3M4 8h16M4 8l4-4m12 4l-4-4" />
        </svg>
        <span class="text-gray-600">Upload image</span>
        <input type="file" id="imageInput" accept="image/*" class="hidden" />
        </div>

        <div id="preview" class="mb-6"></div>

        <button type="submit" 
        class="bg-black text-white py-3 px-8 rounded-lg shadow hover:bg-gray-800 transition">
        Submit
        </button>
    </form>
</main>

    <script>
    const fileInput = document.getElementById('imageInput');
    const preview = document.getElementById('preview');
    const uploadBox = document.querySelector('.cursor-pointer');

    uploadBox.addEventListener('click', () => fileInput.click());

    fileInput.addEventListener('change', function() {
        preview.innerHTML = '';
        const file = this.files[0];
        if (!file) return;
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.className = 'mt-3 w-64 h-64 object-contain border rounded';
        preview.appendChild(img);
    });
    </script>
</body>
</html>
