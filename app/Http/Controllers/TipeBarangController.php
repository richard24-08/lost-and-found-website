<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TipeBarangController extends Controller

{
     // Menampilkan form tambah tipe barang
    public function create()
    {
        $tipebarang = views\tipebarang\index.blade.php::all(); 
    return view('tipebarang.index', compact('tipebarang'));
    }

    // Menyimpan data baru ke databasenya
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'nama_orang' => 'required|string|max:255',
            'nama_orang' => 'required|string|max:255',
        ]);

        return redirect()->back()->with('success', 'Tipe barang berhasil ditambahkan!');
    }
}