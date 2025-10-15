<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                🛒 {{ __('Your Shopping Cart') }}
            </h2>
            <a href="{{ url('/item') }}"
               class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-4 py-2 rounded-md shadow-md transition">
                ← Back to Inventory
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-700 via-blue-800 to-blue-900 min-h-screen text-white">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/10 backdrop-blur-md shadow-xl rounded-2xl p-6">
                @if(session('success'))
                    <div class="mb-4 bg-green-500 text-white p-3 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                @if($items->isEmpty())
                    <p class="text-center text-gray-200 text-lg font-medium py-10">
                        🛍️ Your cart is empty. Browse items in inventory to add products.
                    </p>
                @else
                    <form method="POST" action="{{ route('shoppingCart.index') }}">
                        @csrf
                        @method('PUT')

                        <table class="min-w-full border border-blue-300 rounded-lg overflow-hidden">
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">Item</th>
                                    <th class="px-6 py-3 text-center text-sm font-semibold">Price</th>
                                    <th class="px-6 py-3 text-center text-sm font-semibold">Quantity</th>
                                    <th class="px-6 py-3 text-center text-sm font-semibold">Subtotal</th>
                                    <th class="px-6 py-3 text-center text-sm font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-blue-400">
                                @php $total = 0; @endphp
                                @foreach ($items as $item)
                                    @php 
                                        $subtotal = $item->price * $item->pivot->quantity;
                                        $total += $subtotal;
                                    @endphp
                                    <tr class="hover:bg-blue-700/30 transition">
                                        <td class="px-6 py-4 text-sm font-medium">{{ $item->name }}</td>
                                        <td class="px-6 py-4 text-center">${{ number_format($item->price, 2) }}</td>
                                        <td class="px-6 py-4 text-center">
                                            <input type="number" 
                                                name="quantities[{{ $item->id }}]" 
                                                value="{{ $item->pivot->quantity }}" 
                                                min="1" 
                                                class="w-16 text-center text-black bg-white border border-gray-300 rounded-md"
                                                oninput="updateSubtotal(this, {{ $item->price }}, '{{ $item->id }}')">
                                        </td>
                                        <td class="px-6 py-4 text-center text-yellow-400 font-semibold" id="subtotal_{{ $item->id }}">
                                            ${{ number_format($subtotal, 2) }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <form method="POST" 
                                            action="{{ route('shoppingCart.remove', $item->id) }}" 
                                            onsubmit="return confirmDelete(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md transition">
                                                Remove
                                            </button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="flex justify-between items-center mt-6 border-t border-blue-300 pt-4">
                        <h3 class="text-xl font-semibold">Total:</h3>
                        <p id="totalAmount" class="text-2xl font-bold text-yellow-400">${{ number_format($total, 2) }}</p>
                    </div>

                    <div class="flex justify-end mt-6">
                        <a href="{{ route('shoppingCart.checkout') }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-6 py-3 rounded-lg shadow-md transition">
                            Proceed to Checkout →
                        </a>
                    </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <!-- JS: Update subtotal and total dynamically -->
    <script>
        function updateSubtotal(input, price, id) {
            const quantity = parseInt(input.value) || 1;
            const subtotal = (price * quantity).toFixed(2);
            document.getElementById(`subtotal_${id}`).innerText = `$${subtotal}`;
            updateTotal();
        }

        function updateTotal() {
            let total = 0;
            document.querySelectorAll('[id^="subtotal_"]').forEach(cell => {
                total += parseFloat(cell.innerText.replace('$', '')) || 0;
            });
            document.getElementById('totalAmount').innerText = `$${total.toFixed(2)}`;
        }

        function confirmDelete(event) {
            if (!confirm('⚠️ Are you sure you want to remove this item from your cart?')) {
                event.preventDefault();
                return false;
            }
            return true;
        }
    </script>
</x-app-layout>
