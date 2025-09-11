<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Form login
    public function login()
    {
        return view('auth.login');
    }

    // Proses login
    public function doLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        // cek ke database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('barang.index')->with('success', 'Berhasil login!');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}
