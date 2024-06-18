<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3 class="text-capitalize">Akun Admin Dusun </h3>
                <br>
                <br>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active text-capitalize" aria-current="page">Akun admin dusun</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">

            </div>

            <div class="card-body">
                <button type="button" class="btn btn-secondary btn-md my-4" data-bs-toggle="modal"
                    data-bs-target="#tambahModal" wire:click.prevent="clearForm">
                    Tambah Data
                </button>
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

                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Dusun</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item => $user)
                            <tr>
                                <td>{{ $users->firstItem() + $loop->index }}</td>
                                @if($user->dusun->isEmpty())
                                    <td>No Record Data</td>
                                @else
                                    <td>{{ $user->dusun[0]->nama }}</td>
                                @endif
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}/</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm"
                                        wire:click.prevent="detailAdminDusun({{ $user->id }})"
                                        data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#hapusModal"
                                        wire:click.prevent="detailAdminDusun({{ $user->id }})">Delete</button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $users->links('vendor.pagination.bootstrap-5') }}


            </div>
        </div>

        {{-- modal tambah --}}
        <div wire:ignore.self class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Admin Dusun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Pilih Dusun</label>
                                <select class="form-select" wire:model="dusun" name="dusun" id="inputGroupSelect01">
                                    <option selected="">Choose...</option>
                                    @foreach ($dusuns as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="username">Username: </label>
                                <div class="form-group">
                                    <input id="username" type="username" placeholder="Username" class="form-control"
                                        wire:model="username" name="username">
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email: </label>
                                <div class="form-group">
                                    <input id="email" type="email" placeholder="Email" class="form-control"
                                        wire:model="email" name="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password">Password: </label>
                                <div class="form-group">
                                    <input id="password" type="password" placeholder="Password" class="form-control"
                                        wire:model="password" name="password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="konfirmasi">Konfirmasi Password: </label>
                                <div class="form-group">
                                    <input id="konfirmasi" type="password" placeholder=""
                                        class="form-control @error('password_confirmation') is-invalid @enderror"name="password_confirmation"
                                        wire:model="password_confirmation">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" wire:click.prevent="saveAdminDusun()">Save
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
                        <h5 class="modal-title" id="exampleModalLabel">Edit Admin Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Pilih Dusun</label>
                                <select class="form-select" id="inputGroupSelect01" wire:model="dusun">
                                    <option selected="">Choose...</option>
                                    @foreach ($dusuns as $item)        
                                        <option value="{{ $item->id }}" {{ ($dusun == $item->id ? "selected":"") }} >{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="username">Username: </label>
                                <div class="form-group">
                                    <input id="username" type="username" placeholder="Username"
                                        class="form-control" wire:model="username" name="username">
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email: </label>
                                <div class="form-group">
                                    <input id="email" type="email" placeholder="Email" class="form-control"
                                        wire:model="email" name="email">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-1">
                                <label for="editPassword">Password: </label>
                                <div class="form-group">
                                    <input id="editPassword" type="password" placeholder="Password"
                                        class="form-control" wire:model="password" name="password">
                                    <small>Note: Password tak perlu diisi jika tidak ingin diganti.</small>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form-checkbox">
                                <label class="form-check-label text-sm" for="form-checkbox">
                                    Show Password
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"
                                wire:click.prevent="updateAdminDusun()">Save
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
                        <h5 class="modal-title" id="exampleModalLabel">Delete Admin Akun ({{ $username }})</h5>
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
