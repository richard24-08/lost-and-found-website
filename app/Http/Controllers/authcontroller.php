<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Form untuk login
    public function login()
    {
        return view('auth.login'); // pastikan ada file resources/views/auth/login.blade.php
    }

    // Proses waktu pengguna lagilogin
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

    // Form buat register pengguna
    public function register()
    {
        return view('auth.register');
    }

    // Proses register
    public function doRegister(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil, silakan login!');
    }

    // Logout
    public function logout()
    {
        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}