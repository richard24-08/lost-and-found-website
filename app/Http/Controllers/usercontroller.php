<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to update your profile.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'phone_number' => 'nullable|string|max:20',
            'status' => 'required|in:Murid,Guru',
            'department' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        /** @var \App\Models\User $user */

        // Update basic information
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->status = $request->input('status');
        $user->department = $request->input('department');
        $user->birth_date = $request->input('birth_date');

        // Update password only if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->image_path && \Storage::exists('public/' . $user->image_path)) {
                \Storage::delete('public/' . $user->image_path);
            }
            
            // Store new profile picture
            $imagePath = $request->file('profile_picture')->store('profile-pictures', 'public');
            $user->image_path = $imagePath;
        }

        $user->save();

        return redirect()->route('user.profile')
            ->with('success', 'Profile updated successfully!');
    }

    /**
     * Update only the profile picture.
     */
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to update your profile picture.');
        }

        // Delete old profile picture if exists
        if ($user->image_path && \Storage::exists('public/' . $user->image_path)) {
            \Storage::delete('public/' . $user->image_path);
        }
        
        // Store new profile picture
        $imagePath = $request->file('profile_picture')->store('profile-pictures', 'public');
        $user->image_path = $imagePath;
        $user->save();

        return redirect()->route('user.profile')
            ->with('success', 'Profile picture updated successfully!');
    }

    /**
     * Show the form for editing the user's profile.
     */
    public function edit()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')
                ->with('error', 'You must be logged in to edit your profile.');
        }

        return view('profile-edit', compact('user'));
    }
}