<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>User List - Lost & Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-white text-gray-900 font-sans">

<!-- Mobile Menu Button -->
<div class="md:hidden fixed top-4 left-4 z-50">
    <button id="mobileMenuBtn" class="p-2 bg-black text-white rounded-md">
        <i class="fas fa-bars"></i>
    </button>
</div>

<!-- Sidebar -->
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
            <a href="{{ route('admin.dashboard') }}" class="w-full py-2 hover:bg-gray-800 transition">
                Dashboard
            </a>
            <a href="{{ route('admin.users') }}" class="w-full py-2 bg-gray-900 rounded-md text-white font-semibold hover:bg-gray-800 transition">
                User List
            </a>
            <a href="{{ route('reports.all') }}" class="w-full py-2 hover:bg-gray-800 transition">
                Report List
            </a>
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

<!-- Overlay for mobile -->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden"></div>

<!-- Main Content -->
<main class="md:ml-64 p-4 md:p-8 min-h-screen">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl md:text-4xl font-extrabold tracking-tight">USER LIST</h1>
        <p class="text-sm text-gray-500">Review and manage Registered user</p>
    </div>

    <div class="mb-6">
        <input id="globalSearch" type="text" placeholder="Search..."
            class="w-full max-w-2xl rounded-full px-4 py-2 border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-400" />
    </div>

    <section class="bg-white rounded-lg rounded border border-gray-200 shadow p-4 md:p-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-4 gap-4">
            <div>
                <h2 class="text-lg font-semibold">User list</h2>
            </div>
        </div>

        <div class="overflow-auto rounded border border-gray-100">
            <table class="min-w-full text-sm">
                <thead class="bg-white sticky top-0">
                    <tr class="text-left text-gray-600">
                        <th class="py-3 px-4 font-semibold">Name</th>
                        <th class="py-3 px-4 font-semibold">Birth Date</th>
                        <th class="py-3 px-4 font-semibold">Contact</th>
                        <th class="py-3 px-4 font-semibold">E-mail</th>
                        <th class="py-3 px-4 font-semibold">Status</th>
                        <th class="py-3 px-4 font-semibold">Department</th>
                        <th class="py-3 px-4 font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody id="usersTbody" class="text-gray-700">
                    @forelse($users as $user)
                    <tr class="border-t" data-user-id="{{ $user->id }}">
                        <td class="py-3 px-4 break-words">{{ $user->name }}</td>
                        <td class="py-3 px-4">
                            @if($user->birth_date)
                                {{ \Carbon\Carbon::parse($user->birth_date)->format('d/m/y') }}
                            @else
                                —
                            @endif
                        </td>
                        <td class="py-3 px-4">{{ $user->phone_number ?? '—' }}</td>
                        <td class="py-3 px-4 break-words">{{ $user->email }}</td>
                        <td class="py-3 px-4">
                            <span class="inline-block px-2 py-1 rounded text-xs font-medium 
                                {{ $user->status === 'Admin' ? 'bg-purple-100 text-purple-700' : 
                                   ($user->status === 'Guru' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-700') }}">
                                {{ $user->status ?? 'Student' }}
                            </span>
                        </td>
                        <td class="py-3 px-4">{{ $user->department ?? 'SMK IMMA' }}</td>
                        <td class="py-3 px-4">
                            <button class="delete-user-btn text-red-600 hover:text-red-800 transition-colors" 
                                    data-user-id="{{ $user->id }}" 
                                    data-user-name="{{ $user->name }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr class="border-t">
                        <td colspan="7" class="py-4 px-4 text-center text-gray-500">No users found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- User Count -->
        <div class="mt-4 text-sm text-gray-500">
            Total: {{ $users->count() }} users
        </div>
    </section>
</main>

<script>
    // Fungsi untuk memfilter tabel berdasarkan pencarian
    function filterTable(q) {
        q = q.toLowerCase().trim();
        const tbody = document.getElementById('usersTbody');
        
        if (tbody) {
            Array.from(tbody.querySelectorAll('tr')).forEach(row => {
                row.style.display = row.innerText.toLowerCase().includes(q) ? '' : 'none';
            });
        }
    }

    // Fungsi untuk toggle sidebar di mobile
    function setupMobileMenu() {
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const closeSidebar = document.getElementById('closeSidebar');
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.getElementById('overlay');
        
        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', function() {
                sidebar.classList.add('active');
                overlay.classList.remove('hidden');
            });
        }
        
        if (closeSidebar) {
            closeSidebar.addEventListener('click', function() {
                sidebar.classList.remove('active');
                overlay.classList.add('hidden');
            });
        }
        
        if (overlay) {
            overlay.addEventListener('click', function() {
                sidebar.classList.remove('active');
                overlay.classList.add('hidden');
            });
        }
    }

    // Delete user functionality
    // Delete user functionality
    // Delete user functionality
    function setupDeleteButtons() {
        const deleteButtons = document.querySelectorAll('.delete-user-btn');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-user-id');
                const userName = this.getAttribute('data-user-name');
                
                if (confirm(`Are you sure you want to delete user "${userName}"?`)) {
                    // Create form for deletion
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/admin/users/${userId}`; // Langsung gunakan path
                    
                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = '{{ csrf_token() }}';
                    
                    const methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = 'DELETE';
                    
                    form.appendChild(csrfToken);
                    form.appendChild(methodField);
                    document.body.appendChild(form);
                    
                    // Submit the form
                    form.submit();
                }
            });
        });
    }

    // Inisialisasi saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        setupMobileMenu();
        setupDeleteButtons();
        
        const globalSearch = document.getElementById('globalSearch');
        if (globalSearch) {
            globalSearch.addEventListener('input', function() { 
                filterTable(this.value); 
            });
        }
    });
</script>
</body>
</html>