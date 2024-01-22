<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="posyanduModal" tabindex="-1" aria-labelledby="posyanduModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="posyanduModalLabel">Buat Data Posyandu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="savePosyandu">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Posyandu</label>
                        <input type="text" wire:model="nama" class="form-control">
                        @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <input type="text" wire:model="deskripsi" class="form-control">
                        @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                    <label>Tanggal dibuat</label>
                    <input type="date" wire:model="birthdate" class="form-control">
                    @error('birthdate') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
<!-- Update Modal -->
<div wire:ignore.self class="modal fade" id="updatePosyanduModal" tabindex="-1" aria-labelledby="updatePosyanduModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePosyanduModalLabel">Ubah Data Posyandu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updatePosyandu">
            <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Posyandu</label>
                        <input type="text" wire:model="nama" class="form-control">
                        @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <input type="text" wire:model="deskripsi" class="form-control">
                        @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                    <label>Tanggal dibuat</label>
                    <input type="date" wire:model="birthdate" class="form-control">
                    @error('birthdate') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
 
<!-- Delete  Modal -->
<div wire:ignore.self class="modal fade" id="deletePosyanduModal" tabindex="-1" aria-labelledby="deletePosyanduModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePosyanduModalLabel">Hapus Data Posyandu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyPosyandu">
                <div class="modal-body">
                    <h4>Apakah anda ingin hapus data ini ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ya! Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>