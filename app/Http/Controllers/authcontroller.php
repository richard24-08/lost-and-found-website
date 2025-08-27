<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Tampilkan form login
    public function index()
    {
        return view('auth.login'); // pastikan ada file resources/views/auth/login.blade.php
    }

    // Proses login
    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Dummy check (nanti bisa ganti pakai DB)
        if ($request->email === "richard@example.com" && $request->password === "123456") {
            return redirect()->route('barang.index')
                ->with('success', 'Berhasil login!');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    // Logout
    public function logout()
    {
        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}