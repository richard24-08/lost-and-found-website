<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Tampilkan semua barang
    public function index()
    {
        $barangs = [
            ['id' => 1, 'nama' => 'Dompet', 'lokasi' => 'Kantin'],
            ['id' => 2, 'nama' => 'HP', 'lokasi' => 'Lapangan'],
        ];

        return view('barang.index', compact('barangs'));
    }

    // Form tambah barang
    public function create()
    {
        return view('barang.create');
    }

    // Simpan barang baru
    public function store(Request $request)
    {
        // Validasi sederhana
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
        ]);

        // Sementara dummy (belum simpan DB)
        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan!');
    }

    // Tampilkan detail barang
    public function show($id)
    {
        $barang = [
            ['id' => 1, 'nama' => 'Dompet', 'lokasi' => 'Kantin'],
            ['id' => 2, 'nama' => 'HP', 'lokasi' => 'Lapangan'],
        ];

        $barang = collect($barangs)->firstWhere('id', $id);

        if (!$barang) {
            abort(404, 'Barang tidak ditemukan');
        }

        return view('barang.show', compact('barang'));
    }
}