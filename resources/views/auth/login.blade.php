<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-300 min-h-screen flex items-center justify-center">

    <div class="bg-gray-300 rounded-lg p-8 flex space-x-10 shadow-lg w-full max-w-4xl">

        <!-- Bagian gambar -->
        <div class="flex-1 flex items-center justify-center bg-gray-100 rounded-lg shadow-inner">
            <div class="w-64 h-64 border-2 border-gray-500 flex items-center justify-center">
                <span class="text-gray-500">Image Placeholder</span>
            </div>
        </div>

        <!-- Form login -->
        <div class="flex-1 bg-white rounded-lg p-8 shadow-md flex flex-col justify-center max-w-md">
            <h1 class="text-xl font-bold mb-6 text-center">Welcome!</h1>
            <form action="{{ route('doLogin') }}" method="POST" class="space-y-4">
                @csrf   <!-- 🔹 wajib untuk CSRF protection -->

                <input type="email" name="email" placeholder="Email" required 
                    class="w-full rounded-md border border-gray-300 py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm" />

                <input type="password" name="password" placeholder="Password" required 
                    class="w-full rounded-md border border-gray-300 py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm" />

                <button type="submit" 
                    class="w-full bg-black text-white py-2 rounded-md hover:bg-gray-800 transition duration-300">Login</button>
            </form>
        </div>

    </div>

</body>
</html>
