@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Courses</h1>
    <ul>
        @foreach($courses as $course)
            <li>
                <a href="{{ route('courses.show', $course->id) }}">{{ $course->name }}</a>
                - {{ $course->description }}
            </li>
        @endforeach
    </ul>
</div>
@endsection
