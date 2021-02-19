<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{

    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }

    public function edit(User $user)
    {
        // Handled in policy
        //        if (auth()->id() !== $user->id) {
        //            abort(403);
        //        }
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user)],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user)],
            'avatar' => 'file',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if ($attributes['avatar']) {
            $attributes['avatar'] = $attributes['avatar']->store('avatars');
        }

        $user->update($attributes);

        return redirect()->route('profiles.edit', $user)->with('status', 'Profile updated!');
    }

}
