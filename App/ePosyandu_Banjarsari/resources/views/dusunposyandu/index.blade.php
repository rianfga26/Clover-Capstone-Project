@extends('layouts.dusun')
 
@section('content')
 
    <div>
        <livewire:dusunposyandu-show>
    </div>
 
@endsection
 
@section('script')
<script>
    window.addEventListener('close-modal', event => {
 
        $('#dusunposyanduModal').modal('hide');
        $('#updateDusunposyanduModal').modal('hide');
        $('#deleteDusunposyanduModal').modal('hide');
    })
</script>
@endsection