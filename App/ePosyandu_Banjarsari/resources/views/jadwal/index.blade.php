@extends('layouts.jadwal')
 
@section('content')
 
    <div>
        <livewire:jadwal-show>
    </div>
 
@endsection
 
@section('script')
<script>
    window.addEventListener('close-modal', event => {
 
        $('#jadwalModal').modal('hide');
        $('#updateJadwalModal').modal('hide');
        $('#deleteJadwalModal').modal('hide');
    })
</script>
@endsection