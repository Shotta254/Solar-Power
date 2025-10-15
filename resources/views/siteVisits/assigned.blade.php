<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            🔧 My Assigned Site Visits
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-700 via-blue-800 to-blue-900 min-h-screen text-white">
        <div class="max-w-6xl mx-auto bg-white/10 backdrop-blur-md shadow-xl rounded-2xl p-6">
            <h3 class="text-2xl font-bold mb-6 text-center">Confirmed and Scheduled Visits</h3>

            @if($visits->isEmpty())
                <p class="text-center text-gray-300 text-lg">No assigned visits yet.</p>
            @else
                <table class="min-w-full border border-blue-400 rounded-lg overflow-hidden">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Customer</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold">Date</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold">Time</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold">Address</th>
                            <th class="px-6 py-3 text-center text-sm font-semibold">Notes</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-400">
                        @foreach($visits as $visit)
                            <tr class="hover:bg-blue-700/30 transition">
                                <td class="px-6 py-4">{{ $visit->user->name }}</td>
                                <td class="px-6 py-4 text-center">{{ $visit->preferred_date }}</td>
                                <td class="px-6 py-4 text-center">{{ $visit->preferred_time }}</td>
                                <td class="px-6 py-4 text-center">{{ $visit->address }}</td>
                                <td class="px-6 py-4 text-center">{{ $visit->notes ?? '—' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-app-layout>
