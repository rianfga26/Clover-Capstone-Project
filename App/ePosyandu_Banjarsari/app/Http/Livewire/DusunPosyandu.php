<?php

namespace App\Http\Livewire;

use App\Models\T_Dusun;
use Livewire\Component;
use App\Models\T_Posyandu;
use Livewire\WithPagination;

class DusunPosyandu extends Component
{
    use WithPagination;
    
    public $ids;
    public $namaDusun;
    public $namaPosyandu;
    public $keterangan;
    public $dusunId;

    protected $rules = [
        'namaDusun' => 'required',
    ];
 
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
 
    public function tambahDusun()
    {
        
        $validatedData = $this->validate();
        $data = [
            'nama' => $validatedData['namaDusun']
        ];
        $this->namaDusun = '';
        T_Dusun::create($data);
    }

    public function detailDusun($id){
        $dusun = T_Dusun::find($id);
        $this->ids= $dusun->id;
        $this->namaDusun= $dusun->nama;
    }

    public function deleteDusun(){
        T_Dusun::where('id', $this->ids)->delete();
        $this->ids = '';
        $this->emit('hapusModal');
    }

    // Posyandu

    public function tambahPosyandu()
    {
        $this->rules = [
            'dusunId' => 'required',
            'namaPosyandu' => 'required',
            'keterangan' => 'required',
        ];
        
        $validatedData = $this->validate();
        $data = [
            'nama' => $validatedData['namaPosyandu'],
            't_dusun_id' => $validatedData['dusunId'],
            'deskripsi' => $validatedData['keterangan']
        ];

        $this->dusunId = '';
        $this->namaPosyandu = '';
        $this->keterangan = '';
        T_Posyandu::create($data);
    }

    public function detailPosyandu($id){
        $posyandu = T_Posyandu::find($id);
        $this->ids= $posyandu->id;
        $this->namaPosyandu= $posyandu->nama;
    }

    public function deletePosyandu(){
        T_Posyandu::where('id', $this->ids)->delete();
        $this->ids = '';
        $this->emit('hapusModalPosyandu');
    }
    

    public function render()
    {  
        $posyandu = T_Posyandu::orderBy('id', 'desc')->paginate(5);
        $dusun = T_Dusun::orderBy('id', 'desc')->get();
        return view('livewire.dusun-posyandu', compact('dusun', 'posyandu'))->extends('layouts.master-admin')->section('body');
    }
}
