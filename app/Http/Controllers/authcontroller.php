<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // sementara dummy login
        if ($request->email === "admin@example.com" && $request->password === "123456") {
            return redirect()->route('barang.index')
                ->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    // Form register
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
        return redirect()->route('login')
            ->with('success', 'Berhasil logout!');
    }
}
