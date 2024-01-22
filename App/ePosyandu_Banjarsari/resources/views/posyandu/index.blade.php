@extends('layouts.posyandu')
 
@section('content')
 
    <div>
        <livewire:posyandu-show>
    </div>
 
@endsection
 
@section('script')
<script>
    window.addEventListener('close-modal', event => {
 
        $('#posyanduModal').modal('hide');
        $('#updatePosyanduModal').modal('hide');
        $('#deletePosyanduModal').modal('hide');
    })
</script>
@endsection