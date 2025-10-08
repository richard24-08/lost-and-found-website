<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
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
        ul {
            list-style: none;
            padding: 0;
            max-width: 500px;
            margin: 0 auto 20px auto;
        }
        li {
            background: #fff;
            margin: 6px 0;
            padding: 10px;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        a {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            margin: 10px auto;
            text-align: center;
        }
        a:hover {
            background: #0056b3;
        }
        .add-btn {
            display: block;
            width: fit-content;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1>Daftar Barang Hilang & Ditemukan</h1>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    {{-- List barang --}}
    <ul>
        @forelse($tipebarang as $tipebarang)
            <li>
                <strong>{{ $barang['nama'] }}</strong><br>
                Lokasi: {{ $barang['lokasi'] }}
            </li>
        @empty
            <li>Belum ada barang yang terdaftar.</li>
        @endforelse
    </ul>

    {{-- Tombol tambah barang ditemukan atau hilang --}}
    <a href="{{ route('barang.create') }}" class="add-btn">+ Tambah Barang</a>
</body>
</html>