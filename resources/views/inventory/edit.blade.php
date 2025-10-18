<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Inventory Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4">
                        <ul class="text-red-600 list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('inventory-items.update', $inventoryItem) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Item Type</label>
                        <select name="item_type_id" class="w-full border rounded px-3 py-2">
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ $inventoryItem->item_type_id == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Brand</label>
                        <input type="text" name="brand" id="brand" value="{{ $inventoryItem->brand }}" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Model</label>
                        <input type="text" name="model" id="model" value="{{ $inventoryItem->model }}" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Description</label>
                        <textarea name="description" class="w-full border rounded px-3 py-2">{{ $inventoryItem->description }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Quantity</label>
                        <input type="number" name="quantity" value="{{ $inventoryItem->quantity }}" class="w-full border rounded px-3 py-2" min="0" max="99999" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Price</label>
                        <input type="number" step="0.01" name="price" value="{{ $inventoryItem->price }}" class="w-full border rounded px-3 py-2" min="0" max="99999" required>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Update Item
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
  document.getElementById('brand').addEventListener('input', function() {
    const maxLength = 20;  // Set the maximum length to 20 characters
    if (this.value.length > maxLength) {
      this.value = this.value.slice(0, maxLength);  // Limit the input length
    }
  });
  document.getElementById('model').addEventListener('input', function() {
    const maxLength = 25;  // Set the maximum length to 20 characters
    if (this.value.length > maxLength) {
      this.value = this.value.slice(0, maxLength);  // Limit the input length
    }
  });
</script>