@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Course</h1>
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" required>{{ old('description') }}</textarea>
        </div>
        <div>
            <label for="date">Date</label>
            <input type="date" name="date" value="{{ old('date') }}" required>
        </div>
        <div>
            <label for="start_time">Start Time</label>
            <input type="time" name="start_time" value="{{ old('start_time') }}" required>
        </div>
        <div>
            <label for="end_time">End Time</label>
            <input type="time" name="end_time" value="{{ old('end_time') }}" required>
        </div>
        <div>
            <label for="max_participants">Max Participants</label>
            <input type="number" name="max_participants" value="{{ old('max_participants') }}" required>
        </div>
        <div>
            <button type="submit">Create Course</button>
        </div>
    </form>
</div>
@endsection
