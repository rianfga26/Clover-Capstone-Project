<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Dokumentasi;
use Livewire\WithFileUploads; // Import the WithFileUploads trait

class DokumentasiShow extends Component
{
    use WithPagination, WithFileUploads; // Include WithFileUploads trait
 
    protected $paginationTheme = 'bootstrap';
    protected $currentImage; // Add this line
 
    public $judul, $image, $deskripsi, $kategori, $birthdate, $dokumentasi_id; // Add $image property
    public $search = '';
 
    protected function rules()
    {
        return [
            'judul' => 'required|string',
            'image' => 'nullable|image|max:2048', // Adjust the image validation rules
            'deskripsi' => ['required','string'],
            'kategori' => 'required|string',
            'birthdate' => 'required|date',
            
        ];
    }
 
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
 
    public function saveDokumentasi()
    {
        $validatedData = $this->validate();
        
        // Handle image upload
        if ($this->image) {
            $validatedData['image'] = $this->image->store('dokumentasi_images', 'public');
        } else {
            $validatedData['image'] = null; // Provide a default value or handle accordingly
        }
    
        Dokumentasi::create($validatedData);
        session()->flash('message','Data Dokumentasi Telah Tersimpan');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal'); // Ganti dispatch dengan dispatchBrowserEvent
    }
     
    public function editDokumentasi(int $dokumentasi_id)
    {
        $dokumentasi = Dokumentasi::find($dokumentasi_id);
        if($dokumentasi){
 
            $this->dokumentasi_id = $dokumentasi->id;
            $this->judul = $dokumentasi->judul;
            
            $this->currentImage = $dokumentasi->image;
            $this->deskripsi = $dokumentasi->deskripsi;
            $this->kategori = $dokumentasi->kategori;
            $this->birthdate = $dokumentasi->birthdate;
            
        }else{
            return redirect()->to('/dokumentasis');
        }
    }
 
    public function updateDokumentasi()
    {
        $validatedData = $this->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'image' => 'nullable|image|max:1024', // Adjust the image validation rules
            'kategori' => 'required|string',
            'birthdate' => 'required|date',
            
        ]);

        // Handle image upload
        if ($this->image) {
            // Store the new image and update the image path
            $validatedData['image'] = $this->image->store('dokumentasi_images', 'public');
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

        Dokumentasi::where('id', $this->dokumentasi_id)->update($validatedData);
        session()->flash('message', 'Data Dokumentasi Telah Terperbarui');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
     
    public function deleteDokumentasi(int $dokumentasi_id)
    {
        $this->dokumentasi_id = $dokumentasi_id;
    }
 
    public function destroyDokumentasi()
    {
        Dokumentasi::find($this->dokumentasi_id)->delete();
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
        $this->judul = '';
        $this->deskripsi = '';
        $this->image = null; // Reset image property
        $this->kategori = '';
        $this->birthdate = '';
        
    }
 
    public function render()
    {
        $dokumentasis = Dokumentasi::where('judul', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(3);
        //$dokumentasis = Student::select('id','name','email','course','birthdate')->get();
        return view('livewire.dokumentasi-show', ['dokumentasis' => $dokumentasis]);
    }
}
