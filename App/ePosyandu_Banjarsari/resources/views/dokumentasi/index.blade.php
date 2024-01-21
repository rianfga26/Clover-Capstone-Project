@extends('layouts.dokumentasi')
 

@section('content')
 
    <div>
        <livewire:dokumentasi-show>
    </div>
 
@endsection
 
@section('script')
<script>
    window.addEventListener('close-modal', event => {
 
        $('#dokumentasiModal').modal('hide');
        $('#updateDokumentasiModal').modal('hide');
        $('#deleteDokumentasiModal').modal('hide');
    })
</script>
@endsection