<div class="page-heading">
    
@include('livewire.dusunposyandumodal')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dusun dan Posyandu</h3>
               <br>
               <br>
              
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dusun dan Posyandu</li>
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
                <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#dusunposyanduModal">Tambah data</button> 

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                           
                            <th>posyandu</th>
                            
                            <th>dusun</th>
                            <th>tanggal dibuat</th>
                            
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($dusunposyandus as $dusunposyandu)
                        <tr>
                                <td>{{ $dusunposyandu->posyandu }}</td>
                                <td>{{ $dusunposyandu->dusun }}</td>
                                 <td>{{ $dusunposyandu->birthdate }}</td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#updateDusunposyanduModal" wire:click="editDusunposyandu({{$dusunposyandu->id}})" class="btn btn-warning btn-sm ">Ubah</button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteDusunposyanduModal" wire:click="deleteDusunposyandu({{$dusunposyandu->id}})" class="btn btn-danger btn-sm">Hapus</button>
                                
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
                            {{ $dusunposyandus->links() }}
                        </div>
            </div>
        </div>

    </section>
    <script>
        window.addEventListener('close-modal', event => {
     
            $('#dusunposyanduModal').modal('hide');
            $('#updateDusunposyanduModal').modal('hide');
            $('#deleteDusunposyanduModal').modal('hide');
            $('.modal-backdrop').remove();
            $('.modal-backdrop').remove();
        })
    </script>
</div>