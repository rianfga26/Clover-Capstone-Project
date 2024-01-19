
@include('livewire.posyandumodal')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Posyandu</h3>
               <br>
               <br>
              
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Posyandu</li>
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
                <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#posyanduModal">Tambah data</button> 

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                           
                            <th>nama</th>
                            
                            <th>deskripsi</th>
                            <th>tanggal dibuat</th>
                            
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($posyandus as $posyandu)
                        <tr>
                                <td>{{ $posyandu->nama }}</td>
                                <td>{{ $posyandu->deskripsi }}</td>
                                 <td>{{ $posyandu->birthdate }}</td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#updatePosyanduModal" wire:click="editPosyandu({{$posyandu->id}})" class="btn btn-warning btn-sm ">Ubah</button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#deletePosyanduModal" wire:click="deletePosyandu({{$posyandu->id}})" class="btn btn-danger btn-sm">Hapus</button>
                                
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
                            {{ $posyandus->links() }}
                        </div>
            </div>
        </div>

    </section>
