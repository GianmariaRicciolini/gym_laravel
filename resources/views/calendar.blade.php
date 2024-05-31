@php
    $date = request('date') ? \Carbon\Carbon::parse(request('date')) : \Carbon\Carbon::now();
    $startOfMonth = $date->copy()->startOfMonth();
    $endOfMonth = $date->copy()->endOfMonth();
    $startOfWeek = $startOfMonth->copy()->startOfWeek();
    $endOfWeek = $endOfMonth->copy()->endOfWeek();
    $currentDate = $startOfWeek->copy();
@endphp

<div class="calendar pt-5 mt-5">
    <div class="calendar-header d-flex justify-content-between mb-4">
        <a href="{{ route('dashboard', ['date' => $date->copy()->subMonth()->format('Y-m')]) }}" class="btn btn-secondary">Previous</a>
        <span class="h4">{{ $date->format('F Y') }}</span>
        <a href="{{ route('dashboard', ['date' => $date->copy()->addMonth()->format('Y-m')]) }}" class="btn btn-secondary">Next</a>
    </div>
    <div class="d-flex flex-wrap border-top border-gray-200">
        @while ($currentDate->lte($endOfWeek))
            @for ($i = 0; $i < 7; $i++)
                @php
                    $courses = \App\Models\Course::with('users')->whereDate('date', $currentDate->format('Y-m-d'))->get();
                    $courseCount = $courses->count();
                    $isBooked = $courses->filter(function ($course) {
                        return $course->users->contains(Auth::user());
                    })->isNotEmpty();
                @endphp
                <div class="border border-gray-200 p-2 d-flex flex-column justify-content-between align-items-center {{ $currentDate->month != $date->month ? 'bg-gray-200 dark:bg-gray-700' : ($isBooked ? 'bg-info' : 'bg-transparent') }}" style="width: calc(100% / 7); height: 100px; position: relative;">
                    <div class="d-flex justify-content-between w-100">
                        <span class="font-weight-bold">{{ $currentDate->format('D') }}</span>
                        <a href="{{ route('courses.index', ['date' => $currentDate->format('Y-m-d')]) }}" class="{{ $currentDate->isToday() ? 'text-danger' : ($isBooked ? 'text-white' : '') }}">
                            {{ $currentDate->day }}
                        </a>
                    </div>
                    @if($courseCount > 0)
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <a href="{{ route('courses.index', ['date' => $currentDate->format('Y-m-d')]) }}" class="badge bg-danger text-white rounded-circle d-flex align-items-center justify-content-center fs-5" style="width: 40px; height: 40px;">
                                {{ $courseCount }}
                            </a>
                        </div>
                    @endif
                    @php
                        $currentDate->addDay();
                    @endphp
                </div>
            @endfor
        @endwhile
    </div>
</div>
