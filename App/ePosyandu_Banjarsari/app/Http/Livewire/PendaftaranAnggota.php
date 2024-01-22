<?php

namespace App\Http\Livewire;

use App\Models\T_Dusun;
use Livewire\Component;
use App\Models\Posyandu;
use App\Models\T_Posyandu;
use Livewire\WithPagination;
use App\Models\KategoriPosyandu;
use Illuminate\Support\Facades\Auth;

class PendaftaranAnggota extends Component
{
    use WithPagination;

    public $ids;
    public $posyanduId;
    public $p_kategori;
    public $nik;
    public $nkk;
    public $nama;
    public $tempat_lahir;
    public $tgl_lahir;
    public $alamat;
    public $rt_rw;
    public $umur;
 
    protected $rules = [
        'posyanduId' => 'required',
        'nik' => 'required|min:16',
        'nkk' => 'required|min:16',
        'nama' => 'required',
        'tempat_lahir' => 'required',
        'tgl_lahir' => 'required|date',
        'rt_rw' => 'required',
        'umur' => 'required|integer',
        'alamat' => 'required',
        'p_kategori' => 'required'
    ];
 
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function clearForm(){
        $this->nik= '';
        $this->nkk= '';
        $this->posyanduId= '';
        $this->p_kategori= '';
        $this->nama= '';
        $this->tempat_lahir= '';
        $this->tgl_lahir= '';
        $this->alamat= '';
        $this->rt_rw= '';
        $this->umur= '';
    }
 
    public function saveAnggota()
    {
        
        $validatedData = $this->validate();
        $data = [
            'nik' => $validatedData['nik'],
            't_posyandu_id' => $validatedData['posyanduId'],
            'p_kategori_id' => $validatedData['p_kategori'],
            'nkk' => $validatedData['nkk'],
            'user_id' => Auth::user()->id,
            'nama' => $validatedData['nama'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tgl_lahir' => $validatedData['tgl_lahir'],
            'rt_rw' => $validatedData['rt_rw'],
            'alamat' => $validatedData['alamat'],
            'umur' => $validatedData['umur'],
        ];  
        
        Posyandu::create($data);
        $this->clearForm();
        $this->emit('tambahModal', ['message' => 'Akun berhasil ditambahkan!!!']);
    }

    public function detailAnggota($nik){
        $anggota = Posyandu::where('nik', $nik)->first();
        $this->nik= $anggota->nik;
        $this->nkk= $anggota->nkk;
        $this->posyanduId= $anggota->t_posyandu_id;
        $this->p_kategori= $anggota->p_kategori_id;
        $this->nama= $anggota->nama;
        $this->tempat_lahir= $anggota->tempat_lahir;
        $this->tgl_lahir= $anggota->tgl_lahir;
        $this->alamat= $anggota->alamat;
        $this->rt_rw= $anggota->rt_rw;
        $this->umur= $anggota->umur;
    }

    public function updateAnggota(){
        $data_update = $this->validate();

        $data = [
            'nik' => $data_update['nik'],
            't_posyandu_id' => $data_update['posyanduId'],
            'p_kategori_id' => NULL,
            'nkk' => $data_update['nkk'],
            'user_id' => 2,
            'nama' => $data_update['nama'],
            'tempat_lahir' => $data_update['tempat_lahir'],
            'tgl_lahir' => $data_update['tgl_lahir'],
            'rt_rw' => $data_update['rt_rw'],
            'alamat' => $data_update['alamat'],
            'umur' => $data_update['umur'],
        ];  
        
        Posyandu::where('nik', $this->nik)->update($data);
        $this->clearForm();
        $this->emit('editModal', ['message' => 'Anggota bernama '.$data_update['nama'].' berhasil diupdate!!!']);
    }
    
    public function deleteAdminDusun(){
        Posyandu::where('nik', $this->nik)->delete();
        $this->clearForm();
        $this->emit('hapusModal', ['message' => 'Anggota berhasil di hapus!!!']);
    }

    public function render()
    {
        $datas = Posyandu::orderBy('created_at', 'desc')->with('kategori','posyandu')->paginate(10);
        $posyandu = T_Posyandu::all();
        $kategori = KategoriPosyandu::all();
        return view('livewire.pendaftaran-anggota', compact('posyandu','datas','kategori'))->extends('layouts.master-admin')->section('body');
    }
}
