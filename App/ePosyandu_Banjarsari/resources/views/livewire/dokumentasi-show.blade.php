<div>
    
@include('livewire.dokumentasimodal', ['kategoriOptions' => $kategoriOptions])
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dokumentasi</h3>
               <br>
               <br>
              
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">dokumentasi</li>
                    </ol>
                </nav>
            </div>
            <br>
            @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
               
                
            </div>
            
            <div class="card-body">
                <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#dokumentasiModal">Tambah data</button> 

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                           
                            <th>Judul</th>
                            
                            <th>Deskripsi</th>
                            <th>Foto Dokumentasi</th>
                            <th>Kategori</th>
                            <th>tanggal dibuat</th>
                            
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($dokumentasis as $dokumentasi)
                        <tr>
                                <td>{{ $dokumentasi->judul }}</td>
                                <td>
                                     @if ($dokumentasi->image)
                                         <img src="{{ asset('storage/' . $dokumentasi->image) }}" alt="" width="50" height="50">

                                        @else
                                            No Image
                                        @endif
                                </td>
                                <td>{{ $dokumentasi->deskripsi }}</td>
                                
                                
                                <td>{{ $dokumentasi->kategori }}</td>
                                <td>{{ $dokumentasi->birthdate }}</td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#updateDokumentasiModal" wire:click="editDokumentasi({{$dokumentasi->id}})" class="btn btn-warning btn-sm ">Ubah</button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteDokumentasiModal" wire:click="deleteDokumentasi({{$dokumentasi->id}})" class="btn btn-danger btn-sm">Hapus</button>
                                
                            </td>
                        </tr>
                        @empty
                                    <tr>
                                        <td colspan="5">No Record Found</td>
                                    </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                            {{ $dokumentasis->links() }}
                        </div>
            </div>
        </div>

    </section>

</div>