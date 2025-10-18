<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Available On-Grid Packages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if ($packages->isEmpty())
                <div class="text-center text-gray-500 dark:text-gray-300">
                    No packages available at the moment.
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($packages as $package)
                        <!-- <a href="{{ route('packages.show', $package) }}" class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-200"> -->
                        <a href="#" class="bg-white dark:bg-gray-800 shadow-sm rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-200">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $package->name }}</h3>
                                <p class="text-gray-600 dark:text-gray-300 mt-2 truncate">{{ $package->description }}</p>
                                <p class="text-green-600 dark:text-green-400 font-bold mt-3">${{ number_format($package->price, 2) }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
