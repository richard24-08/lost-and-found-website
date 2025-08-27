<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .success {
            color: green;
            text-align: center;
            margin-bottom: 15px;
        }
        .profile-info {
            max-width: 400px;
            margin: 0 auto 20px auto;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            margin-top: 15px;
            background: #007bff;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Profil Pengguna</h1>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    {{-- Info user --}}
    <div class="profile-info">
        <p><strong>Nama:</strong> {{ $user['nama'] }}</p>
        <p><strong>Email:</strong> {{ $user['email'] }}</p>
    </div>

    {{-- Form update --}}
    <form action="{{ route('user.update') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama" value="{{ $user['nama'] }}" required>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $user['email'] }}" required>

        <button type="submit">Update Profil</button>
    </form>
</body>
</html>
