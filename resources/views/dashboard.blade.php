<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 fs-3">
                    {{ __("Welcome, " . Auth::user()->name . "! Check out the available activities and sign up!") }}
                </div>
            </div>
            <div class="mt-8">
                @include('calendar')
            </div>
        </div>
    </div>
</x-app-layout>
