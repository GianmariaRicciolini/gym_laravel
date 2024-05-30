@php
    $date = request('date') ? \Carbon\Carbon::parse(request('date')) : \Carbon\Carbon::now();
    $startOfMonth = $date->copy()->startOfMonth();
    $endOfMonth = $date->copy()->endOfMonth();
    $startOfWeek = $startOfMonth->copy()->startOfWeek();
    $endOfWeek = $endOfMonth->copy()->endOfWeek();
    $currentDate = $startOfWeek->copy();
@endphp

<div class="calendar">
    <div class="calendar-header flex justify-between">
        <a href="{{ route('dashboard', ['date' => $date->copy()->subMonth()->format('Y-m')]) }}" class="btn btn-secondary">Previous</a>
        <span class="text-lg font-semibold">{{ $date->format('F Y') }}</span>
        <a href="{{ route('dashboard', ['date' => $date->copy()->addMonth()->format('Y-m')]) }}" class="btn btn-secondary">Next</a>
    </div>
    <div class="grid grid-cols-7 mt-4">
        @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
            <div class="text-center font-semibold">{{ $day }}</div>
        @endforeach
    </div>
    <div class="grid grid-cols-7 border-t border-gray-200">
        @while ($currentDate->lte($endOfWeek))
            @for ($i = 0; $i < 7; $i++)
                <div class="border-r border-b border-gray-200 p-2 {{ $currentDate->month != $date->month ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                    <div class="text-right">
                        <a href="{{ route('courses.index', ['date' => $currentDate->format('Y-m-d')]) }}" class="{{ $currentDate->isToday() ? 'text-red-500' : '' }}">
                            {{ $currentDate->day }}
                        </a>
                    </div>
                    @php
                        $courses = \App\Models\Course::whereDate('date', $currentDate->format('Y-m-d'))->get();
                    @endphp
                    @foreach ($courses as $course)
                        <div>
                            <a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a>
                        </div>
                    @endforeach
                    @php
                        $currentDate->addDay();
                    @endphp
                </div>
            @endfor
        @endwhile
    </div>
</div>
