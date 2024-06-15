@extends('layouts.master-user')

@section('title', Str::slug($judul, ' ').' - ePosyandu Banjarsari')
@section('body')
<section id="subMenu" class="bg-cover w-full px-4 h-1/4 py-5 lg:py-7 lg:px-16" style="background: url({{ asset('img/bg-submenu.png') }})">
    <h1 class="font-['Poppins'] text-xl font-semibold md:text-[32px] lg:text-[40px] capitalize">{{ Str::slug($judul, ' ') }}</h1>
    <div class="flex gap-1 mt-4">
        <img src="{{ asset('img/icons/chevron-right.svg') }}" alt="" class="w-3 rotate-180 md:w-5 lg:w-3">
        <a href="/jadwal-kegiatan" class="font-['Source_Sans_3'] text-sm font-medium text-[#00475C] hover:underline md:text-xl lg:text-[18px]">Kembali</a>
    </div>
</section>

<section id="detailKegiatan" class="mt-10 mb-5 px-4 md:px-12">

    <div class="flex flex-wrap items-center gap-5 md:gap-3 border rounded shadow-lg px-4 py-4">
    
        <div class="flex justify-between items-center gap-2 w-full">
            <div class="flex items-center gap-1">
                <img src="img/icons/user.svg" alt="" class="w-4 md:w-5" />
                <p class="font-medium text-[10px] font-['Poppins'] capitalize md:text-base lg:text-sm">
                    {{ $schedule->user->username }} | {{ $schedule->user->tipe_admin == 'utama' ? 'admin posyandu' : 'admin dusun' }}
                </p>
            </div>
            <div class="flex items-center gap-1">
                <img src="img/icons/calendar.svg" alt="" class="w-4 md:w-5">
                <p class="font-medium text-[10px] font-['Poppins'] md:text-base lg:text-sm">
                @if($schedule->created_at != $schedule->updated_at)
                Diubah: {{ Carbon\Carbon::parse($schedule->updated_at)->diffForHumans() }}
                @else
                {{ Carbon\Carbon::parse($schedule->created_at)->diffForHumans() }}
                @endif
                </p>
            </div>
        </div>
        <hr class="w-full rounded">

        <!-- content -->
        <div class="flex justify-between flex-wrap">
            <div class="flex flex-wrap items-center gap-2 mb-2 sm:my-4 md:w-1/2">
                <h5 class="font-['Poppins'] font-semibold text-sm text-[#5B5858] md:text-xl md:w-full lg:text-2xl ">Nama Kegiatan:</h5>
                <p class="font-['Poppins'] font-normal text-sm text-[#5B5858] md:text-base ">{{ $schedule->judul }}</p>
            </div>
            <div class="flex flex-wrap gap-2 mb-2 sm:my-4 md:w-1/2 md:justify-end">
                <h5 class="font-['Poppins'] font-semibold text-sm text-[#5B5858] md:text-xl md:w-full lg:text-2xl md:text-right">Tanggal Kegiatan:</h5>
                <p class="font-['Poppins'] font-normal text-sm text-[#5B5858] md:text-base">{{ Carbon\Carbon::parse($schedule->tgl_awal)->translatedFormat('l, d F Y') }}</p>
                <div class="w-full text-right">
                    <p class="font-['Poppins'] font-normal text-sm text-[#5B5858] md:text-base">Waktu: {{ Carbon\Carbon::parse($schedule->tgl_awal)->translatedFormat('H:i'); }} WIB - {{ Carbon\Carbon::parse($schedule->tgl_akhir)->translatedFormat('H:i'); }} WIB</p> 
                </div>
            </div>
            <div class="flex flex-wrap items-center gap-2 mb-2 sm:my-4 md:w-1/2">
                <h5 class="font-['Poppins'] font-semibold text-sm text-[#5B5858] md:text-xl md:w-full lg:text-2xl">Lokasi Kegiatan:</h5>
                <p class="font-['Poppins'] font-normal text-sm text-[#5B5858] md:text-base">{{ $schedule->lokasi }}</p>
            </div>
            <div class="flex flex-wrap gap-2 mb-2 sm:my-4 md:w-1/2 md:justify-end">
                <h5 class="font-['Poppins'] font-semibold text-sm text-[#5B5858] md:text-xl md:w-full lg:text-2xl md:text-right">Nama Posyandu:</h5>
                <p class="font-['Poppins'] font-normal text-sm text-[#5B5858] md:text-base">{{ $schedule->posyandu->nama }}</p>
            </div>
            <hr class="my-3 w-full">
            <div class="flex flex-wrap items-center gap-2 mb-2 sm:my-4">
                <h5 class="font-['Poppins'] font-semibold text-sm text-[#5B5858] md:text-xl md:w-full lg:text-2xl">Informasi Kegiatan:</h5>
                <p class="font-['Poppins'] font-normal text-sm text-[#5B5858] md:text-base"> {{ $schedule->deskripsi }}</p>
            </div>
        </div>
        
        <!-- end content -->
    </div>
  
</section>

@endsection