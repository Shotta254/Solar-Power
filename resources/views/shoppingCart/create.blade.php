<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Item to Shopping Cart') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('shoppingCart.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700">Item ID</label>
                        <input type="number" name="item_id" class="border rounded w-full p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Quantity</label>
                        <input type="number" name="quantity" class="border rounded w-full p-2" min="1" value="1" required>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
