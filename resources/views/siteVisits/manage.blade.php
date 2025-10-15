<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            🗓️ Manage Site Visits
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-blue-700 via-blue-800 to-blue-900 min-h-screen text-white">
        <div class="max-w-6xl mx-auto bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-xl">
            <h3 class="text-2xl font-bold mb-6 text-center">Pending Site Visit Requests</h3>

            @if($visits->isEmpty())
                <p class="text-center text-gray-300">No pending site visits found.</p>
            @else
                <table class="min-w-full border border-blue-400 rounded-lg overflow-hidden">
                    <thead class="bg-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left">Customer</th>
                            <th class="px-6 py-3 text-center">Date</th>
                            <th class="px-6 py-3 text-center">Time</th>
                            <th class="px-6 py-3 text-center">Address</th>
                            <th class="px-6 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-400">
                        @foreach($visits as $visit)
                            <tr class="hover:bg-blue-700/30 transition">
                                <td class="px-6 py-3">{{ $visit->user->name }}</td>
                                <td class="px-6 py-3 text-center">{{ $visit->preferred_date }}</td>
                                <td class="px-6 py-3 text-center">{{ $visit->preferred_time }}</td>
                                <td class="px-6 py-3 text-center">{{ $visit->address }}</td>
                                <td class="px-6 py-3 text-center">
                                    <form action="{{ route('siteVisits.update', $visit->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="confirmed">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 px-3 py-1 rounded text-white font-semibold">Confirm</button>
                                    </form>

                                    <form action="{{ route('siteVisits.update', $visit->id) }}" method="POST" class="inline-block ml-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="rescheduled">
                                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded text-white font-semibold">Reschedule</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-app-layout>
