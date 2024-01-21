@extends('layouts.dokumentasimaster')
 

@section('content')
 
    <div>
        <livewire:dokumentasimaster-show>
    </div>
 
@endsection
 
@section('script')
<script>
    window.addEventListener('close-modal', event => {
 
        $('#dokumentasimasterModal').modal('hide');
        $('#updateDokumentasimasterModal').modal('hide');
        $('#deleteDokumentasimasterModal').modal('hide');
    })
</script>
@endsection