<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Cek kredensial pengguna
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('cms')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.login')->with('success', 'Logout berhasil!');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

}
