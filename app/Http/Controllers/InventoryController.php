<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    // Show the form
    public function create()
    {
        return view('create');
    }

    // Store new inventory item
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity'  => 'required|integer|min:0',
            'location'  => 'required|string|max:255',
            'price'     => 'required|numeric|min:0',
            'total_price' => 'required|numeric|min:0',
        ]);

        // Create and save the inventory item
        $inventory = new Inventory();
        $inventory->item_name = $request->item_name;
        $inventory->quantity  = $request->quantity;
        $inventory->location  = $request->location;
        $inventory->price     = $request->price;
        $inventory->total_price = $request->total_price;
        $inventory->save();

        return redirect()->route('home')->with('success', 'Item added successfully!');
    }

    public function editData($id){
        $inventory = Inventory::findOrFail($id);
        return view('edit', ['inventory' => $inventory]);
    }


    public function updateData(Request $request, $id)
    {
        
        // Validate input
        $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity'  => 'required|integer|min:0',
            'location'  => 'required|string|max:255',
            'price'     => 'required|numeric|min:0',
            'total_price' => 'required|numeric|min:0',
        ]);
        
        // Create and save the inventory item
        $inventory = Inventory::findOrFail($id);
        $inventory->item_name = $request->item_name;
        $inventory->quantity  = $request->quantity;
        $inventory->location  = $request->location;
        $inventory->price     = $request->price;
        $inventory->total_price = $request->total_price;
        $inventory->save();

        return redirect()->route('home')->with('success', 'Item updated successfully!');
    }
}
