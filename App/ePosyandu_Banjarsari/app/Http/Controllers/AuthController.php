<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }

        return back()->withErrors([
            'loginError' => 'Email atau password salah'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    // forgot password
    public function handle_password(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Masukkan email dengan benar.',
        ]);

        
    }

    
}
