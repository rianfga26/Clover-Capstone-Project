<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule; 
use App\Models\T_Posyandu;
use App\Models\T_Dusun;
class ScheduleController extends Controller
{
    //
    public function index()
    {
        $posyandu = T_Posyandu::all();
        $dusun = T_Dusun::all();
        $schedules = Schedule::all();
        return view('jadwal-kegiatan', compact('schedules', 'posyandu', 'dusun'));
    }
    public function showDetail($judul)
    {
       
       $schedule = Schedule::where('judul', $judul)->firstOrFail();
       return view('detail-jadwal-kegiatan', compact('schedule', 'judul'));
    }
}
