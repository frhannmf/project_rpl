<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

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
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'not_match' => 'NIM atau password tidak sesuai',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
