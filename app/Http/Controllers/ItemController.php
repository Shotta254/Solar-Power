<?php
namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\Gate;
use DB;

class ItemController extends Controller
{
 /**
 * Display a listing of the resource.
 */
 public function index(): View
 {
    Gate::authorize('list', Item::class);
    return view('item.index', ['items' => Item::all(),
]);
 }
 /**
 * Show the form for creating a new resource.
 */
 public function create(): View
 {
 Gate::authorize('create', Item::class);
 return view('item.create');
 }
 /**
 * Store a newly created resource in storage.
 */
 public function store(ItemRequest $request): RedirectResponse
 {
Gate::authorize('create', Item::class);
 Item::create([
'name' => $request->name,
'description' => $request->description,
'price' => $request->price,
]);
return redirect(route('item.index'));
 }
 /**
 * Display the specified resource.
 */
 public function show(Item $item): View
 {
Gate::authorize('view', $item);
return view('item.show', ['item' => $item]);
 }
 /**
 * Show the form for editing the specified resource.
 */
 public function edit(Item $item): View
 {
 Gate::authorize('update', $item);
return view('item.edit', ['item' => $item ]);
 }
 /**
 * Update the specified resource in storage.
 */
 public function update(ItemRequest $request, Item $item):
RedirectResponse
 {
Gate::authorize('update', $item);
$item->update([
'name' => $request->name,
'description' => $request->description,
'price' => $request->price,
]);
return redirect(route('item.index'));
 }
 /**
 * Remove the specified resource from storage.
 */
 public function destroy(Item $item): RedirectResponse
 {
Gate::authorize('delete', $item);
$item->delete();
return redirect(route('item.index'));
 }
 /**
 * Show the form for searching for an item.
 */
 public function search(): View
 {
 Gate::authorize('search', Item::class);
 return view('item.search');
 }
 /**
 * Find the search term in the item description.
 */
 public function find(Request $request): View
 {
Gate::authorize('find', Item::class);
 $request->validate([
 'searchterm' => 'required|regex:~^[ a-zA-Z0-9()-:.,]+$~',
]);
// Search for the term in the item description
 $items = DB::table('items')
 ->where('description', 'LIKE', "%{$request->searchterm}%")
 ->get();
 return view('item.result')->with('items', $items);
 }
}
