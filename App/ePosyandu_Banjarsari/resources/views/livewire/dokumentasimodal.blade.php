<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="dokumentasiModal" tabindex="-1" aria-labelledby="dokumentasiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dokumentasiModalLabel">baut dokumentasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="saveDokumentasi">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" wire:model="judul" class="form-control">
                        @error('judul') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                    <label>Foto Dokumentasi</label>
                    <input type="file" wire:model="image" class="form-control">
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <input type="text" wire:model="deskripsi" class="form-control">
                        @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="mb-3">
                    <label>Birthdate</label>
                    <input type="date" wire:model="birthdate" class="form-control">
                    @error('birthdate') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
<!-- Update Student Modal -->
<div wire:ignore.self class="modal fade" id="updateDokumentasiModal" tabindex="-1" aria-labelledby="updateDokumentasiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateDokumentasiModalLabel">Edit Dokumentasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateDokumentasi">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" wire:model="nama" class="form-control">
                        @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <input type="text" wire:model="deskripsi" class="form-control">
                        @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                    <label>Foto Dokumentasi</label>
                    <input type="file" wire:model="image" class="form-control">
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                    <label>Birthdate</label>
                    <input type="date" wire:model="birthdate" class="form-control">
                    @error('birthdate') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
 
<!-- Delete Student Modal -->
<div wire:ignore.self class="modal fade" id="deleteDokumentasiModal" tabindex="-1" aria-labelledby="deleteDokumentasiModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteDokumentasiModalLabel">Hapus dokumentasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyDokumentasi">
                <div class="modal-body">
                    <h4>Apakah anda ingin hapus data ini ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes! Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>