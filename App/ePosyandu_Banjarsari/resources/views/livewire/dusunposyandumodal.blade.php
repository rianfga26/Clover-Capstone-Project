<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="dusunposyanduModal" tabindex="-1" aria-labelledby="dusunposyanduModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dusunposyanduModalLabel">Buat Dusun dan Posyandu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="saveDusunposyandu">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Posyandu</label>
                        <input type="text" wire:model="posyandu" class="form-control">
                        @error('posyandu') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Dusun</label>
                        <input type="text" wire:model="dusun" class="form-control">
                        @error('dusun') <span class="text-danger">{{ $message }}</span> @enderror
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
<div wire:ignore.self class="modal fade" id="updateDusunposyanduModal" tabindex="-1" aria-labelledby="updateDusunposyanduModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateDusunposyanduModalLabel">Ubah Dusun Posyandu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateDusunposyandu">
            <div class="modal-body">
                    <div class="mb-3">
                        <label>Posyandu</label>
                        <input type="text" wire:model="posyandu" class="form-control">
                        @error('posyandu') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Dusun</label>
                        <input type="text" wire:model="dusun" class="form-control">
                        @error('dusun') <span class="text-danger">{{ $message }}</span> @enderror
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
<div wire:ignore.self class="modal fade" id="deleteDusunposyanduModal" tabindex="-1" aria-labelledby="deleteDusunposyanduModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteDusunposyanduModalLabel">Hapus Dusun Posyandu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyDusunposyandu">
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