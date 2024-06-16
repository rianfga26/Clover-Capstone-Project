<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Schedule; // Memastikan model Schedule diimpor dengan benar
use App\Models\T_Posyandu; 
use App\Models\T_Dusun; 
use Livewire\Component;

class JadwalShow extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $judul, $posyanduId, $dusunId, $deskripsi, $lokasi, $tgl_awal, $tgl_akhir, $schedule_id;
    public $search = '';

    protected function rules()
    {
        return [
            'judul' => 'required|string',
            'posyanduId' => 'required|integer',
            'dusunId' => 'required|integer',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string',
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function saveJadwal()
    {
        $validatedData = $this->validate();
        $validatedData['t_posyandu_id'] = (int) $validatedData['posyanduId'];
        $validatedData['t_dusun_id'] = (int) $validatedData['dusunId'];
        $validatedData['user_id'] = auth()->id();

        // dd($validatedData);

        Schedule::create($validatedData); 
        session()->flash('message', 'Jadwal Berhasil Ditambahkan');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editJadwal(int $schedule_id)
    {
        $schedule = Schedule::find($schedule_id);
        if ($schedule) {
            $this->schedule_id = $schedule->id;
            $this->judul = $schedule->judul;
            $this->deskripsi = $schedule->deskripsi;
            $this->lokasi = $schedule->lokasi;
            $this->tgl_awal = $schedule->tgl_awal;
            $this->tgl_akhir = $schedule->tgl_akhir;
        } else {
            return redirect()->to('/schedules');
        }
    }

    public function updateJadwal()
    {
        $validatedData = $this->validate();

        Schedule::where('id', $this->schedule_id)->update([
            'judul' => $validatedData['judul'],
            'deskripsi' => $validatedData['deskripsi'],
            'lokasi' => $validatedData['lokasi'],
            'tgl_awal' => $validatedData['tgl_awal'],
            'tgl_akhir' => $validatedData['tgl_akhir'],
        ]);
        session()->flash('message', 'Jadwal Berhasil Diperbarui');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteJadwal(int $schedule_id)
    {
        $this->schedule_id = $schedule_id;
    }

    public function destroyJadwal()
    {
        Schedule::find($this->schedule_id)->delete();
        session()->flash('message', 'Jadwal Berhasil Dihapus ');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->judul = '';
        $this->dusunId = '';
        $this->posyanduId = '';
        $this->deskripsi = '';
        $this->lokasi = '';
        $this->tgl_awal = '';
        $this->tgl_akhir = '';
    }

    public function render()
{
    $schedules = Schedule::with('user', 'posyandu', 'dusun') // Eager loading untuk relasi user
        ->where('judul', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'DESC')
        ->paginate(3);
    $posyandu = T_Posyandu::all();
    $dusun = T_Dusun::all();

    return view('livewire.jadwal-show', compact('schedules', 'posyandu', 'dusun'))
        ->extends('layouts.master-admin')
        ->section('body');
}

}
