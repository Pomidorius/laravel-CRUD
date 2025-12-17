@extends('layouts.app')

@section('content')
    <div class="actions" style="justify-content: space-between; align-items: center; margin-bottom: 1rem;">
        <h1 style="margin: 0;">Users</h1>
        <a class="button-link" href="{{ route('users.create') }}">Add user</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th style="width: 170px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        <div class="actions">
                            <a class="button-link" href="{{ route('users.edit', $user) }}">Edit</a>
                            <form method="POST" action="{{ route('users.destroy', $user) }}" onsubmit="return confirm('Delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:#b91c1c;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No users yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
