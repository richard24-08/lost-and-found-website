<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Lost and Found</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-black rounded-2xl p-16 flex space-x-12 w-[1350px] h-[750px] max-w-full justify-center items-center">

            <div class="bg-white rounded-lg p-10 shadow w-[350px] h-[350px] flex items-center justify-center">
            <img src="{{ asset('images/logo.png') }}"
            alt="Logo" 
            class="w-[350px] h-[350px] object-contain">
</div>

        <div class="bg-white rounded-lg p-10 shadow w-[400px] flex flex-col justify-center">
            <h1 class="text-2xl font-bold mb-8 text-center">Welcome!</h1>
            <form action="#" method="POST" class="space-y-5">

                <input type="email" name="email" placeholder="Email" required 
                    class="w-full rounded-md border border-gray-300 py-3 px-4 
                        focus:outline-none focus:ring-2 focus:ring-black shadow-sm" />

                <input type="password" name="password" placeholder="Password" required 
                    class="w-full rounded-md border border-gray-300 py-3 px-4 
                        focus:outline-none focus:ring-2 focus:ring-black shadow-sm" />

                <button type="submit" 
                    class="w-full bg-black text-white py-3 rounded-md text-lg font-medium hover:bg-gray-800 transition duration-300">
                    Login
                </button>
            </form>
        </div>

    </div>

</body>
</html>
