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
    public function showDetailDokumentasi($judul)
    {
        $dokumentasis = Dokumentasi::where('kategori', $judul)->get();
        return view('detail-dokumentasi', compact('dokumentasis', 'judul'));
    }
}
