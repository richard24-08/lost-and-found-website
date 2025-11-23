<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Lost and Found</title>
    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">


    <div class="bg-black my-16 mx-6 rounded-2xl p-20 flex space-x-16 w-[1600px] h-[900px] max-w-full justify-center items-center">


        <div class="bg-white rounded-lg p-12 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] w-[500px] h-[500px] flex items-center justify-center">
            <img src="{{ asset('images/logo.png') }}"
            alt="Logo" 
            class="w-[450px] h-[450px] object-contain">
        </div>


        <div class="bg-white rounded-lg p-12 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)] w-[500px] h-[500px] flex flex-col justify-center">
            <h1 class="text-4xl font-bold mb-12 text-center">Welcome!</h1>
            <form action="{{ route('doLogin') }}" method="POST" class="space-y-8">
                @csrf
                <!-- Email -->
                <input type="email" name="email" placeholder="Email" required 
                    class="w-full rounded-lg border border-gray-300 py-5 px-6 text-2xl
                        focus:outline-none focus:ring-2 focus:ring-black shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" />

                <!-- Password -->
                <input type="password" name="password" placeholder="Password" required 
                    class="w-full rounded-lg border border-gray-300 py-5 px-6 text-2xl
                        focus:outline-none focus:ring-2 focus:ring-black shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]" />

                <!-- Submit Button -->
                <button type="submit" 
                    class="w-full bg-black text-white py-5 rounded-lg text-3xl font-medium hover:bg-gray-800 transition duration-300 shadow-[0_4px_4px_0_rgba(0,0,0,0.25)]">
                    Login
                </button>
            </form>
        </div>

    </div>

</body>
</html>