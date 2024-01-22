<div>
    
@include('livewire.jadwalmodal')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Jadwal kegiatan</h3>
               <br>
               <br>
              
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jadwal dan kegiatan</li>
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
                <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#jadwalModal">Tambah data</button> 

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                           
                            <th>judul</th>
                            
                            <th>deskripsi</th>
                            <th>lokasi</th>
                            <th>tanggal dibuat</th>
                            
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($jadwals as $jadwal)
                        <tr>
                                <td>{{ $jadwal->judul }}</td>
                                <td>{{ $jadwal->deskripsi }}</td>
                                <td>{{ $jadwal->lokasi }}</td>
                                 <td>{{ $jadwal->birthdate }}</td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#updateJadwalModal" wire:click="editJadwal({{$jadwal->id}})" class="btn btn-warning btn-sm ">Ubah</button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteJadwalModal" wire:click="deleteJadwal({{$jadwal->id}})" class="btn btn-danger btn-sm">Hapus</button>
                                
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
                            {{ $jadwals->links() }}
                        </div>
            </div>
        </div>
        
    </section>

</div>