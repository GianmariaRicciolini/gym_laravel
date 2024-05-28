@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH')

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}">
        </div>
        <div>
            <button type="submit">Update Profile</button>
        </div>
    </form>

    <form action="{{ route('profile.destroy') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Account</button>
    </form>
</div>
@endsection
