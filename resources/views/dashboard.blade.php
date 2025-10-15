<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-gradient-to-r from-blue-700 via-blue-500 to-blue-300 text-white p-6 rounded-xl shadow-md">
            <div>
                <h2 class="font-bold text-2xl leading-tight">
                    PV Installation Decision Support System (piDSS)
                </h2>
                <p class="text-sm text-blue-100 mt-1">
                    Making your solar panel system decision easier ☀️
                </p>
            </div>

            <!-- Shopping Cart Button -->
            <a href="{{ route('shoppingCart.index') }}"
               class="bg-yellow-400 hover:bg-yellow-300 text-blue-900 px-5 py-2 rounded-lg font-semibold transition transform hover:scale-105 shadow-lg">
               🛒 View Cart
            </a>

             <!-- 💡 New Site Visit Card -->
    <a href="{{ route('siteVisits.create') }}" class="bg-green-500 hover:bg-green-600 text-white p-6 rounded-xl shadow-lg transition transform hover:scale-105">
        <h2 class="text-2xl font-bold mb-2">📅 Request Site Visit</h2>
        <p class="text-sm">Schedule a time for your solar assessment.</p>
    </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl p-10 text-center">
                <h3 class="text-3xl font-extrabold text-blue-800 mb-4">
                    Welcome, {{ Auth::user()->name }}! 👋
                </h3>

                <p class="text-gray-600 text-lg mb-10">
                    You're logged in as 
                    <span class="font-semibold text-blue-700 capitalize">{{ Auth::user()->role ?? 'user' }}</span>. 
                    Explore and manage your solar panel Inventory and shopping cart below.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <!-- View Items Button -->
                    <a href="{{ url('/item') }}"
                       class="block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-6 px-8 rounded-xl shadow-md transform hover:scale-105 transition-all duration-300">
                        ⚙️ View Available Solar Inventory
                    </a>

                    <!-- View customer Button -->
                    <a href="{{ url('/customers') }}"
                       class="block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-6 px-8 rounded-xl shadow-md transform hover:scale-105 transition-all duration-300">
                        📖 View Customer Billing Information
                    </a>

                    <!-- View Cart Button -->
                    <a href="{{ route('shoppingCart.index') }}"
                       class="block bg-yellow-400 hover:bg-yellow-300 text-blue-900 font-semibold py-6 px-8 rounded-xl shadow-md transform hover:scale-105 transition-all duration-300">
                        🛒 Go to Shopping Cart
                    </a>
                </div>

                <div class="mt-12">
                    <p class="text-gray-500 text-sm">
                        <!-- © {{ date('Y') }} piDSS — All Rights Reserved. -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
