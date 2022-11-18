<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);
        $remember_me = false;
        if ($request->remember_me == 'true') {
            $remember_me = true;
        }
        if (Auth::attempt($validated, $remember_me)) {
            $request->session()->regenerate();
            return redirect()->intended(route('user_dashboard'));
        }
        return back()->withErrors([
            'not_match' => 'NIM atau password tidak sesuai',
        ]);
    }

    public function loginAdmin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $remember_me = false;
        if ($request->remember_me == 'true') {
            $remember_me = true;
        }
        $authData = [
            'email' => $validated['email'],
            'password' => $validated['password'],
            'role' => 'ADMIN'
        ];
        if (Auth::attempt($authData, $remember_me)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin_dashboard'));
        }
        return back()->withErrors([
            'not_match' => 'Email atau password tidak sesuai',
        ]);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $role = $user['role'];
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        if ($role == 'ADMIN') {
            return redirect()->intended(route('admin_login'));
        }
        return redirect()->intended(route('login'));
    }
}
