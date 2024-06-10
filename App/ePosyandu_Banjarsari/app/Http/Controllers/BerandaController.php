<?php

namespace App\Http\Controllers;
use App\Models\Schedule;
use App\Models\Dokumentasimaster;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    //
    public function index()
    {
        $schedules = Schedule::all();
        $dokumentasimasters = Dokumentasimaster::all();
        return view('beranda', compact('schedules','dokumentasimasters')) ;
    }
   
}
