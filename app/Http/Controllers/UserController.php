<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display the logged-in user's profile page.
     */
    public function profile()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to view your profile.');
        }

        return view('profile', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:6',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to update your profile.');
        }

        /** @var \App\Models\User $user */ // membantu Intelephense kenali tipe $user

        // Update email
        $user->email = $request->input('email');

        $user->phone_number = $request->input('phone_number');

        // Update password only if provided. Assign raw value;
        // model akan memastikan hashing bila diperlukan.
        if ($request->filled('password')) {
            $user->password = $request->input('password');
        }

        $user->save();

        return redirect()->route('user.profile')
            ->with('success', 'Profile updated successfully!');
    }
}
