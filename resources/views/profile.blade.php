<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Profile - Lost and Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
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
<body class="bg-gray-50 font-sans text-xl">

<div class="flex h-screen">

    <aside class="w-80 bg-[#212121] text-white flex flex-col sticky top-0 h-screen shadow-[4px_0_4px_0_rgba(0,0,0,0.25)]">
        <div class="p-4 font-bold text-3xl border-b border-gray-700 text-center">
            Lost and Found
        </div>

        <nav class="flex flex-col mt-6 px-4 space-y-3">
            <a href="{{ route('home') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">Home</a>
            <a href="{{ route('profile') }}" class="bg-white text-black rounded px-3 py-2 font-medium text-center text-xl">My Profile</a>
            <a href="{{ route('reports.mine') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">My Reports</a>
            <a href="{{ route('reports.create') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">+ Report New Item</a>
            

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

    <main class="flex-1 p-8 overflow-y-auto">
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-xl">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-xl">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

            <div class="lg:col-span-1 flex items-center justify-center">
                <div class="w-full h-full">
                    <img src="{{ auth()->user()->image_path ? asset('storage/' . auth()->user()->image_path) : asset('images/default_image.jpg') }}" 
                    alt="Profile photo" 
                    class="w-full h-full max-h-[600px] object-cover rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" />
                </div>
            </div>

            <!-- Personal Information Card -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] p-8 h-full">
                    <h2 class="text-3xl font-bold mb-6 text-center text-black">Personal Information</h2>
                    <div class="border-t border-gray-100 -mx-8 px-8 pt-6">
                        <div class="grid grid-cols-3 gap-6 text-xl text-gray-808080">
                            <div class="font-medium">Name</div>
                            <div class="col-span-2 font-semibold">: {{ auth()->user()->name }}</div>

                            <div class="font-medium">Birth date</div>
                            <div class="col-span-2">: {{ auth()->user()->birth_date ? \Carbon\Carbon::parse(auth()->user()->birth_date)->format('d-m-Y') : 'Not set' }}</div>

                            <div class="font-medium">Contact</div>
                            <div class="col-span-2">: {{ auth()->user()->phone_number ?? 'Not set' }}</div>

                            <div class="font-medium">E-mail</div>
                            <div class="col-span-2">: {{ auth()->user()->email }}</div>

                            <div class="font-medium">Status</div>
                            <div class="col-span-2">: {{ auth()->user()->status ?? 'Not set' }}</div>

                            <div class="font-medium">Department</div>
                            <div class="col-span-2">: {{ auth()->user()->department }}</div>
                        </div>


                        <form action="{{ route('profile.photo') }}" method="POST" enctype="multipart/form-data" class="mt-8">
                            @csrf
                            <div class="text-left">
                                <input type="file" name="profile_picture" id="profile_picture" 
                                       class="hidden" accept="image/*" onchange="this.form.submit()">
                                <label for="profile_picture" 
                                       class="bg-black text-white px-6 py-3 rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] hover:bg-gray-800 transition duration-200 cursor-pointer inline-block text-xl">
                                    Update Photo
                                </label>
                                
                                @error('profile_picture')
                                    <p class="text-red-500 text-lg mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Card -->
        <div class="bg-white rounded-lg shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] p-8 mb-6">
            <h3 class="text-4xl font-bold mb-4 text-black">Lost and Found</h3>
            <p class="text-gray-808080 text-xl leading-relaxed">
                This application helps students report and find lost items within the school environment.
                Each report will be recorded and can be viewed by other users, making the search process easier.
                With this feature, it is expected that lost items can be quickly found and returned to their owners.
            </p>

            <div class="border-t border-gray-100 mt-8 pt-6 grid grid-cols-2 md:grid-cols-4 gap-6 text-xl text-gray-808080">
                <div>
                    <div class="font-semibold text-2xl text-black">Copyright</div>
                    <div class="mt-2">© 2025 Lost and Found</div>
                </div>
                <div>
                    <div class="font-semibold text-2xl text-black">Links</div>
                    <ul class="mt-2 space-y-2">
                        <li>Terms & conditions</li>
                        <li>About us</li>
                    </ul>
                </div>
                <div>
                    <div class="font-semibold text-2xl text-black">Support</div>
                    <ul class="mt-2 space-y-2">
                        <li>Privacy policy</li>
                        <li>What's new</li>
                    </ul>
                </div>
                <div>
                    <div class="font-semibold text-2xl text-black">More</div>
                    <ul class="mt-2 space-y-2">
                        <li>Cookies policy</li>
                        <li>Support</li>
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