<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|file|mimes:jpeg,png,jpg|max:2048', // Validate avatar
        ]);

        $user = auth()->user();
        $user->email = $request->email;
        $user->name = $request->name;

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            // Store new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath; // Save the new file path
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }


    public function changepassword()
    {
        return view('profile.changepassword', ['user' => Auth::user()]);
    }

    public function password(Request $request)
    { {
            $request->validate([
                'current_password' => ['required', 'string'],
                'new_password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $user = Auth::user();

            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Password Sebelumnya Salah!']);
            }

            $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            return back()->with('status', 'Password successfully Changed!');
        }
    }
}
