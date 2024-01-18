<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Dusunposyandu;
use Livewire\Component;

class DusunposyanduShow extends Component
{
    use WithPagination;
 
    protected $paginationTheme = 'bootstrap';
 
    public $posyandu, $dusun, $birthdate, $dusunposyandu_id;
    public $search = '';
 
    protected function rules()
    {
        return [
            'posyandu' => 'required|string',
            'dusun' => ['required','string'],
            'birthdate' => 'required|date',
        ];
    }
 
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
 
    public function saveDusunposyandu()
    {
        $validatedData = $this->validate();
 
        Dusunposyandu::create($validatedData);
        session()->flash('message','Data Dusun dan Posyandu Telah Tersimpan');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
     
    public function editDusunposyandu(int $dusunposyandu_id)
    {
        $dusunposyandu = Dusunposyandu::find($dusunposyandu_id);
        if($dusunposyandu){
 
            $this->dusunposyandu_id = $dusunposyandu->id;
            $this->posyandu = $dusunposyandu->posyandu;
            $this->dusun = $dusunposyandu->dusun;
           
            $this->birthdate = $dusunposyandu->birthdate;
        }else{
            return redirect()->to('/dusunposyandus');
        }
    }
 
    public function updateDusunposyandu()
    {
        $validatedData = $this->validate();
 
        Dusunposyandu::where('id',$this->dusunposyandu_id)->update([
            'posyandu' => $validatedData['posyandu'],
            'dusun' => $validatedData['dusun'],
            'birthdate' => $validatedData['birthdate'],
        ]);
        session()->flash('message','Data Dusun dan Posyandu Telah Diubah');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
     
    public function deleteDusunposyandu(int $dusunposyandu_id)
    {
        $this->dusunposyandu_id = $dusunposyandu_id;
    }
 
    public function destroyDusunposyandu()
    {
        Dusunposyandu::find($this->dusunposyandu_id)->delete();
        session()->flash('message','Data Dusun dan Posyandu Telah Dihapus');
        $this->dispatchBrowserEvent('close-modal');
    }
 
    public function closeModal()
    {
        $this->resetInput();
    }
 
    public function resetInput()
    {
        $this->posyandu = '';
        $this->dusun = '';
        $this->birthdate = '';
    }
 
    public function render()
    {
        $dusunposyandus = Dusunposyandu::where('posyandu', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(3);
        //$dusunposyandus = Dusunposyandu::select('id','name','email','course')->get();
        return view('livewire.dusunposyandu-show', ['dusunposyandus' => $dusunposyandus]);
    }
}
