<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight text-center">
            💳 Checkout
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-700 via-blue-800 to-blue-900 min-h-screen text-white">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/10 backdrop-blur-md shadow-xl rounded-2xl p-8">
                <h3 class="text-2xl font-bold mb-6 text-center text-yellow-400">
                    🧾 Review Your Order
                </h3>

                <table class="min-w-full border border-blue-300 rounded-lg overflow-hidden mb-6">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Item</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold">Quantity</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold">Price</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-400">
                        @foreach ($items as $item)
                            <tr class="hover:bg-blue-700/30 transition">
                                <td class="px-6 py-4 text-sm font-medium">{{ $item->name }}</td>
                                <td class="px-6 py-4 text-center">{{ $item->pivot->quantity }}</td>
                                <td class="px-6 py-4 text-center">${{ number_format($item->price, 2) }}</td>
                                <td class="px-6 py-4 text-center text-yellow-400 font-semibold">
                                    ${{ number_format($item->price * $item->pivot->quantity, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="flex justify-between items-center border-t border-blue-300 pt-4">
                    <h3 class="text-xl font-semibold">Total:</h3>
                    <p class="text-2xl font-bold text-yellow-400">${{ number_format($total, 2) }}</p>
                </div>

                <div class="flex justify-between mt-8">
                    <a href="{{ route('shoppingCart.index') }}" 
                       class="bg-gray-300 hover:bg-gray-400 text-black font-semibold px-6 py-3 rounded-lg shadow-md transition">
                        ← Back to Cart
                    </a>

                    <a href="{{ route('siteVisits.create') }}"
                       class="bg-green-500 hover:bg-green-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition">
                        📅 Schedule Site Visit
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
