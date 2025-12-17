@extends('layouts.app')

@section('content')
    <h1>Edit user</h1>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Leave blank to keep current">
        </div>
        <div class="actions" style="margin-top: 0.5rem;">
            <a class="button-link" href="{{ route('users.index') }}" style="background:#6b7280;">Cancel</a>
            <button type="submit">Update</button>
        </div>
    </form>
@endsection
