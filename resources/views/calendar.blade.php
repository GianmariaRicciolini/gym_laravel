@php
    $date = request('date') ? \Carbon\Carbon::parse(request('date')) : \Carbon\Carbon::now();
    $startOfMonth = $date->copy()->startOfMonth();
    $endOfMonth = $date->copy()->endOfMonth();
    $startOfWeek = $startOfMonth->copy()->startOfWeek();
    $endOfWeek = $endOfMonth->copy()->endOfWeek();
    $currentDate = $startOfWeek->copy();
@endphp

<div class="calendar">
    <div class="calendar-header d-flex justify-content-between mb-4">
        <a href="{{ route('dashboard', ['date' => $date->copy()->subMonth()->format('Y-m')]) }}" class="btn btn-secondary">Previous</a>
        <span class="h4">{{ $date->format('F Y') }}</span>
        <a href="{{ route('dashboard', ['date' => $date->copy()->addMonth()->format('Y-m')]) }}" class="btn btn-secondary">Next</a>
    </div>
    <div class="d-flex flex-wrap border-top border-gray-200">
        @while ($currentDate->lte($endOfWeek))
            @for ($i = 0; $i < 7; $i++)
                <div class="border border-gray-200 p-2 d-flex flex-column justify-content-between {{ $currentDate->month != $date->month ? 'bg-gray-200 dark:bg-gray-700' : 'bg-transparent' }}" style="width: calc(100% / 7); height: 100px;">
                    <div class="d-flex justify-content-between">
                        <span class="font-weight-bold">{{ $currentDate->format('D') }}</span>
                        <a href="{{ route('courses.index', ['date' => $currentDate->format('Y-m-d')]) }}" class="{{ $currentDate->isToday() ? 'text-danger' : '' }}">
                            {{ $currentDate->day }}
                        </a>
                    </div>
                    @php
                        $courses = \App\Models\Course::whereDate('date', $currentDate->format('Y-m-d'))->get();
                    @endphp
                    <div>
                        @foreach ($courses as $course)
                            <div>
                                <a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a>
                            </div>
                        @endforeach
                    </div>
                    @php
                        $currentDate->addDay();
                    @endphp
                </div>
            @endfor
        @endwhile
    </div>
</div>

