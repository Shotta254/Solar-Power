<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inventory Clerk Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-6">
                    <p>{{ __("You're logged in as an Inventory Clerk!") }}</p>

                    <!-- Action container -->
                    <div class="mt-8 border-t border-gray-200 dark:border-gray-700 pt-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">
                            {{ __('Actions') }}
                        </h3>

                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('inventory-items.index') }}"
                               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md
                                      font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700
                                      focus:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2
                                      focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('View All Items') }}
                            </a>

                            <!-- <a href="{{ route('inventory-items.create') }}"
                               class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md
                                      font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700
                                      focus:bg-green-700 active:bg-green-800 focus:outline-none focus:ring-2
                                      focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Add New Item') }}
                            </a> -->
                            <a href="{{ route('inventory-items.manage') }}"
                               class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md
                                      font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700
                                      focus:bg-yellow-700 active:bg-yellow-800 focus:outline-none focus:ring-2
                                      focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Manage Items') }}
                            </a>

                            <a href="{{ route('packages.manage') }}"
                               class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md
                                      font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700
                                      focus:bg-yellow-700 active:bg-yellow-800 focus:outline-none focus:ring-2
                                      focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Manage Packages') }}
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
