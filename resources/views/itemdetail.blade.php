<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Item Detail - Lost & Found</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .font-sans {
        font-family: 'Poppins', sans-serif;
    }
</style>
</head>
<body class="bg-gray-50 font-sans text-xl">

<div class="max-w-[95vw] mx-auto p-6">
    <a href="{{ route('home') ?? '#' }}" class="inline-flex items-center text-gray-700 mb-6 hover:underline text-2xl">
        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
        </svg>
        Back to Homepage
    </a>

    <div class="grid grid-cols-1 xl:grid-cols-4 gap-8">


        <div class="xl:col-span-3 space-y-8">

            <div class="rounded-lg">
                @if(!empty($report->image_path))
                    <img src="{{ asset('images/' . $report->image_path) }}" 
                        class="w-full h-80 md:h-96 lg:h-[600px] xl:h-[700px] object-cover rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" 
                        alt="{{ $report->item_name }}"
                        onerror="this.onerror=null; this.src='{{ asset($report->image_path) }}';">
                @else
                    <div class="w-full h-80 md:h-96 lg:h-[600px] xl:h-[700px] bg-gray-200 rounded-lg flex items-center justify-center shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
                        <span class="text-gray-500 text-2xl">No Image Available</span>
                    </div>
                @endif
            </div>
            

            <div class="bg-white rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] p-10">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <h2 class="text-5xl md:text-6xl font-extrabold tracking-tight text-black mb-6">{{ $report->item_name }}</h2>
                        <p class="text-2xl text-gray-600 leading-relaxed">
                        {{ $report->description }}
                        </p>
                    </div>

                    <div class="ml-8 flex-shrink-0">
                        @if ($report->report_type === 'lost')
                            <span class="inline-block bg-red-600 text-white px-8 py-4 rounded-lg text-3xl font-semibold">
                                Lost
                            </span>
                        @else
                            <span class="inline-block bg-green-600 text-white px-8 py-4 rounded-lg text-3xl font-semibold">
                                Found
                            </span>
                        @endif
                    </div>
                </div>

                <div class="border-t border-gray-100 my-10"></div>

                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-2xl text-gray-600">
                    <div class="flex items-center space-x-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18"></path>
                        </svg>
                        <div>
                        <div class="text-xl text-gray-500">Category</div>
                        <div class="text-2xl">{{ $report->category }}</div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M3 11h18M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z"></path>
                        </svg>
                        <div>
                        <div class="text-xl text-gray-500">Date</div>
                        <div class="text-2xl">
                                {{ \Carbon\Carbon::parse($report->time_lost)->format('d F Y') }}
                        </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2a10 10 0 100 20 10 10 0 000-20zM12 7v5l3 3"></path>
                        </svg>
                        <div>
                        <div class="text-xl text-gray-500">Location</div>
                        <div class="text-2xl">
                            @if ($report->report_type === 'lost')
                                -
                            @else
                                {{ $report->location }}
                            @endif
                        </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l2 2"></path>
                        </svg>
                        <div>
                        <div class="text-xl text-gray-500">Last Seen</div>
                            <div class="text-2xl">{{ $report->last_seen }}</div>
                        </div>
                    </div>
                </div>

                <div class="mt-10">
                    <h3 class="font-semibold text-4xl text-black mb-8">Item Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-2xl text-gray-600">
                        <div>
                            <div class="text-2xl text-gray-500">Brand</div>
                            <div class="mt-3 text-3xl">{{ $report->brand }}</div>
                        </div>
                        <div>
                            <div class="text-2xl text-gray-500">Size</div>
                            <div class="mt-3 text-3xl">{{ $report->size }}</div>
                        </div>
                        <div>
                            <div class="text-2xl text-gray-500">Color</div>
                            <div class="mt-3 text-3xl">{{ $report->color }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       
        <div class="xl:col-span-1 space-y-6">

            <div class="bg-white rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] p-5">
                <div class="flex items-start">
                    <div class="w-full">
                        <div class="text-lg text-gray-500 mb-2">👤 Reported by</div>
                        <div class="font-semibold text-xl text-black mb-4">{{ $report->finder_name }}</div>

                        <div class="text-lg text-gray-600 space-y-3">
                            <div class="flex items-center">
                                📩 {{ $finderUser->email ?? '-' }}
                            </div>

                            <div class="flex items-center">
                                📞 {{ $finderUser->phone_number ?? '-' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="bg-white rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] p-5">
                <h4 class="text-xl font-medium text-black mb-4">Actions</h4>
                <div class="space-y-3">

                    <!-- Button 1 -->
                    <button onclick="actionClick('Contact report')" 
                        class="w-full inline-flex items-center justify-center gap-3 bg-black text-white py-3 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] text-lg">
                        📞 Contact report
                    </button>

                    <!-- Button 2 -->
                    @if ($report->report_type === 'lost')
                        <button id="openFoundBtn" type="button" 
                                data-report-id="{{ $report->id }}"
                                onclick="openFoundModal()" 
                                class="w-full inline-flex items-center justify-center gap-3 bg-black text-white py-3 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] text-lg">
                            ✅ I found this item
                        </button>
                    @endif

                    <!-- Button 3 -->
                    <button onclick="actionClick('Report a problem')" 
                        class="w-full inline-flex items-center justify-center gap-3 bg-black text-white py-3 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] text-lg">
                        ❗Report a problem
                    </button>

                </div>
            </div>


            <div class="bg-white rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] p-5">
                <h4 class="text-xl font-medium text-black mb-4">Report Status</h4>

                <div class="flex items-center gap-3">

                    <span class="inline-block w-3 h-3 rounded-full 
                        {{ $report->report_type === 'lost' ? 'bg-red-500' : 'bg-green-500' }}">
                    </span>

                    <div>
                        <!-- Judul status -->
                        <div class="font-semibold text-xl text-black">
                            {{ $report->report_type === 'lost' ? 'Active Report' : 'Item has been found' }}
                        </div>

                        <!-- Deskripsi status -->
                        <div class="text-lg text-gray-600 mt-1">
                            @if ($report->report_type === 'lost')
                                This item was reported and is actively being searched for.
                            @else
                                This item has already been found and is no longer being searched for.
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="foundModal" class="fixed inset-0 z-50 hidden flex items-center justify-center">
        <div id="foundOverlay" class="fixed inset-0 bg-black bg-opacity-40 backdrop-blur-sm"></div>

        <div class="relative bg-white rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] w-full max-w-4xl mx-8 p-10 z-10">
            <div class="flex items-start justify-between mb-8">
                <h3 class="text-4xl font-bold text-black">You found this item?</h3>
                <button type="button" aria-label="Close" class="text-gray-500 hover:text-gray-800 text-3xl" onclick="closeFoundModal()">
                    ✕
                </button>
            </div>

            <form id="foundForm" class="space-y-8 text-2xl">
                @csrf
                <div class="space-y-8">
                    <div>
                        <label class="text-2xl font-medium text-black block mb-4">What's your name?</label>
                        <input name="finder_name" type="text" required 
                               class="w-full rounded-lg border border-gray-300 px-6 py-4 text-2xl" />
                    </div>

                    <div>
                        <label class="text-2xl font-medium text-black block mb-4">Where do you found this item?</label>
                        <input name="location" type="text" required 
                               class="w-full rounded-lg border border-gray-300 px-6 py-4 text-2xl" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="text-2xl font-medium text-black block mb-4">When do you find this item?</label>
                            <input name="date_found" type="date" 
                                   class="w-full rounded-lg border border-gray-300 px-6 py-4 text-2xl" />
                        </div>

                        <div>
                            <label class="text-2xl font-medium text-black block mb-4">What time?</label>
                            <input name="time_found" type="time" 
                                   class="w-full rounded-lg border border-gray-300 px-6 py-4 text-2xl" />
                        </div>
                    </div>
                </div>

                <div class="flex justify-center pt-6">
                    <button type="submit" 
                            class="px-12 py-5 bg-black text-white rounded-lg font-semibold text-3xl w-full md:w-2/3 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:bg-gray-800 transition">
                        Submit Report
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
    function actionClick(name){
        alert(name + ' clicked');
    }
    </script>

    <script>
    const foundModal = document.getElementById('foundModal');
    const foundOverlay = document.getElementById('foundOverlay');

    function openFoundModal() {
        foundModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; 
    }

    function closeFoundModal() {
        foundModal.classList.add('hidden');
        document.body.style.overflow = ''; 
        resetFoundForm();
    }

    foundOverlay.addEventListener('click', closeFoundModal);

    document.addEventListener('keydown', function(e){
        if (e.key === 'Escape' && !foundModal.classList.contains('hidden')) closeFoundModal();
    });

    function previewFile(inputEl, imgElId, placeholderId) {
        const file = inputEl.files && inputEl.files[0];
        const imgEl = document.getElementById(imgElId);
        const placeholder = document.getElementById(placeholderId);
        if (!file) {
            imgEl.src = '';
            imgEl.classList.add('hidden');
            placeholder.classList.remove('hidden');
            return;
        }
        const reader = new FileReader();
        reader.onload = function(e) {
            imgEl.src = e.target.result;
            imgEl.classList.remove('hidden');
            placeholder.classList.add('hidden');
        };
        reader.readAsDataURL(file);
    }
    
    function resetFoundForm(){
        const form = document.getElementById('foundForm');
        form.reset();
        document.getElementById('preview1').classList.add('hidden');
        document.getElementById('preview1').src = '';
        document.getElementById('placeholder1').classList.remove('hidden');
        document.getElementById('preview2').classList.add('hidden');
        document.getElementById('preview2').src = '';
        document.getElementById('placeholder2').classList.remove('hidden');
    }
    </script>
    
    <script src="{{ asset('js/found-modal.js') }}"></script>

</div>
</body>
</html>