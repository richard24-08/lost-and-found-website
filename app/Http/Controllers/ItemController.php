<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // make sure app/Models/Item.php exists

class ItemController extends Controller
{
    // Display all items
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    // Show form to create a new item report
    public function create()
    {
        return view('items.create');
    }

    // Store a new item report in the database
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

        Item::create([
            'item_name' => $request->item_name,
            'location'  => $request->location,
            'time'      => $request->time,
            'category'  => $request->category,
            'brand'     => $request->brand,
            'size'      => $request->size,
            'color'     => $request->color,
        ]);

        return redirect()->route('items.index')
            ->with('success', 'Item has been added successfully!');
    }

    // Display a specific item detail
    public function show($id)
    {
        $item = Item::find($id);

        if (!$item) {
            abort(404, 'Item not found');
        }

        return view('items.show', compact('item'));
    }

    // Optionally: remove this if you don't have user-specific reports
    public function myReports()
    {
        // No user_id in the database, so return all items or skip this method
        $items = Item::all();
        return view('items.mine', compact('items'));
    }
}