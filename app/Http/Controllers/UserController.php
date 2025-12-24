<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        // $data = $this->validateUser($request);
        $data = $request->validated();

        User::create($data);

        return redirect()->route('users.index')->with('status', 'User created.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        // $data = $this->validateUser($request, $user->id);
        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('status', 'User updated.');
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->id) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('status', 'User deleted.');
    }

    private function validateUser(Request $request, ?int $userId = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($userId)],
            'phone' => ['required', 'string', 'max:30'],
            'password' => [$userId ? 'nullable' : 'required', 'string', 'min:8'],
        ]);
    }
}
