<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Cart Item') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('shoppingCart.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700">Quantity</label>
                        <input type="number" name="quantity" value="{{ $item->pivot->quantity }}" class="border rounded w-full p-2" min="1" required>
                    </div>

                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
