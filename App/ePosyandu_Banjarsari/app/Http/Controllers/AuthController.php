<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('admin.login');
    }

    public function authenticated(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->rememberMe === 'on' ? Str::random(24) : '';

        if(Auth::viaRemember()){
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }

        return back()->withErrors([
            'loginError' => 'Email atau password salah.'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

}
