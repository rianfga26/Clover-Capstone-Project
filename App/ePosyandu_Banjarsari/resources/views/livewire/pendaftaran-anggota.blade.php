<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pendaftaran Anggota </h3>
                <br>
                <br>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pendaftaran Anggota</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <script>
            let swal = Swal.fire({
                toast: true,
                title: "Selamat!",
                text: data.message,
                position: 'top-right',
                icon: "success",
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Livewire.on('tambahModal', data => {
                swal
            })

            Livewire.on('editModal', data => {
                swal
            })

            Livewire.on('hapusModal', data => {
                swal
            })
        </script>
        <div class="card">
            <div class="card-body table-responsive">
                <button type="button" class="btn btn-secondary btn-md" data-bs-toggle="modal"
                data-bs-target="#tambahModal" wire:click.prevent="clearForm">Tambah data</button>
                <button type="button" class="btn btn-secondary btn-md">Cetak</button>
                <table class="table table-striped mt-3" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="text-capitalize">nkk</th>
                            <th class="text-capitalize">nik</th>
                            <th class="text-capitalize">nama</th>
                            <th class="text-capitalize">tempat lahir</th>
                            <th class="text-capitalize">tanggal lahir</th>
                            <th class="text-capitalize">alamat</th>
                            <th class="text-capitalize">dusun</th>
                            <th class="text-capitalize">rt/rw</th>
                            <th class="text-capitalize">kategori</th>
                            <th class="text-capitalize">tanggal dibuat</th>
                            <th class="text-capitalize">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $item => $data)
                            <tr>
                                <td>{{ $datas->firstItem() + $loop->index }}</td>
                                <td>{{ $data->nkk }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->tempat_lahir }}</td>
                                <td>{{ date('d-M-Y', strtotime($data->tgl_lahir)) }}</td>
                                <td>{{ $data->alamat }}</td>
                                @foreach ($data->posyandu[0]->t_dusun()->get() as $dusun)
                                    <td>{{ $dusun->nama }}</td>
                                @endforeach
                                <td>{{ $data->rt_rw }}</td>
                                <td>{{ $data->kategori[0]->nama }}</td>
                                <td>{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm"
                                        wire:click.prevent="detailAnggota({{ $data->nik }})"
                                        data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#hapusModal"
                                        wire:click.prevent="detailAnggota({{ $data->nik }})">Delete</button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $datas->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>

        {{-- modal tambah --}}
        <div wire:ignore.self class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Pilih Posyandu</label>
                                <select class="form-select" id="inputGroupSelect01" wire:model="posyanduId" name="posyanduId">
                                    <option selected="">Choose...</option>
                                    @foreach ($posyandu as $item)
                                    <option value="{{$item->id }}">{{$item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('posyanduId')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="nik">nik: </label>
                                <div class="form-group">
                                    <input id="nik" type="number" placeholder="nomor induk keluarga" class="form-control"
                                        wire:model="nik" name="nik">
                                    @error('nik')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nkk">nkk: </label>
                                <div class="form-group">
                                    <input id="nkk" type="number" placeholder="nomor induk keluarga" class="form-control"
                                        wire:model="nkk" name="nkk">
                                    @error('nkk')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nama">nama: </label>
                                <div class="form-group">
                                    <input id="nama" type="text" placeholder="nomor induk keluarga" class="form-control"
                                        wire:model="nama" name="nama">
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir">tempat lahir: </label>
                                <div class="form-group">
                                    <input id="tempat_lahir" type="text" placeholder="nomor induk keluarga" class="form-control"
                                        wire:model="tempat_lahir" name="tempat_lahir">
                                    @error('tempat_lahir')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir">tanggal lahir: </label>
                                <div class="form-group">
                                    <input id="tgl_lahir" type="date" placeholder="nomor induk keluarga" class="form-control"
                                        wire:model="tgl_lahir" name="tgl_lahir">
                                    @error('tgl_lahir')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat">alamat: </label>
                                <div class="form-group">
                                    <input id="alamat" type="text" placeholder="alamat rumah" class="form-control"
                                        wire:model="alamat" name="alamat">
                                    @error('alamat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="rt_rw">rt rw: </label>
                                <div class="form-group">
                                    <input id="rt_rw" type="text" placeholder="RT/RW" class="form-control"
                                        wire:model="rt_rw" name="rt_rw">
                                    @error('rt_rw')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="umur">umur: </label>
                                <div class="form-group">
                                    <input id="umur" type="number" placeholder="umur" class="form-control"
                                        wire:model="umur" name="umur">
                                    @error('umur')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Pilih Kategori</label>
                                <select class="form-select" id="inputGroupSelect01" wire:model="p_kategori" name="p_kategori">
                                    <option selected="">Choose...</option>
                                    @foreach ($kategori as $item)
                                    <option value="{{$item->id }}">{{$item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('p_kategori')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" wire:click.prevent="saveAnggota()">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        {{-- modal edit --}}
        <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Anggota</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Pilih Posyandu</label>
                                <select class="form-select" id="inputGroupSelect01" wire:model="posyanduId" name="posyanduId">
                                    <option selected="">Choose...</option>
                                    @foreach ($posyandu as $item)
                                    <option value="{{$item->id }}">{{$item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nik">nik: </label>
                                <div class="form-group">
                                    <input id="nik" type="number" placeholder="nomor induk keluarga" class="form-control"
                                        wire:model="nik" name="nik">
                                    @error('nik')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nkk">nkk: </label>
                                <div class="form-group">
                                    <input id="nkk" type="number" placeholder="nomor induk keluarga" class="form-control"
                                        wire:model="nkk" name="nkk">
                                    @error('nkk')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nama">nama: </label>
                                <div class="form-group">
                                    <input id="nama" type="text" placeholder="nomor induk keluarga" class="form-control"
                                        wire:model="nama" name="nama">
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir">tempat lahir: </label>
                                <div class="form-group">
                                    <input id="tempat_lahir" type="text" placeholder="nomor induk keluarga" class="form-control"
                                        wire:model="tempat_lahir" name="tempat_lahir">
                                    @error('tempat_lahir')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir">tanggal lahir: </label>
                                <div class="form-group">
                                    <input id="tgl_lahir" type="date" placeholder="nomor induk keluarga" class="form-control"
                                        wire:model="tgl_lahir" name="tgl_lahir">
                                    @error('tgl_lahir')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat">alamat: </label>
                                <div class="form-group">
                                    <input id="alamat" type="text" placeholder="alamat rumah" class="form-control"
                                        wire:model="alamat" name="alamat">
                                    @error('alamat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="rt_rw">rt rw: </label>
                                <div class="form-group">
                                    <input id="rt_rw" type="text" placeholder="RT/RW" class="form-control"
                                        wire:model="rt_rw" name="rt_rw">
                                    @error('rt_rw')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="umur">umur: </label>
                                <div class="form-group">
                                    <input id="umur" type="number" placeholder="umur" class="form-control"
                                        wire:model="umur" name="umur">
                                    @error('umur')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" wire:click.prevent="updateAnggota()">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- modal hapus --}}
        <div wire:ignore.self class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel"  
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Anggota ({{ $nama }})</h5>
                    </div>
                    <form>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin menghapusnya?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger"
                                wire:click.prevent="deleteAdminDusun()">Iya,Saya Yakin!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        $('#form-checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('#editPassword').attr('type', 'text');
            } else {
                $('#editPassword').attr('type', 'password');
            }
        })

        window.livewire.on('tambahModal', () => {
            $('#tambahModal').modal('hide');
            $('.modal-backdrop').remove();
        });

        window.livewire.on('editModal', () => {
            $('#editModal').modal('hide');
            $('.modal-backdrop').remove();
        });

        window.livewire.on('hapusModal', () => {
            $('#hapusModal').modal('hide');
            $('.modal-backdrop').remove();
        });
    </script>
</div>
