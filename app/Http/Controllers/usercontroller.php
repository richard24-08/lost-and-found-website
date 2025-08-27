<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Profil user
    public function profile()
    {
        $user = [
            'nama' => 'Richard',
            'email' => 'richard@example.com',
        ];

        return view('user.profile', compact('user'));
    }

    // Update profil user
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
        ]);

        return redirect()->route('user.profile')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}
