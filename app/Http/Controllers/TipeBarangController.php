<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipeBarangController extends Controller

{
     // Menampilkan form tambah tipe barang
    public function create()
    {
        $tipebarang = TipeBarang::all(); 
    return view('tipebarang.index', compact('tipebarang'));
    }

    // Menyimpan data baru ke databasenya
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'nama_orang' => 'required|string|max:255',
            'warna_barang' => 'required|string|max:255',
        ]);

        // logika kirim data ke database
        //......

        return redirect()->back()->with('success', 'Tipe barang berhasil ditambahkan!');
    }
}