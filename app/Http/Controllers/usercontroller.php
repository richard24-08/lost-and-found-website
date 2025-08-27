<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Profil user (ambil dari user yang login)
    public function profile()
    {
        $user = Auth::user(); // ambil user yang login
        return view('user.profile', compact('user'));
    }

    // Update profil user
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // di Laravel default kolomnya 'name'
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('user.profile')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}