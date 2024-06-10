<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function index(){
        return view('admin.forgot-password');
    }

    public function mail(){
        return view('emails.reset-password');
    }

}
