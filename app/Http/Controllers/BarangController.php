<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Tampilkan semua barang
    public function index()
    {
        $barangs = [
            ['nama' => 'Dompet', 'lokasi' => 'Kantin'],
            ['nama' => 'HP', 'lokasi' => 'Lapangan'],
        ];

        return view('barang.index', compact('barang'));
    }

    // Form tambah barang
    public function create()
    {
        return view('barang.create');
    }

    // Simpan barang baru
    public function store(Request $request)
    {
        // validasi sederhana
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'required',
        ]);

        // sementara simpan dummy
        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan!');
    }

    // Tampilkan detail barang
    public function show($id)
    {
        return view('barang.show', ['id' => $id]);
    }
}
