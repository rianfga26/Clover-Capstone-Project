<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function index(){
        return view('admin.forgot-password');
    }

    public function sendResetPasswordEmail(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Masukkan email dengan benar.',
        ]);


        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => 'Email sudah terkirim silahkan cek email anda.'])
                : back()->withErrors(['mail' => __($status)]);
                
    }

    public function handleFormResetPassword(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        // dd($request->all());
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
        
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', 'Password telah diganti. Silahkan masuk!')
                    : back()->withErrors(['email' => [__($status)]]);
    }

    public function viewResetPassword($token){
        return view('admin.reset-password', ['token' => $token]);
    }

    public function mail(){
        return view('emails.reset-password');
    }

}
