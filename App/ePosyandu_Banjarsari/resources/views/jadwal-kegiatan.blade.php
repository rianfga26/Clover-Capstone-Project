@extends('layouts.master-user')

@section('body')
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
        <div class="w-full border shadow-md md:w-1/4">
            <div class="bg-[#018CB5] text-center py-3 rounded-t">
                <h5 class="text-white font-['Source_Sans_3'] font-semibold text-base lg:text-xl">Filter Kegiatan</h5>
            </div>
            <form action="" class="py-6 px-4 flex flex-col items-center">
                <div class="mb-3 w-full">
                    <label for="namaDusun" class="font-['Poppins'] font-normal text-sm text-[#7E7E7E] lg:text-base">Nama Dusun:</label>
                    <select name="" id="namaDusun" class="w-full mt-2 font-normal font-['Poppins'] text-sm border py-2 px-2 rounded-sm">
                        
                        <option selected>-Pilih Dusun-</option>
                        @foreach ($dusun as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 w-full">
                    <label for="namaPosyandu" class="font-['Poppins'] font-normal text-sm text-[#7E7E7E] lg:text-base">Nama Posyandu:</label>
                    <select name="" id="namaPosyandu" class="w-full mt-2 font-normal font-['Poppins'] text-sm border py-2 px-2 rounded-sm">
                        
                        <option selected>-Pilih Posyandu-</option>
                        @foreach ($posyandu as $items)
                        <option value="{{ $items->id }}">{{ $items->nama }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3 w-full">
                    <label for="namaKegiatan" class="font-['Poppins'] font-normal text-sm text-[#7E7E7E] lg:text-base">Nama Kegiatan:</label>
                    <textarea name="" id="namaKegiatan" class="w-full mt-2 border px-1 font-['Poppins'] font-normal text-sm"></textarea>
                </div>
                <button class="px-6 py-2 bg-[#018CB5] font-semibold font-['Poppins'] text-sm text-white rounded-sm">Temukan</button>
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
                        {{ $schedule->tgl_awal }}
                        </p>
                    </div>
                </div>

            </div>
            <br>
            @empty
        @endforelse
        </div>
        
    </div>
</section>
@endsection
