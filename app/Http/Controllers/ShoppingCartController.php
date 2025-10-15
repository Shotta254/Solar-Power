<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ShoppingCartController extends Controller
{
    /**
     * Display all items in the user's shopping cart.
     */
    public function index(): View
    {
        $user = Auth::user();

        // Ensure the user has a shopping cart
        $cart = $user->shoppingCart ?? ShoppingCart::create(['user_id' => $user->id]);

        // Get all items in the cart with quantity
        $items = $cart->items()->withPivot('quantity')->get();

        return view('shoppingCart.index', compact('items'));
    }

    /**
     * Add an item to the shopping cart.
     */
    public function addItemToCart(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $item = Item::findOrFail($id);
        $user = Auth::user();
        $cart = $user->shoppingCart ?? ShoppingCart::create(['user_id' => $user->id]);

        // Check if item already exists in cart
        $existingItem = $cart->items()->where('item_id', $item->id)->first();

        if ($existingItem) {
            // Update existing quantity
            $cart->items()->updateExistingPivot($item->id, [
                'quantity' => $existingItem->pivot->quantity + $request->quantity
            ]);
        } else {
            // Add new item
            $cart->items()->attach($item->id, ['quantity' => $request->quantity]);
        }

        return redirect()->route('shoppingCart.index')->with('success', 'Item added to your cart!');
    }

    /**
     * Remove an item from the cart.
     */
    public function removeItem(Request $request, $id): RedirectResponse
    {
    $user = Auth::user();
    $cart = $user->shoppingCart;

    if (!$cart) {
        return redirect()->route('shoppingCart.index')->with('error', 'No cart found.');
    }

    if (!$cart->items()->where('item_id', $id)->exists()) {
        return redirect()->route('shoppingCart.index')->with('error', 'Item not found in cart.');
    }

    $cart->items()->detach($id);

    return redirect()->route('shoppingCart.index')->with('success', 'Item removed from your cart.');
}

    public function updateItemQuantity(Request $request, $itemId)
{
    $request->validate(['quantity' => 'required|integer|min:1']);
    $cart = Auth::user()->shoppingCart;
    $cart->items()->updateExistingPivot($itemId, ['quantity' => $request->quantity]);

    return redirect()->route('shoppingCart.index')->with('success', 'Quantity updated!');
}

    /**
     * Display the specified shopping cart.
     */
    public function show($id): View
    {
        $cart = ShoppingCart::findOrFail($id);

        // Ensure the cart belongs to the authenticated user
        if ($cart->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        // Get all items in the cart with quantity
        $items = $cart->items()->withPivot('quantity')->get();

        return view('shoppingCart.show', compact('cart', 'items'));
    }

 public function checkout(): View
{
    $user = Auth::user();
    $cart = $user->shoppingCart;
    $items = $cart ? $cart->items()->withPivot('quantity')->get() : collect();

    if ($items->isEmpty()) {
        return redirect()->route('shoppingCart.index')->with('error', 'Your cart is empty.');
    }

    $total = $items->sum(fn($item) => $item->price * $item->pivot->quantity);

    return view('shoppingCart.checkout', compact('items', 'total'));
}

public function manage(): View
{
    // Only allow sales clerks to view
    if (Auth::user()->role !== 'SalesClerk') {
        abort(403, 'Unauthorized');
    }

    // Get all pending visits ordered by date
    $visits = SiteVisit::where('status', 'pending')
        ->orderBy('preferred_date', 'asc')
        ->get();

    return view('siteVisits.manage', compact('visits'));
}

}
