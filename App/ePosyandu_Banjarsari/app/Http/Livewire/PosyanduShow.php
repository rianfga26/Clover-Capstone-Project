<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\KategoriPosyandu as Posyandu;
use Livewire\Component;

class PosyanduShow extends Component
{
    use WithPagination;
 
    protected $paginationTheme = 'bootstrap';
 
    public $nama, $deskripsi, $birthdate, $posyandu_id;
    public $search = '';
 
    protected function rules()
    {
        return [
            'nama' => 'required|string',
            'deskripsi' => ['required','string'],
            'birthdate' => 'required|date',
        ];
    }
 
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
 
    public function savePosyandu()
    {
        $validatedData = $this->validate();
 
        Posyandu::create($validatedData);
        session()->flash('message','Data Posyandu Telah Tersimpan');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
     
    public function editPosyandu(int $posyandu_id)
    {
        $posyandu = Posyandu::find($posyandu_id);
        if($posyandu){
 
            $this->posyandu_id = $posyandu->id;
            $this->nama = $posyandu->nama;
            $this->deskripsi = $posyandu->deskripsi;
           
            $this->birthdate = $posyandu->birthdate;
        }else{
            return redirect()->to('/posyandus');
        }
    }
 
    public function updatePosyandu()
    {
        $validatedData = $this->validate();
 
        Posyandu::where('id',$this->posyandu_id)->update([
            'nama' => $validatedData['nama'],
            'deskripsi' => $validatedData['deskripsi'],
            'birthdate' => $validatedData['birthdate'],
        ]);
        session()->flash('message','Data Dusun dan Posyandu Telah Diubah');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
     
    public function deletePosyandu(int $posyandu_id)
    {
        $this->posyandu_id = $posyandu_id;
    }
 
    public function destroyPosyandu()
    {
        Posyandu::find($this->posyandu_id)->delete();
        session()->flash('message','Data  Posyandu Telah Dihapus');
        $this->dispatchBrowserEvent('close-modal');
    }
 
    public function closeModal()
    {
        $this->resetInput();
    }
 
    public function resetInput()
    {
        $this->nama = '';
        $this->deskripsi = '';
        $this->birthdate = '';
    }
 
    public function render()
    {
        $posyandus = Posyandu::where('nama', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(3);
        //$Posyandus = Posyandu::select('id','name','email','course')->get();
        return view('livewire.posyandu-show', ['posyandus' => $posyandus])->extends('layouts.master-admin')->section('body');
    }
}
