<div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-5">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <div class="d-flex justify-content-between align-items-baseline">
            <h1 class="text-2xl font-bold mb-4 fs-1">{{ $course->name }}</h1>
            <p><strong>Date:</strong> {{ $course->date }}</p>
        </div>
        
        <p class="mb-4 fs-5">{{ $course->description }}</p>
        
        <div class="d-flex justify-content-between align-items-baseline">
            <p><strong>Starts at:</strong> {{ \Carbon\Carbon::parse($course->start_time)->format('H:i') }} - <strong>Ends at:</strong> {{ \Carbon\Carbon::parse($course->end_time)->format('H:i') }}</p>
            <p><strong>Participants:</strong> {{ $course->users->count() }} / {{ $course->max_participants }}</p>
        </div>

        <div class="text-end">
            @if (Auth::check())
                @if ($course->users->contains(Auth::user()))
                    <form method="POST" action="{{ route('courses.cancel', $course) }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="redirect_to" value="{{ request()->routeIs('profile.bookings') ? route('profile.bookings') : route('courses.index') }}">
                        <input type="hidden" name="date" value="{{ request('date') }}">
                        <button type="submit" class="btn btn-danger mt-4">Cancel Booking</button>
                    </form>
                @else
                    <form method="POST" action="{{ route('courses.book', $course) }}">
                        @csrf
                        <input type="hidden" name="redirect_to" value="{{ request()->routeIs('profile.bookings') ? route('profile.bookings') : route('courses.index') }}">
                        <input type="hidden" name="date" value="{{ request('date') }}">
                        <button type="submit" class="btn btn-success mt-4">Book Course</button>
                    </form>
                @endif
            @endif
        </div>
    </div>
</div>