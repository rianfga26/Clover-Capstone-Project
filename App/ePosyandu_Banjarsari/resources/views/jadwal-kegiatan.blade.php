@extends('layouts.master-user')

@section('title', 'Jadwal Kegiatan - ePosyandu Banjarsari')
@section('body')

@if(session('schedules'))
    <?php $schedules = session('schedules') ?>
@elseif(session('posyandu'))
    <?php $posyandu = session('posyandu') ?>
@elseif(session('dusun'))
    <?php $dusun = session('dusun') ?>
@endif
{{-- sub menu --}}
<section id="subMenu" class="bg-cover w-full px-4 h-1/4 py-5 lg:py-7 lg:px-16" style="background: url({{ asset('img/bg-submenu.png') }})">
    <h1 class="font-['Poppins'] text-xl font-semibold md:text-[32px] lg:text-[40px]">Daftar Kegiatan Posyandu</h1>
    <div class="flex gap-2 mt-4">
        <a href="/" class="font-['Source_Sans_3'] text-sm font-medium text-[#00475C] hover:underline md:text-xl lg:text-[18px]">Beranda</a>
        <img src="img/icons/chevron-right.svg" alt="" class="w-3 md:w-5 lg:w-3">
        <span class="font-['Source_Sans_3'] text-sm font-normal md:text-xl lg:text-[18px]">Jadwal Kegiatan</span>
    </div>
</section>

{{-- list and form --}}
<section id="listGallery" class="mt-5 mb-10 md:mt-10 lg:mt-14">
    <div class="flex justify-between flex-wrap px-4 lg:px-16">
        <div class="w-full relative h-full border shadow-md md:w-1/4">
            <div class="bg-[#018CB5] text-center py-3 rounded-t">
                <h5 class="text-white font-['Source_Sans_3'] font-semibold text-base lg:text-xl">Filter Kegiatan</h5>
            </div>
            <form action="{{ route('filterJadwal') }}" method="post" class="py-6 px-4 flex flex-col items-center">
                @csrf
                <div class="mb-3 w-full">
                    <label for="namaDusun" class="font-['Poppins'] font-normal text-sm text-[#7E7E7E] lg:text-base">Nama Dusun:</label>
                    <select name="" id="namaDusun" class="w-full mt-2 font-normal font-['Poppins'] text-sm border py-2 px-2 rounded-sm">
                        @foreach ($dusun as $item)
                        <option selected>-Pilih Dusun-</option>
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('dusun') <span class="text-red-700 text-xs my-2">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3 w-full">
                    <label for="namaPosyandu" class="font-['Poppins'] font-normal text-sm text-[#7E7E7E] lg:text-base">Nama Posyandu:</label>
                    <select name="" id="namaPosyandu" class="w-full mt-2 font-normal font-['Poppins'] text-sm border py-2 px-2 rounded-sm">
                        @foreach ($posyandu as $items)
                        <option selected>-Pilih Posyandu-</option>
                        <option value="{{ $items->id }}">{{ $items->nama }}</option>
                        @endforeach
                    </select>
                    @error('posyandu') <span class="text-red-700 text-xs my-2">{{ $message }}</span> @enderror
                </div>
                
                <div class="mb-3 w-full">
                    <label for="namaKegiatan" class="font-['Poppins'] font-normal text-sm text-[#7E7E7E] lg:text-base">Nama Kegiatan:</label>
                    <textarea name="kegiatan" id="namaKegiatan" class="w-full mt-2 border px-1 font-['Poppins'] font-normal text-sm h-24">{{ old('kegiatan') }}</textarea>
                </div>
                <button type="submit" class="px-6 py-2 bg-[#018CB5] font-semibold font-['Poppins'] text-sm text-white rounded-sm">Temukan</button>
            </form>
        </div>
        <h3 class="mt-5 font-['Poppins'] font-semibold text-base text-[#7E7E7E] md:hidden">Hasil : </h3>
       
        <div class="w-full md:w-2/3 mt-3 md:mt-0">
             @forelse ($schedules as $schedule)
            <div class="bg-white rounded-lg px-2 py-2 border shadow mt-2 md:mt-0 md:px-6 md:py-4">
            
                <h5 class="font-['Poppins'] font-semibold text-[#1E5562] text-sm mb-1 md:text-base lg:text-xl">
                {{ $schedule->judul }}
                </h5>
                <p class="font-medium text-[#ADADAD] text-[10px] font-['Poppins'] md:text-sm md:mt-3">
                {{ $schedule->deskripsi }}
                </p>
                <div
                    class="flex justify-between items-center mt-2 mb-1 md:mt-4 md:mb-2 md:justify-start md:gap-5">
                   <a href="{{ route('jadwal_kegiatan.detail', ['judul' => $schedule->judul]) }}"
                        class="bg-[#018CB5] rounded-full px-2 py-1 text-white text-[8px] font-['Poppins'] md:px-4 md:py-2 md:text-sm">Lihat
                        Detail</a>
                    <div class="flex items-center gap-1">
                        <img src="img/icons/map-pin.svg" alt="" class="w-3 md:w-5" />
                        <p class="font-medium text-[#ADADAD] text-[8px] font-['Poppins'] md:text-[10px] lg:text-sm">
                        {{ $schedule->lokasi }}
                        </p>
                    </div>
                    <div class="flex items-center gap-1">
                        <img src="img/icons/clock.svg" alt="" class="w-3 md:w-5" />
                        <p class="font-medium text-[#ADADAD] text-[8px] font-['Poppins'] md:text-[10px] lg:text-sm">
                        {{ Carbon\Carbon::parse($schedule->tgl_awal)->translatedFormat('l, d F Y'); }} | {{ Carbon\Carbon::parse($schedule->tgl_awal)->translatedFormat('H:i'); }} WIB
                        </p>
                    </div>
                </div>

            </div>
            <br>
            @empty
            <p class="text-center font-['Poppins'] ">
                {{ session('empty') ? session('empty') : 'Data belum tersedia.'}}
            </p>
        @endforelse
        </div>
        
    </div>
</section>
@endsection
