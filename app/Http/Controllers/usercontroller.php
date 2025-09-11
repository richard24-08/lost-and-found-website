<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Profil user (ambil dari user yang login)
    public function profile()
    {
        $user = Auth::user(); 
        return view('user.profile', compact('user'));
    }

    // Update profil user
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:6',
        ]);

        $user = Auth::user();
        $user->email = $request->email;

        // kalau password diisi, update juga
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('user.profile')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}
