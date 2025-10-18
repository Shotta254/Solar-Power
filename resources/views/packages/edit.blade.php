<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit On-Grid Package') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">

                <form method="POST" action="{{ route('packages.update', $package->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Package Name</label>
                        <input type="text" name="name" value="{{ old('name', $package->name) }}"
                               class="w-full border-gray-300 rounded mt-1" id="name" required>
                    </div>

                    @foreach([
                        'solar_panel_id' => ['label' => 'Solar Panel', 'items' => $solarPanels],
                        'inverter_id' => ['label' => 'Inverter', 'items' => $inverters],
                        'pv_production_meter_id' => ['label' => 'PV Production Meter', 'items' => $pvProductionMeters],
                        'main_panel_id' => ['label' => 'Main Panel', 'items' => $mainPanels],
                        'electricity_meter_id' => ['label' => 'Electricity Meter', 'items' => $electricityMeters],
                    ] as $field => $data)
                        <div class="mb-4">
                            <label class="block text-gray-700 dark:text-gray-200">{{ $data['label'] }}</label>
                            <select name="{{ $field }}" class="w-full border-gray-300 rounded mt-1" required>
                                <option value="">-- Select {{ $data['label'] }} --</option>
                                @foreach($data['items'] as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $package->$field == $item->id ? 'selected' : '' }}>
                                        {{ $item->brand }} {{ $item->model }} ({{ $item->quantity }} in stock)
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endforeach

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Description</label>
                        <textarea name="description" class="w-full border-gray-300 rounded mt-1">{{ old('description', $package->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Price</label>
                        <input type="number" step="0.01" name="price" max="9999999.99" value="{{ old('price', $package->price) }}"
                               class="w-full border-gray-300 rounded mt-1" required>
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('packages.manage') }}"
                           class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                            Cancel
                        </a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Update Package
                        </button>
                    </div>
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
