<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New Jobsite') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('jobsites.store') }}" method="POST">
                    @csrf

                    <!-- Customer Name -->
                    <div class="mb-4">
                        <label for="customer_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Customer Name</label>
                        <input type="text" name="customer_name" id="customer_name"
                               class="form-control mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm"
                               value="{{ old('customer_name') }}" maxlength="20" required>
                    </div>

                    <!-- Number of Stories -->
                    <div class="mb-4">
                        <label for="stories" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Number of Stories</label>
                        <input type="number" name="stories" id="stories"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm"
                               value="{{ old('stories') }}" min="1" max="9999">
                    </div>

                    <!-- Roof Size -->
                    <div class="mb-4">
                        <label for="roof_size" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Roof Size (sqft)</label>
                        <input type="number" step="0.01" name="roof_size" id="roof_size"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm"
                               value="{{ old('roof_size') }}" min="10" max="999999">
                    </div>

                    <!-- Roof Type -->
                    <div class="mb-4">
                        <label for="roof_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Roof Type</label>
                        <select name="roof_type" id="roof_type"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm">
                            <option value="">Select roof type</option>
                            <option value="Flat" {{ old('roof_type') == 'Flat' ? 'selected' : '' }}>Flat</option>
                            <option value="Gable" {{ old('roof_type') == 'Gable' ? 'selected' : '' }}>Gable</option>
                            <option value="Hip" {{ old('roof_type') == 'Hip' ? 'selected' : '' }}>Hip</option>
                            <option value="Mansard" {{ old('roof_type') == 'Mansard' ? 'selected' : '' }}>Mansard</option>
                            <option value="Gambrel" {{ old('roof_type') == 'Gambrel' ? 'selected' : '' }}>Gambrel</option>
                            <option value="Shed" {{ old('roof_type') == 'Shed' ? 'selected' : '' }}>Shed</option>
                        </select>
                    </div>

                    <!-- Roof Construction Material -->
                    <div class="mb-4">
                        <label for="roof_material" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Roof Construction Material</label>
                        <select name="roof_material" id="roof_material"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm">
                            <option value="">Select material</option>
                            <option value="Asphalt Shingles" {{ old('roof_material') == 'Asphalt Shingles' ? 'selected' : '' }}>Asphalt Shingles</option>
                            <option value="Metal" {{ old('roof_material') == 'Metal' ? 'selected' : '' }}>Metal</option>
                            <option value="Tile" {{ old('roof_material') == 'Tile' ? 'selected' : '' }}>Tile</option>
                            <option value="Slate" {{ old('roof_material') == 'Slate' ? 'selected' : '' }}>Slate</option>
                            <option value="Concrete" {{ old('roof_material') == 'Concrete' ? 'selected' : '' }}>Concrete</option>
                            <option value="Wood" {{ old('roof_material') == 'Wood' ? 'selected' : '' }}>Wood</option>
                            <option value="Other" {{ old('roof_material') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <!-- Roof Condition -->
                    <div class="mb-4">
                        <label for="roof_condition" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Roof Condition</label>
                        <select name="roof_condition" id="roof_condition"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 shadow-sm">
                            <option value="">Select condition</option>
                            <option value="Excellent" {{ old('roof_condition') == 'Excellent' ? 'selected' : '' }}>Excellent</option>
                            <option value="Good" {{ old('roof_condition') == 'Good' ? 'selected' : '' }}>Good</option>
                            <option value="Fair" {{ old('roof_condition') == 'Fair' ? 'selected' : '' }}>Fair</option>
                            <option value="Poor" {{ old('roof_condition') == 'Poor' ? 'selected' : '' }}>Poor</option>
                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end">
                        <a href="{{ route('jobsites.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded mr-2 hover:bg-gray-700">Cancel</a>
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Save Jobsite</button>
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
