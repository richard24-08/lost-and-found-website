<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang; // pastikan ada model Barang.php

class BarangController extends Controller
{
    // Tampilkan semua barang dari database
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    // Form tambah barang
    public function create()
    {
        return view('barang.index');
    }

    // Simpan barang baru ke database
    public function store(Request $request)
    {


        // Validasi 

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

        return view('barang.index', compact('barang'));
    }
}
