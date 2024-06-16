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
    
    public function getJadwal(Request $request){
        $validateData = $request->validate([
            'posyandu' => 'required|integer',
            'dusun' => 'required|integer',
            'kegiatan' => 'nullable|string',
        ], [
            'required' => 'Data tidak boleh kosong.',
            'string' => 'Data harus berupa teks.' 
        ]);

        $posyandu = T_Posyandu::all();
        $dusun = T_Dusun::all();

        if(empty($validateData['kegiatan'])){
            $schedules = Schedule::where([
                ['t_posyandu_id', '=', $validateData['posyandu']],
                ['t_dusun_id', '=', $validateData['dusun']]
            ])->get();
        }else{
            $schedules = Schedule::where('t_posyandu_id', '=', $validateData['posyandu'])
            ->where('t_dusun_id', '=', $validateData['dusun'])->where(function($query) use($validateData) {
            $query->where('judul', 'LIKE' , '%'.$validateData['kegiatan'].'%')
                    ->where('deskripsi', 'LIKE', '%'.$validateData['kegiatan'].'%')
                    ->where('lokasi', 'LIKE', '%'.$validateData['kegiatan'].'%');
            })->get();
        }
        
        $data = ['schedules' => $schedules,'posyandu' => $posyandu, 'dusun' => $dusun];

        if($schedules->isEmpty()){
            $data['empty'] = 'Data tidak ditemukan';
            return back()->with($data);
        }else{
            return back()->with($data);
        }

        
    }
}
