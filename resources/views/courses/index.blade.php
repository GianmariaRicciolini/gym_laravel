<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Courses</h1>
                    @if(request('date'))
                        <h2>Courses for {{ request('date') }}</h2>
                    @endif
                    <ul>
                        @foreach($courses as $course)
                            <li>
                                <a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a>
                                - {{ $course->description }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
