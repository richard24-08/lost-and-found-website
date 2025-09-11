<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    // Tampilkan semua barang dari database
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

    // Simpan barang baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'location'  => 'required',
            'time'      => 'required',
            'category'  => 'required',
            'brand'     => 'nullable',
            'size'      => 'nullable',
            'color'     => 'nullable',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan!');
    }

    // Tampilkan detail barang
    public function show($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            abort(404, 'Barang tidak ditemukan');
        }

        return view('barang.show', compact('barang'));
    }
}