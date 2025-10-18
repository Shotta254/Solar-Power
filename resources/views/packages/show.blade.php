@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">{{ $package->name }}</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h2 class="font-semibold">Description</h2>
            <p>{{ $package->description ?? 'No description provided.' }}</p>
        </div>

        <div>
            <h2 class="font-semibold">Price</h2>
            <p>${{ number_format($package->price, 2) }}</p>
        </div>

        <div>
            <h2 class="font-semibold">Components</h2>
            <ul class="list-disc ml-5">
                <li>Solar Panel: {{ $package->solarPanel->name ?? '-' }}</li>
                <li>Inverter: {{ $package->inverter->name ?? '-' }}</li>
                <li>PV Production Meter: {{ $package->pvProductionMeter->name ?? '-' }}</li>
                <li>Main Panel: {{ $package->mainPanel->name ?? '-' }}</li>
                <li>Electricity Meter: {{ $package->electricityMeter->name ?? '-' }}</li>
            </ul>
        </div>
    </div>

    <a href="{{ route('packages.index') }}" class="mt-6 inline-block px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800">
        Back to Packages
    </a>
</div>
@endsection
