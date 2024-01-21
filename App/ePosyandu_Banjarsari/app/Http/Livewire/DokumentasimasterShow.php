<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dokumentasimaster;
use Livewire\WithFileUploads; // Import the WithFileUploads trait

class DokumentasimasterShow extends Component
{
    use WithPagination, WithFileUploads; // Include WithFileUploads trait
 
    protected $paginationTheme = 'bootstrap';
    protected $currentImage; // Add this line
 
    public $nama, $deskripsi, $image, $birthdate, $dokumentasimaster_id; // Add $image property
    public $search = '';
 
    protected function rules()
    {
        return [
            'nama' => 'required|string',
            'deskripsi' => ['required','string'],
            'image' => 'nullable|image|max:2048', // Adjust the image validation rules
            'birthdate' => 'required|date',
            
        ];
    }
 
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
 
    public function saveDokumentasimaster()
    {
        $validatedData = $this->validate();
        
        // Handle image upload
        if ($this->image) {
            $validatedData['image'] = $this->image->store('dokumentasimaster_images', 'public');
        } else {
            $validatedData['image'] = null; // Provide a default value or handle accordingly
        }
    
        Dokumentasimaster::create($validatedData);
        session()->flash('message','Data Dokumentasi Telah Tersimpan');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal'); // Ganti dispatch dengan dispatchBrowserEvent
    }
     
    public function editDokumentasimaster(int $dokumentasimaster_id)
    {
        $dokumentasimaster = Dokumentasimaster::find($dokumentasimaster_id);
        if($dokumentasimaster){
 
            $this->dokumentasimaster_id = $dokumentasimaster->id;
            $this->nama = $dokumentasimaster->nama;
            $this->deskripsi = $dokumentasimaster->deskripsi;
            $this->currentImage = $dokumentasimaster->image;
            $this->birthdate = $dokumentasimaster->birthdate;
            
        }else{
            return redirect()->to('/dokumentasimasters');
        }
    }
 
    public function updateDokumentasimaster()
    {
        $validatedData = $this->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|max:1024', // Adjust the image validation rules
            'birthdate' => 'required|date',
            
        ]);

        // Handle image upload
        if ($this->image) {
            // Store the new image and update the image path
            $validatedData['image'] = $this->image->store('dokumentasimaster_images', 'public');
            // Delete the old image (if it exists)
            if ($this->currentImage) {
                Storage::disk('public')->delete($this->currentImage);
            }
        } else {
            // If no new image is provided, keep the current image path
             // Jika $this->image null, log atau tangani kasus ini sesuai kebutuhan
        // Misalnya, Anda bisa menambahkan pesan log:
        \Log::info('No new image selected during update.');
        // Atau Anda bisa memutuskan untuk tidak mengubah image:
        // $validatedData['image'] = $this->currentImage;
        }

        Dokumentasimaster::where('id', $this->dokumentasimaster_id)->update($validatedData);
        session()->flash('message', 'Data Dokumentasi Telah Terperbarui');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
     
    public function deleteDokumentasimaster(int $dokumentasimaster_id)
    {
        $this->dokumentasimaster_id = $dokumentasimaster_id;
    }
 
    public function destroyDokumentasimaster()
    {
        Dokumentasimaster::find($this->dokumentasimaster_id)->delete();
        session()->flash('message','Data dokumentasi telah terhapus');
        $this->dispatchBrowserEvent('close-modal');
    }
 
    public function closeModal()
    {
        $this->resetInput();
        $this->emit('closeModal'); // Mengirim event Livewire
        $this->dispatchBrowserEvent('close-modal');
    }
 
    public function resetInput()
    {
        $this->nama = '';
        $this->deskripsi = '';
        $this->image = null; // Reset image property
        $this->birthdate = '';

        
    }
 
    public function render()
    {
        $dokumentasimasters = Dokumentasimaster::where('nama', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(3);
        //$dokumentasimasters = Student::select('id','name','email','course','birthdate')->get();
        return view('livewire.dokumentasimaster-show', ['dokumentasimasters' => $dokumentasimasters]);
    }

}
