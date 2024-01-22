<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Jadwal;
use Livewire\Component;

class JadwalShow extends Component
{
    use WithPagination;
 
    protected $paginationTheme = 'bootstrap';
 
    public $judul, $deskripsi, $lokasi,$birthdate, $jadwal_id;
    public $search = '';
 
    protected function rules()
    {
        return [
            'judul' => 'required|string',
            'deskripsi' => ['required','string'],
            'lokasi' => 'required|string',
            'birthdate' => 'required|date',
        ];
    }
 
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
 
    public function saveJadwal()
    {
        $validatedData = $this->validate();
 
        Jadwal::create($validatedData);
        session()->flash('message','Jadwal Added Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
     
    public function editJadwal(int $jadwal_id)
    {
        $jadwal = Jadwal::find($jadwal_id);
        if($jadwal){
 
            $this->jadwal_id = $jadwal->id;
            $this->judul = $jadwal->judul;
            $this->deskripsi = $jadwal->deskripsi;
            $this->lokasi = $jadwal->lokasi;
            $this->birthdate = $jadwal->birthdate;
        }else{
            return redirect()->to('/jadwals');
        }
    }
 
    public function updateJadwal()
    {
        $validatedData = $this->validate();
 
        Jadwal::where('id',$this->jadwal_id)->update([
            'judul' => $validatedData['judul'],
            'deskripsi' => $validatedData['deskripsi'],
            'lokasi' => $validatedData['lokasi'],
            'birthdate' => $validatedData['birthdate'],
        ]);
        session()->flash('message','jadwal Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
     
    public function deleteJadwal(int $jadwal_id)
    {
        $this->jadwal_id = $jadwal_id;
    }
 
    public function destroyJadwal()
    {
        Jadwal::find($this->jadwal_id)->delete();
        session()->flash('message','Jadwal Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
 
    public function closeModal()
    {
        $this->resetInput();
    }
 
    public function resetInput()
    {
        $this->judul = '';
        $this->deskripsi = '';
        $this->lokasi = '';
        $this->birthdate = '';
    }
 
    public function render()
    {
        $jadwals = Jadwal::where('judul', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(3);
        //$jadwals = Jadwal::select('id','name','email','course')->get();
        return view('livewire.jadwal-show', ['jadwals' => $jadwals])->extends('layouts.master-admin')->section('body');
    }
}
