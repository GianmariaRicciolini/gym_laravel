<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Course Details') }}
        </h2>
    </x-slot>

    <div class="container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">{{ $course->name }}</h1>
                    <p class="mb-4">{{ $course->description }}</p>
                    <p><strong>Date:</strong> {{ $course->date }}</p>
                    <p><strong>Starts at:</strong> {{ \Carbon\Carbon::parse($course->start_time)->format('H:i') }}</p>
                    <p><strong>Ends at:</strong> {{ \Carbon\Carbon::parse($course->end_time)->format('H:i') }}</p>
                    <p><strong>Participants:</strong> {{ $course->users->count() }} / {{ $course->max_participants }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
