<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shopping Cart Result') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <p>{{ session('success') ?? 'Action completed successfully!' }}</p>
                <a href="{{ route('shoppingCart.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-4 inline-block">
                    Back to Cart
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
