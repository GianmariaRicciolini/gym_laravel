@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $course->name }}</h1>
    <p>{{ $course->description }}</p>
    <p>Starts at: {{ $course->start_time }}</p>
    <p>Ends at: {{ $course->end_time }}</p>
    <p>Max Participants: {{ $course->max_participants }}</p>
    <form action="{{ route('courses.book', $course->id) }}" method="POST">
        @csrf
        <button type="submit">Book this course</button>
    </form>
    <form action="{{ route('courses.cancel', $course->id) }}" method="POST">
        @csrf
        <button type="submit">Cancel booking</button>
    </form>
</div>
@endsection
