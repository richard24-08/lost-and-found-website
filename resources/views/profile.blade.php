<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Profile - Lost and Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800 flex">

    <aside class="w-80 bg-[#212121] text-white flex flex-col fixed left-0 top-0 h-screen">
        <div class="p-4 font-bold text-lg border-b border-gray-700">
            Lost and Found
        </div>

        <nav class="flex flex-col mt-6 px-4 space-y-3">
            <a href="{{ route('home') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 transition duration-200">Home</a>
            <a href="{{ route('user.profile') }}" class="bg-white text-black rounded px-3 py-2 font-medium">My Profile</a>
            <a href="{{ route('report.mine') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 transition duration-200">My Reports</a>
            <a href="{{ route('report.create') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 transition duration-200">+ Report New Item</a>
            <a href="{{ route('reports.all') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 transition duration-200">View All Reports</a>
        </nav>

        <div class="mt-auto p-4 text-sm bg-[#151515] flex items-center justify-between rounded-t-lg">
            <div>
                <div class="font-medium">{{ auth()->user()->name }}</div>
                <div class="text-xs text-gray-400">{{ auth()->user()->email }}</div>
            </div>
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
               class="ml-2 text-white">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
    </aside>

    <main class="ml-80 flex-1 p-6 min-h-screen">
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Photo Profile - Height sama dengan card Personal Information -->
            <div class="lg:col-span-1 flex items-center justify-center">
                <div class="w-full h-full">
                    <!-- Menggunakan image_path yang sudah ada -->
                    <img src="{{ auth()->user()->image_path ? asset('storage/' . auth()->user()->image_path) : asset('images/default_image.jpg') }}" 
                    alt="Profile photo" 
                    class="w-full h-full max-h-[600px] object-cover rounded-lg shadow-md" />
                </div>
            </div>

            <!-- Personal Information Card -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow p-8 h-full">
                    <h2 class="text-2xl font-bold mb-6 text-center">Personal Information</h2>
                    <div class="border-t border-gray-100 -mx-8 px-8 pt-6">
                        <div class="grid grid-cols-3 gap-6 text-base">
                            <div class="text-gray-500 font-medium">Name</div>
                            <div class="col-span-2 font-semibold text-lg">: {{ auth()->user()->name }}</div>

                            <div class="text-gray-500 font-medium">Birth date</div>
                            <div class="col-span-2 text-lg">: {{ auth()->user()->birth_date ? \Carbon\Carbon::parse(auth()->user()->birth_date)->format('d-m-Y') : 'Not set' }}</div>

                            <div class="text-gray-500 font-medium">Contact</div>
                            <div class="col-span-2 text-lg">: {{ auth()->user()->phone_number ?? 'Not set' }}</div>

                            <div class="text-gray-500 font-medium">E-mail</div>
                            <div class="col-span-2 text-lg">: {{ auth()->user()->email }}</div>

                            <div class="text-gray-500 font-medium">Status</div>
                            <div class="col-span-2 text-lg">: {{ auth()->user()->status ?? 'Not set' }}</div>

                            <div class="text-gray-500 font-medium">Department</div>
                            <div class="col-span-2 text-lg">: {{ auth()->user()->department }}</div>
                        </div>

                        <!-- Form Update Photo - Sejajar kiri -->
                        <form action="{{ route('user.profile.photo') }}" method="POST" enctype="multipart/form-data" class="mt-8">
                            @csrf
                            <div class="text-left">
                                <input type="file" name="profile_picture" id="profile_picture" 
                                       class="hidden" accept="image/*" onchange="this.form.submit()">
                                <label for="profile_picture" 
                                       class="bg-black text-white px-6 py-3 rounded-md shadow hover:bg-gray-800 transition duration-200 cursor-pointer inline-block text-base">
                                    Update Photo
                                </label>
                                
                                @error('profile_picture')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Card -->
        <div class="bg-white rounded-lg shadow p-8 mb-6">
            <h3 class="text-3xl font-bold mb-4">Lost and Found</h3>
            <p class="text-gray-600 text-lg leading-relaxed">
                This application helps students report and find lost items within the school environment.
                Each report will be recorded and can be viewed by other users, making the search process easier.
                With this feature, it is expected that lost items can be quickly found and returned to their owners.
            </p>

            <div class="border-t border-gray-100 mt-8 pt-6 grid grid-cols-2 md:grid-cols-4 gap-6 text-base text-gray-600">
                <div>
                    <div class="font-semibold text-lg">Copyright</div>
                    <div class="mt-2">© 2025 Lost and Found</div>
                </div>
                <div>
                    <div class="font-semibold text-lg">Links</div>
                    <ul class="mt-2 space-y-2">
                        <li class="text-gray-500">Terms & conditions</li>
                        <li class="text-gray-500">About us</li>
                    </ul>
                </div>
                <div>
                    <div class="font-semibold text-lg">Support</div>
                    <ul class="mt-2 space-y-2">
                        <li class="text-gray-500">Privacy policy</li>
                        <li class="text-gray-500">What's new</li>
                    </ul>
                </div>
                <div>
                    <div class="font-semibold text-lg">More</div>
                    <ul class="mt-2 space-y-2">
                        <li class="text-gray-500">Cookies policy</li>
                        <li class="text-gray-500">Support</li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Optional: Show file name when selected
        document.getElementById('profile_picture').addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                console.log('Uploading:', this.files[0].name);
            }
        });
    </script>

</body>
</html>