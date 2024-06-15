<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="jadwalModal" tabindex="-1" aria-labelledby="jadwalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jadwalModalLabel">Buat Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>
            <form wire:submit.prevent="saveJadwal">
            <div class="modal-body">
                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" wire:model="judul" class="form-control">
                        @error('judul') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Pilih Posyandu</label>
                        <select class="form-select" id="inputGroupSelect01" wire:model="posyanduId" name="posyanduId">
                            <option selected="">Choose...</option>
                            @foreach ($posyandu as $item)
                            <option value="{{$item->id }}">{{$item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Pilih Dusun</label>
                        <select class="form-select" id="inputGroupSelect01" wire:model="dusunId" name="dusunId">
                            <option selected="">Choose...</option>
                            @foreach ($dusun as $item)
                            <option value="{{$item->id }}">{{$item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <input type="text" wire:model="deskripsi" class="form-control">
                        @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>lokasi</label>
                        <input type="text" wire:model="lokasi" class="form-control">
                        @error('lokasi') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Tanggal dibuat</label>
                        <input type="datetime-local" wire:model="tgl_awal" class="form-control">
                        @error('tgl_awal') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Tanggal akhir</label>
                        <input type="datetime-local" wire:model="tgl_akhir" class="form-control">
                        @error('tgl_akhir') <span class="text-danger">{{ $message }}</span> @enderror
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
<div wire:ignore.self class="modal fade" id="updateJadwalModal" tabindex="-1" aria-labelledby="updateJadwalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateJadwalModalLabel">Ubah Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateJadwal">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" wire:model="judul" class="form-control">
                        @error('judul') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Pilih Posyandu</label>
                        <select class="form-select" id="inputGroupSelect01" wire:model="posyanduId" name="posyanduId">
                            @foreach ($posyandu as $item)
                            <option value="{{$item->id }}" selected>{{$item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Pilih Dusun</label>
                        <select class="form-select" id="inputGroupSelect01" wire:model="dusunId" name="dusunId">
                            @foreach ($dusun as $item)
                            <option value="{{$item->id }}" selected>{{$item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <input type="text" wire:model="deskripsi" class="form-control">
                        @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>lokasi</label>
                        <input type="text" wire:model="lokasi" class="form-control">
                        @error('lokasi') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Tanggal dibuat</label>
                        <input type="datetime-local" wire:model="tgl_awal" class="form-control">
                        @error('tgl_awal') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Tanggal akhir</label>
                        <input type="datetime-local" wire:model="tgl_akhir" class="form-control">
                        @error('tgl_akhir') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
 
<!-- Delete  Modal -->
<div wire:ignore.self class="modal fade" id="deleteJadwalModal" tabindex="-1" aria-labelledby="deleteJadwalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteJadwalModalLabel">Hapus Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyJadwal">
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