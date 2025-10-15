<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-white to-blue-50 py-12 px-6">
        <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-xl p-8">
            <h1 class="text-3xl font-bold text-blue-800 mb-6 text-center">📋 Your Site Visit Requests</h1>

            @if(session('success'))
                <div class="bg-green-500 text-white p-3 rounded-md mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if($visits->isEmpty())
                <p class="text-center text-gray-600">You have no scheduled site visits yet.</p>
            @else
                <table class="w-full border border-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-4 py-2 text-left">Date</th>
                            <th class="px-4 py-2 text-left">Time</th>
                            <th class="px-4 py-2 text-left">Address</th>
                            <th class="px-4 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($visits as $visit)
                            <tr class="hover:bg-blue-50 transition">
                                <td class="px-4 py-3">{{ $visit->preferred_date }}</td>
                                <td class="px-4 py-3">{{ $visit->preferred_time }}</td>
                                <td class="px-4 py-3">{{ $visit->address ?? '—' }}</td>
                                <td class="px-4 py-3 font-semibold text-yellow-600">{{ $visit->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-app-layout>
