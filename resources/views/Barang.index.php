<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang</title>
</head>
<body>
    <h1>Daftar Barang Hilang & Ditemukan</h1>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($barangs as $barang)
            <li>{{ $barang['nama'] }} ditemukan di {{ $barang['lokasi'] }}</li>
        @endforeach
    </ul>

    <a href="{{ route('barang.create') }}">Tambah Barang</a>
</body>
</html>
