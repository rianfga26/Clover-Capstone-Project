<?php

namespace App\Http\Controllers;
use App\Models\Schedule;
use App\Models\Posyandu;
use App\Models\Dokumentasimaster;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    //
    public function index()
    {
        $schedules = Schedule::all();
        $dokumentasimasters = Dokumentasimaster::all();

        $total_posyandu = Posyandu::count();
        $total_balita = Posyandu::whereHas('kategori', function($query){
            $query->where('nama', 'Balita');
        })->count();

        $total_ibu_hamil = Posyandu::whereHas('kategori', function($query){
            $query->where('nama', 'Ibu hamil');
        })->count();

        $total_posbindu = Posyandu::whereHas('kategori', function($query){
            $query->where('nama', 'Posbindu');
        })->count();
        return view('beranda', compact('schedules','dokumentasimasters','total_posyandu', 'total_balita', 'total_ibu_hamil', 'total_posbindu')) ;
    }
   
}
