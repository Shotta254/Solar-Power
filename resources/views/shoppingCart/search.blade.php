<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Cart Items') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('shoppingCart.search') }}" class="mb-6">
                <input type="text" name="query" placeholder="Search for items..." class="border p-2 rounded w-1/2" value="{{ request('query') }}">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Search</button>
            </form>

            @if(isset($items) && $items->isNotEmpty())
                <ul class="space-y-2">
                    @foreach($items as $item)
                        <li class="bg-white p-4 rounded shadow-sm">
                            <strong>{{ $item->name }}</strong> - ${{ $item->price }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No matching items found.</p>
            @endif
        </div>
    </div>
</x-app-layout>
