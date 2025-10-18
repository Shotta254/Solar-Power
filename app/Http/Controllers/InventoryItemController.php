<?php
namespace App\Http\Controllers;

use App\Models\InventoryItem;
use App\Models\ItemType;
use Illuminate\Http\Request;

class InventoryItemController extends Controller
{
    //Show all items
    public function index()
    {
        $items = InventoryItem::with('type')->get();
        return view('inventory.index', compact('items'));
    }

    //Show the form for creating a new inventory item
    public function create()
    {
        $types = ItemType::all();
        return view('inventory.create', compact('types'));
    }

    //Store a new inventory item
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_type_id' => 'required|exists:item_types,id',
            'brand' => 'required|string|max:25',
            'model' => 'nullable|string|max:25',
            'description' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        InventoryItem::create($validated);

        return redirect()->route('inventory-items.manage')->with('success', 'Item added successfully.');
    }

    //Show the form for editing an inventory item
    public function edit(InventoryItem $inventoryItem)
    {
        $types = ItemType::all();
        return view('inventory.edit', compact('inventoryItem', 'types'));
    }

    //Update an existing inventory item
    public function update(Request $request, InventoryItem $inventoryItem)
    {
        $validated = $request->validate([
            'item_type_id' => 'required|exists:item_types,id',
            'brand' => 'required|string|max:25',
            'model' => 'nullable|string|max:25',
            'description' => 'nullable|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $inventoryItem->update($validated);

        return redirect()->route('inventory-items.manage')->with('success', 'Item updated successfully.');
    }

    //Delete an inventory item
    public function destroy(InventoryItem $inventoryItem)
    {
        $inventoryItem->delete();

        return redirect()->route('inventory-items.manage')->with('success', 'Item deleted successfully.');
    }

    //Manage all items
    public function manage()
    {
        $items = InventoryItem::with('type')->get();
        return view('inventory.manage', compact('items'));
    }

}
