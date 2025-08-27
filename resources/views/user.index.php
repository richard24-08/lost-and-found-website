<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil User</title>
</head>
<body>
    <h1>Profil Pengguna</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <p>Nama: {{ $user['nama'] }}</p>
    <p>Email: {{ $user['email'] }}</p>

    <form action="{{ route('user.update') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama" value="{{ $user['nama'] }}"><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $user['email'] }}"><br>

        <button type="submit">Update Profil</button>
    </form>
</body>
</html>
