<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login process
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            
            // DEBUG: Lihat data user
            \Log::info('=== LOGIN DEBUG ===');
            \Log::info('Email: ' . $user->email);
            \Log::info('Status: ' . $user->status);
            \Log::info('Status Type: ' . gettype($user->status));
            \Log::info('==================');
            
            // Case-insensitive check untuk menghindari masalah huruf besar/kecil
            $status = strtolower(trim($user->status));
            
            \Log::info('Cleaned Status: ' . $status);
            
            if ($status === 'admin' || $status === 'guru') {
                \Log::info('🚀 REDIRECTING TO ADMIN DASHBOARD');
                return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
            } else {
                \Log::info('🔙 REDIRECTING TO USER HOME');
                return redirect()->route('home')->with('success', 'Login successful!');
            }
        }

        return back()->with('error', 'Invalid email or password.');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}