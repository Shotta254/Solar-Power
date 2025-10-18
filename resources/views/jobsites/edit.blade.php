<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Jobsite') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('jobsites.update', $jobsite) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Customer Name -->
                    <div class="mb-4">
                        <label for="customer_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Customer Name</label>
                        <input type="text" name="customer_name" id="customer_name"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm"
                               value="{{ old('customer_name', $jobsite->customer_name) }}" required>
                    </div>

                    <!-- Number of Stories -->
                    <div class="mb-4">
                        <label for="stories" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Number of Stories</label>
                        <input type="number" name="stories" id="stories"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm"
                               value="{{ old('stories', $jobsite->stories) }}" min="1" max="9999">
                    </div>

                    <!-- Roof Size -->
                    <div class="mb-4">
                        <label for="roof_size" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Roof Size (sqft)</label>
                        <input type="number" step="0.01" name="roof_size" id="roof_size"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm"
                               value="{{ old('roof_size', $jobsite->roof_size) }}" min="10" max="999999">
                    </div>

                    <!-- Roof Type -->
                    <div class="mb-4">
                        <label for="roof_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Roof Type</label>
                        <select name="roof_type" id="roof_type"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm">
                            <option value="">Select roof type</option>
                            @foreach (['Flat', 'Gable', 'Hip', 'Mansard', 'Gambrel', 'Shed'] as $type)
                                <option value="{{ $type }}" {{ old('roof_type', $jobsite->roof_type) == $type ? 'selected' : '' }}>
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Roof Construction Material -->
                    <div class="mb-4">
                        <label for="roof_material" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Roof Construction Material</label>
                        <select name="roof_material" id="roof_material"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm">
                            <option value="">Select material</option>
                            @foreach (['Asphalt Shingles', 'Metal', 'Tile', 'Slate', 'Concrete', 'Wood', 'Other'] as $material)
                                <option value="{{ $material }}" {{ old('roof_material', $jobsite->roof_material) == $material ? 'selected' : '' }}>
                                    {{ $material }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Roof Condition -->
                    <div class="mb-4">
                        <label for="roof_condition" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Roof Condition</label>
                        <select name="roof_condition" id="roof_condition"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm">
                            <option value="">Select condition</option>
                            @foreach (['Excellent', 'Good', 'Fair', 'Poor'] as $condition)
                                <option value="{{ $condition }}" {{ old('roof_condition', $jobsite->roof_condition) == $condition ? 'selected' : '' }}>
                                    {{ $condition }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end">
                        <a href="{{ route('jobsites.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded mr-2 hover:bg-gray-700">Cancel</a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Jobsite</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
<script>
  document.getElementById('customer_name').addEventListener('input', function() {
    const maxLength = 25;  // Set the maximum length to 20 characters
    if (this.value.length > maxLength) {
      this.value = this.value.slice(0, maxLength);  // Limit the input length
    }
  });
</script>