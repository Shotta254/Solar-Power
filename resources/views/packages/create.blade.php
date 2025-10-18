<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create On-Grid Package') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">

                <form method="POST" action="{{ route('packages.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Package Name</label>
                        <input type="text" name="name" class="w-full border-gray-300 rounded mt-1" id="name" required>
                    </div>

                    @foreach([
                        'solar_panel_id' => 'Solar Panel',
                        'inverter_id' => 'Inverter',
                        'pv_production_meter_id' => 'PV Production Meter',
                        'main_panel_id' => 'Main Panel',
                        'electricity_meter_id' => 'Electricity Meter'
                    ] as $field => $label)
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-200">{{ $label }}</label>
                            <select name="{{ $field }}" class="w-full border-gray-300 rounded mt-1" required>
                                <option value="">-- Select {{ $label }} --</option>
                                @php
                                    $items = ${Str::camel(Str::plural(explode('_id', $field)[0]))};
                                @endphp
                                @foreach($items as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->brand }} {{ $item->model }} ({{ $item->quantity }} in stock)
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Description</label>
                        <textarea name="description" class="w-full border-gray-300 rounded mt-1"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Price</label>
                        <input type="number" step="0.01" name="price" max="9999999.99" class="w-full border-gray-300 rounded mt-1" required>
                    </div>

                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Save Package
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
<script>
  document.getElementById('name').addEventListener('input', function() {
    const maxLength = 25;  // Set the maximum length to 20 characters
    if (this.value.length > maxLength) {
      this.value = this.value.slice(0, maxLength);  // Limit the input length
    }
  });
</script>