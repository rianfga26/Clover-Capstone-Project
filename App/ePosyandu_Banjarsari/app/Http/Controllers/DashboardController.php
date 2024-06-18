<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Posyandu;

class DashboardController extends Controller
{
    //
    public function index()
    {   
        $admin = Auth::user();
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

        return view('admin.index', compact('admin', 'total_posyandu', 'total_balita', 'total_ibu_hamil', 'total_posbindu'));
    }
}
