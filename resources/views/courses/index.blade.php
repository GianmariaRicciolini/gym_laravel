<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(request('date'))
                    <h2 class="text-lg font-semibold py-2 pb-4 mb-4 fs-2">Courses for <strong class="fs-1">{{ request('date') }}</strong></h2>
                    @endif
                    <div class="row">
                        @foreach($courses as $course)
                            <div class="col">
                                <div class="card h-100">
                                    <div class="card-body dark:bg-gray-700 dark:text-gray-200">
                                        <h3 class="card-title fs-3 fw-bold m-0 pt-2">{{ $course->name }}</h3>
                                        <p class="card-text py-4">{{ Str::limit($course->description, 100) }}</p>
                                        <div class="text-end"><a href="{{ route('courses.show', $course->id) }}" class="btn btn-danger">View Details</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if($courses->isEmpty())
                        <p>No courses available for this date.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
