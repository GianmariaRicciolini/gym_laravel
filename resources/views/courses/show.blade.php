@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $course->name }}</h1>
    <p>{{ $course->description }}</p>
    <p>Date: {{ $course->date }}</p>
    <p>Starts at: {{ $course->start_time }}</p>
    <p>Ends at: {{ $course->end_time }}</p>
    <p>Max Participants: {{ $course->max_participants }}</p>
</div>
@endsection
