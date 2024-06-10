<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumentasimaster;
use App\Models\Dokumentasi;
class DokumentasiController extends Controller
{
    //
    public function index()
    {
        $dokumentasimasters = Dokumentasimaster::all();
        return view('dokumentasi', compact('dokumentasimasters'));
    }
    public function showDetail($judul)
    {
       
       $dokumentasimaster = Dokumentasimaster::where('nama', $judul)->firstOrFail();
       $dokumentasi = Dokumentasi::all();
       return view('detail-dokumentasi', compact('dokumentasi','dokumentasimaster', 'judul'));
    }
}
