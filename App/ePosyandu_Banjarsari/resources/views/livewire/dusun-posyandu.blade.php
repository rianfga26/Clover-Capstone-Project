<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dusun dan posyandu</h3>
                <br>
                <br>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dusun dan posyandu</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Dusun Banjarsari</h5>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs row" id="myTab" role="tablist">
                    <li class="nav-item col-12 col-md-6" role="presentation">
                        <a class="nav-link border active" aria-controls="home3" aria-selected="true">Tambah Data
                            Dusun</a>
                        <form class="mt-3">
                            <div class="mb-3">
                                <div class="form-group">
                                    <input id="nama" type="nama" placeholder="Masukkan nama dusun..."
                                        class="form-control" wire:model="namaDusun" name="namaDusun">
                                    @error('namaDusun')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"
                                wire:click.prevent="tambahDusun()">Tambah Data</button>
                        </form>
                    </li>
                    <li class="nav-item col-12 col-md-6" role="presentation">
                        <a class="nav-link border active" aria-selected="false" tabindex="-1">Daftar Data Dusun</a>
                        <ul class="list-group mt-3">
                            @foreach ($dusun as $item)
                            <li class="list-group-item">{{ $loop->iteration }}. {{ $item->nama }}<a data-bs-toggle="modal" data-bs-target="#hapusModal" class="btn btn-danger btn-sm float-end" wire:click.prevent="detailDusun({{ $item->id }})"><i class="fa-solid fa-trash"></i></a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Posyandu Banjarsari</h5>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs row" id="myTab" role="tablist">
                    <li class="nav-item col-12 col-md-6" role="presentation">
                        <a class="nav-link border active" aria-controls="home3" aria-selected="true">Tambah Data
                            Posyandu</a>
                        <form action="" class="mt-3">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Pilih Dusun</label>
                                <select class="form-select" name="dusunId" wire:model="dusunId" id="inputGroupSelect01">
                                    <option selected="">Choose...</option>
                                    @foreach ($dusun as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                    
                                </select>
                                @error('dusunId')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <input id="nama" type="text" placeholder="Masukkan nama posyandu..."
                                        class="form-control" wire:model="namaPosyandu" name="namaPosyandu">
                                    @error('namaPosyandu')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <textarea id="nama" placeholder="Keterangan..." class="form-control" wire:model="keterangan" name="keterangan"></textarea>
                                    @error('keterangan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"
                                wire:click.prevent="tambahPosyandu()">Tambah Data</button>
                        </form>
                    </li>
                    <li class="nav-item col-12 col-md-6" role="presentation">
                        <a class="nav-link border active" aria-selected="false" tabindex="-1">Daftar Data Posyandu</a>
                        <ul class="list-group mt-3">
                            @foreach ($posyandu as $item)
                            <li class="list-group-item"> {{ $item->nama }} <a data-bs-toggle="modal" data-bs-target="#hapusModalPosyandu" class="btn btn-danger btn-sm float-end" wire:click.prevent="detailPosyandu({{ $item->id }})"><i class="fa-solid fa-trash"></i></a></li>
                            @endforeach
                        </ul>
                        <div class="mt-3">
                            {{ $posyandu->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </section>

    {{-- modal hapus dusun --}}
    <div wire:ignore.self class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete ({{ $namaDusun }})</h5>
            </div>
            <form>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapusnya?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger"
                        wire:click.prevent="deleteDusun()">Iya,Saya Yakin!</button>
                </div>
            </form>
        </div>
    </div>

    {{-- modal hapus dusun --}}
    <div wire:ignore.self class="modal fade" id="hapusModalPosyandu" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete ({{ $namaPosyandu }})</h5>
            </div>
            <form>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapusnya?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger"
                        wire:click.prevent="deletePosyandu()">Iya,Saya Yakin!</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    window.livewire.on('hapusModal', () => {
            $('#hapusModal').modal('hide');
            $('.modal-backdrop').remove();
        });
    window.livewire.on('hapusModalPosyandu', () => {
            $('#hapusModalPosyandu').modal('hide');
            $('.modal-backdrop').remove();
        });
</script>
</div>

