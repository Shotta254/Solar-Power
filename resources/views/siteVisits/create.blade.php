<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-700 via-blue-800 to-blue-900 flex justify-center items-center p-6">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md p-8">
            <h2 class="text-2xl font-bold text-blue-800 mb-6 text-center">📅 Request Initial Site Visit</h2>

            <form method="POST" action="{{ route('siteVisits.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label for="preferred_date" class="block text-gray-700 font-semibold mb-1">Preferred Date</label>
                    <input type="date" name="preferred_date" id="preferred_date"
                           class="w-full border border-gray-300 rounded-lg p-2 bg-white text-black"
                           required min="{{ date('Y-m-d') }}">
                </div>

                <div>
                    <label for="preferred_time" class="block text-gray-700 font-semibold mb-1">Preferred Time</label>
                    <input type="time" name="preferred_time" id="preferred_time"
                           class="w-full border border-gray-300 rounded-lg p-2 bg-white text-black" required>
                </div>

                <div>
                    <label for="address" class="block text-gray-700 font-semibold mb-1">Address (Optional)</label>
                    <input type="text" name="address" id="address"
                           class="w-full border border-gray-300 rounded-lg p-2 bg-white text-black">
                </div>

                <div>
                    <label for="notes" class="block text-gray-700 font-semibold mb-1">Additional Notes</label>
                    <textarea name="notes" id="notes" rows="3"
                              class="w-full border border-gray-300 rounded-lg p-2 bg-white text-black"></textarea>
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('dashboard') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-md">
                        Cancel
                    </a>
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-md shadow">
                        Submit Request
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
