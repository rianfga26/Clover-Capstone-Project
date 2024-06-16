<div class="page-heading">
    
@include('livewire.dokumentasimastermodal')
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
                <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#dokumentasimasterModal">Tambah data</button> 

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                           
                            <th>No</th>
                            <th>Nama</th>
                            
                            <th>Deskripsi</th>
                            <th>Foto Dokumentasi</th>
                            <th>tanggal dibuat</th>
                            
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($dokumentasimasters as $dokumentasimaster)
                        <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dokumentasimaster->nama }}</td>
                                <td>{{ $dokumentasimaster->deskripsi }}</td>
                                <td>
                                     @if ($dokumentasimaster->image)
                                         <img src="{{ asset('storage/' . $dokumentasimaster->image) }}" alt="" width="50" height="50">

                                        @else
                                            No Image
                                        @endif
                                </td>
                                 <td>{{ date('d/m/Y', strtotime($dokumentasimaster->created_at)) }}</td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#updateDokumentasimasterModal" wire:click="editDokumentasimaster({{$dokumentasimaster->id}})" class="btn btn-warning btn-sm ">Ubah</button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteDokumentasimasterModal" wire:click="deleteDokumentasimaster({{$dokumentasimaster->id}})" class="btn btn-danger btn-sm">Hapus</button>
                                
                            </td>
                        </tr>
                        @empty
                                    <tr>
                                        <td colspan="6">No Record Found</td>
                                    </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                            {{ $dokumentasimasters->links() }}
                        </div>
            </div>
        </div>

    </section>
    <script>
        window.addEventListener('close-modal', event => {
            $('#dokumentasimasterModal').modal('hide');
            $('#updateDokumentasimasterModal').modal('hide');
            $('#deleteDokumentasimasterModal').modal('hide');
            $('.modal-backdrop').remove();
            $('.modal-backdrop').remove();
        })
    </script>
</div>