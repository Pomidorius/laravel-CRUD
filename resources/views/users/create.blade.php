@extends('layouts.app')

@section('content')
    <h1>Create user</h1>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="actions" style="margin-top: 0.5rem;">
            <a class="button-link" href="{{ route('users.index') }}" style="background:#6b7280;">Cancel</a>
            <button type="submit">Save</button>
        </div>
    </form>
@endsection
