<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Barang Hilang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-3xl font-bold mb-6">Daftar Barang Hilang</h1>

    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="py-2 px-4 border-b">Nama Barang</th>
                <th class="py-2 px-4 border-b">Lokasi Barang</th>
                <th class="py-2 px-4 border-b">Warna Barang</th>
                <th class="py-2 px-4 border-b">Status Barang</th>
                <th class="py-2 px-4 border-b">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr class="hover:bg-gray-100">
                <td class="py-2 px-4 border-b">{{ $item->nama_barang }}</td>
                <td class="py-2 px-4 border-b">{{ $item->lokasi_barang }}</td>
                <td class="py-2 px-4 border-b">{{ $item->warna_barang }}</td>
                <td class="py-2 px-4 border-b">{{ $item->status_barang }}</td>
                <td class="py-2 px-4 border-b">{{ $item->deskripsi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
