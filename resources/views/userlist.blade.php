<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>User List - Lost & Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
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
<body class="bg-gray-50 text-gray-900 font-sans text-xl">

<div class="flex h-screen">


  <aside class="w-80 bg-[#212121] text-white flex flex-col sticky top-0 h-screen shadow-[4px_0_4px_0_rgba(0,0,0,0.25)]">
    <div class="p-4 font-bold text-3xl border-b border-gray-700 text-center">
        Lost and Found
    </div>

    <nav class="flex flex-col mt-6 px-4 space-y-3">
        <a href="{{ route('admin.dashboard') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">Dashboard</a>
        <a href="{{ route('admin.users') }}" class="bg-white text-black rounded px-3 py-2 font-medium text-center text-xl">User List</a>
        <a href="{{ route('admin.reports.list') }}" class="hover:bg-white hover:text-black rounded px-3 py-2 text-center text-xl">Report List</a>
    </nav>

    <div class="mt-auto p-4 text-lg bg-[#151515] flex items-center justify-between rounded-t-lg">
        <div>
            <div class="font-medium">{{ Auth::user()->name ?? 'User' }}</div>
            <div class="text-sm text-gray-400">{{ Auth::user()->email }}</div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="ml-2 text-white">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </button>
        </form>
    </div>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-8 overflow-y-auto">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-6xl font-bold text-black">USER LIST</h1>
        <p class="text-2xl text-gray-808080">Review and manage Registered user</p>
    </div>


    <div class="mb-6">
        <input id="globalSearch" type="text" placeholder="Search..."
            class="w-full max-w-2xl rounded-lg px-6 py-3 border border-gray-300 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] focus:outline-none focus:ring-2 focus:ring-black text-2xl" />
    </div>

    <section class="bg-white rounded-xl shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] p-6 border border-gray-200">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-4xl font-semibold text-black">User list</h2>
                <p class="text-xl text-gray-808080 mt-2">Review and manage Registered user</p>
            </div>
        </div>

        <div class="overflow-auto">
            <table class="min-w-full text-2xl">
                <thead class="bg-white sticky top-0">
                    <tr class="text-left text-gray-808080 border-b">
                        <th class="py-4 px-6 font-medium">Name</th>
                        <th class="py-4 px-6 font-medium">Birth Date</th>
                        <th class="py-4 px-6 font-medium">Contact</th>
                        <th class="py-4 px-6 font-medium">E-mail</th>
                        <th class="py-4 px-6 font-medium">Status</th>
                        <th class="py-4 px-6 font-medium">Department</th>
                        <th class="py-4 px-6 font-medium">Action</th>
                    </tr>
                </thead>
                <tbody id="usersTbody" class="text-gray-808080">
                    @forelse($users as $user)
                    <tr class="border-t hover:bg-gray-50" data-user-id="{{ $user->id }}">
                        <td class="py-4 px-6 break-words">{{ $user->name }}</td>
                        <td class="py-4 px-6">
                            @if($user->birth_date)
                                {{ \Carbon\Carbon::parse($user->birth_date)->format('d/m/y') }}
                            @else
                                —
                            @endif
                        </td>
                        <td class="py-4 px-6">{{ $user->phone_number ?? '—' }}</td>
                        <td class="py-4 px-6 break-words">{{ $user->email }}</td>
                        <td class="py-4 px-6">
                            <span class="inline-block px-4 py-2 rounded-lg text-xl font-medium 
                                {{ $user->status === 'Admin' ? 'bg-purple-500 text-white' : 
                                   ($user->status === 'Guru' ? 'bg-blue-500 text-white' : 'bg-gray-500 text-white') }}">
                                {{ $user->status ?? 'Student' }}
                            </span>
                        </td>
                        <td class="py-4 px-6">{{ $user->department ?? 'SMK IMMA' }}</td>
                        <td class="py-4 px-6">
                            <button class="delete-user-btn text-red-600 hover:text-red-800 transition-colors text-2xl" 
                                    data-user-id="{{ $user->id }}" 
                                    data-user-name="{{ $user->name }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr class="border-t">
                        <td colspan="7" class="py-5 px-6 text-center text-gray-808080">No users found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- User Count -->
        <div class="mt-6 text-xl text-gray-808080">
            Total: {{ $users->count() }} users
        </div>
    </section>
  </main>
</div>

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