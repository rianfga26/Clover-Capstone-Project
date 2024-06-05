<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {   
        $admin = Auth::user();
        return view('admin.index', compact('admin'));
    }
}
