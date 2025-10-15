<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\readitem;

class LostItemController extends Controller
{
    public function index()
    {
        // Ambil datanya 
        $items = LostItem::all();

        // kasih data ke website tampilannya
        return view('lostitems.index', compact('items'));
    }
}
