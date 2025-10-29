<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Item Detail - Lost & Found</title>

<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

<div class="max-w-7xl mx-auto p-6">
    <a href="#" class="inline-flex items-center text-gray-700 mb-4 hover:underline">

        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back to Homepage
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 space-y-6">
        <div class="bg-white rounded-lg shadow p-3">
            <img src="/images/wallet.jpg" alt="Item image"
                class="w-full h-80 md:h-96 object-cover rounded-lg border-4 border-blue-300" />
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-start justify-between">
            <div>
                <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight">BLACK WALLET</h2>
                <p class="text-sm text-gray-500 mt-2 max-w-2xl">
                I lost my black leather wallet while jogging in Gotham Park. Inside there were some cash,
                a student ID, and a few important cards.
                </p>
            </div>

            <div class="ml-4">
                <span class="inline-block bg-red-600 text-white px-4 py-2 rounded-full font-semibold">Lost</span>
            </div>
            </div>

            <div class="border-t border-gray-100 my-6"></div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-gray-600">
            <div class="flex items-center space-x-3">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"></path>
                </svg>
                <div>
                <div class="text-xs text-gray-400">Category</div>
                <div class="text-sm">Accessory</div>
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M3 11h18M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z"></path>
                </svg>
                <div>
                <div class="text-xs text-gray-400">Date</div>
                <div class="text-sm">2025-08-08</div>
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 100 20 10 10 0 000-20zM12 7v5l3 3"></path>
                </svg>
                <div>
                <div class="text-xs text-gray-400">Location</div>
                <div class="text-sm">Park</div>
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l2 2"></path>
                </svg>
            <div>
            <div class="text-xs text-gray-400">Last Seen</div>
                <div class="text-sm">—</div>
                </div>
            </div>
            </div>

            <div class="mt-6">
            <h3 class="font-semibold mb-3">Item Details</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm text-gray-600">
                <div>
                <div class="text-xs text-gray-400">Brand</div>
                <div class="mt-1">Fossil</div>
                </div>
                <div>
                <div class="text-xs text-gray-400">Size</div>
                <div class="mt-1">4.5 x 3.5 cm</div>
                </div>
                <div>
                <div class="text-xs text-gray-400">Color</div>
                <div class="mt-1">Black</div>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="space-y-6">
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex items-start space-x-3">
            <div class="p-3 bg-gray-100 rounded-full">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 1112 21a9 9 0 01-6.879-3.196z"></path>
                </svg>
            </div>
            <div>
                <div class="text-xs text-gray-400">Reported by</div>
                <div class="font-semibold">Michael Jackson</div>
                <div class="text-sm text-gray-500 mt-2 space-y-1">
                <div class="flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0"></path></svg> michael.j@gmail.com</div>
                <div class="flex items-center"><svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h1l2 5h8l2-5h1a2 2 0 012 2v13a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg> +62-5445-1235</div>
                </div>
            </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <h4 class="text-sm font-medium mb-3">Actions</h4>
            <div class="space-y-3">
            <button onclick="actionClick('Contact report')" class="w-full inline-flex items-center justify-center gap-3 bg-black text-white py-3 rounded-lg shadow">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 10a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.4 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7A8.38 8.38 0 01 4 11"></path></svg>
                Contact report
            </button>

            <button onclick="actionClick('I found this item')" class="w-full inline-flex items-center justify-center gap-3 border border-gray-200 py-3 rounded-lg">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                I found this item
            </button>

            <button onclick="actionClick('Report a problem')" class="w-full inline-flex items-center justify-center gap-3 border border-gray-200 py-3 rounded-lg text-red-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M21 12A9 9 0 1112 3"></path></svg>
                Report a problem
            </button>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-4">
            <h4 class="text-sm font-medium mb-3">Report Status</h4>
            <div class="flex items-center gap-3">
            <span class="inline-block w-3 h-3 rounded-full bg-green-400"></span>
            <div>
                <div class="font-semibold">Active Report</div>
                <div class="text-xs text-gray-400">This item was reported Dec 15, 2024 and is actively being searched for.</div>
            </div>
            </div>
        </div>
    </div>

    </div>

    <script>
    function actionClick(name){
        alert(name + ' clicked');
    }
    </script>
</body>
</html>
