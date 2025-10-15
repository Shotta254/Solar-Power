<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart Item Details') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-4">{{ $item->name }}</h3>
                <p><strong>Quantity:</strong> {{ $item->pivot->quantity }}</p>
                <p><strong>Price:</strong> ${{ $item->price }}</p>

                <a href="{{ route('shoppingCart.index') }}" class="mt-4 inline-block bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
                    Back to Cart
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
