@extends('layouts.master-user')

@section('header_js')
@vite('resources/js/countUp.js')
@endsection

@section('body')
<!-- hero section -->
<div class="container" id="hero-section">
    <div class="flex flex-col md:justify-between md:flex-row-reverse items-center">
        <div class="w-full mt-8 px-2 md:px-4 md:mb-10">
            <img src="img/ilustrasi/beranda-ilustrasi.jpg" alt="ilustrasi kesehatan"
                class="my-3 mx-auto md:w-72 lg:w-96" />
        </div>
        <div class="w-full mt-4 mb-4 px-2 md:px-4 lg:px-16">
            <h1 class="text-[18px] font-['Poppins'] font-semibold md:text-2xl lg:text-4xl md:mb-6 lg:mb-12">
                Selamat Datang Di Website
                <span class="text-[#018CB5]">Posyandu</span> Desa Banjarsari
            </h1>
            <p class="font-['Poppins'] font-medium text-[10px] lg:text-base w-full mt-3">
                Website posyandu desa banjarsari ini menyediakan informasi
                kesehatan meliputi data balita, ibu hamil, lansia dan posbindu
                adapun dokumentasi kegiatan, jadwal kegiatan serta artikel
                kesehatan lainnya.
            </p>
            <div class="my-4 md:my-6 lg:my-8">
                <a href="/jadwal-kegiatan"
                    class="bg-[#018CB5] text-white font-['Poppins'] text-[10px] py-2 px-3 rounded md:text-base md:px-5">Lihat
                    Jadwal</a>
            </div>
        </div>
    </div>
</div>

<!-- second section -->
<div class="container mt-14" id="second-section">
    <div class="flex justify-center items-center">
        <h2 class="text-xl font-['Source_Sans_3'] font-semibold md:text-2xl lg:text-4xl">
            <span class="text-[#018CB5]">ePosyandu</span> Banjarsari
        </h2>
    </div>
    <div class="flex flex-wrap mt-16">
        <div class="w-1/2 flex flex-col justify-center items-center gap-5 lg:gap-10 mb-6 lg:w-1/4">
            <img src="img/icons/posyandu.svg" alt="" class="md:w-12 lg:w-14" />
            <p class="text-3xl font-semibold font-['Poppins'] lg:text-4xl" id="counter1">
                5
            </p>
            <p class="text-base font-semibold font-['Source_Sans_3'] text-[#ADADAD] md:text-xl">
                Total Posyandu
            </p>
        </div>
        <div class="w-1/2 flex flex-col justify-center items-center gap-5 lg:gap-10 mb-6 lg:w-1/4">
            <img src="img/icons/balita.svg" alt="" class="md:w-12 lg:w-14" />
            <p class="text-3xl font-semibold font-['Poppins'] lg:text-4xl text-[#018CB5]" id="counter2">
                200
            </p>
            <p class="text-base font-semibold font-['Source_Sans_3'] text-[#ADADAD] md:text-xl">
                Total Balita
            </p>
        </div>
        <div class="w-1/2 flex flex-col justify-center items-center gap-5 lg:gap-10 mb-6 lg:w-1/4">
            <img src="img/icons/ibu-hamil.svg" alt="" class="md:w-6 lg:w-7" />
            <p class="text-3xl font-semibold font-['Poppins'] lg:text-4xl" id="counter3">
                40
            </p>
            <p class="text-base font-semibold font-['Source_Sans_3'] text-[#ADADAD] md:text-xl">
                Total Ibu Hamil
            </p>
        </div>
        <div class="w-1/2 flex flex-col justify-center items-center gap-5 lg:gap-10 mb-6 lg:w-1/4">
            <img src="img/icons/lansia.svg" alt="" class="md:w-12 lg:w-14" />
            <p class="text-3xl font-semibold font-['Poppins'] lg:text-4xl text-[#018CB5]" id="counter4">
                89
            </p>
            <p
                class="text-base font-semibold font-['Source_Sans_3'] text-[#ADADAD] md:text-xl text-wrap w-3/4 text-center">
                Total Posbindu Lansia
            </p>
        </div>
    </div>
</div>

<!-- third section -->
<div class="container mt-14" id="third-section">
    <div class="w-full !bg-no-repeat !bg-cover !bg-center pb-4" style="background: url({{ asset('/img/beranda-jadwal.png') }})">
        <div class="flex flex-col justify-center items-center px-2 md:px-4">
            <h1 class="font-['Source_Sans_3'] font-semibold text-xl mt-4 md:mt-10 md:text-2xl lg:text-4xl">
                Jadwal Kegiatan
            </h1>
            <p class="text-[#018CB5] font-['Poppins'] font-medium text-[10px] mt-5 md:text-base">
                Berikut daftar jadwal kegiatan posyandu desa banjarsari.
            </p>

            <!-- list jadwal -->
            @forelse ($jadwals as $jadwal)
            <div class="bg-white rounded-lg px-2 py-2 shadow mt-6 md:px-6 md:py-4">
                
                <h5 class="font-['Poppins'] font-semibold text-[#1E5562] text-[8px] mb-1 md:text-base">
                {{ $jadwal->judul }}
                </h5>
                <p class="font-medium text-[#ADADAD] text-[8px] font-['Poppins'] md:text-sm">
                {{ $jadwal->deskripsi }}
                </p>
                <div
                    class="flex justify-between items-center mt-2 mb-1 md:mt-4 md:mb-2 md:justify-start md:gap-5">
                    <a href=""
                        class="bg-[#018CB5] rounded-full px-2 py-1 text-white text-[6px] font-['Poppins'] md:text-sm md:px-4 md:py-2">Lihat
                        Detail</a>
                    <div class="flex items-center gap-1">
                        <img src="img/icons/map-pin.svg" alt="" class="w-3 md:w-5" />
                        <p class="font-medium text-[#ADADAD] text-[8px] font-['Poppins'] md:text-sm">
                        {{ $jadwal->lokasi }}
                        </p>
                    </div>
                    <div class="flex items-center gap-1">
                        <img src="img/icons/clock.svg" alt="" class="w-3 md:w-5" />
                        <p class="font-medium text-[#ADADAD] text-[8px] font-['Poppins'] md:text-sm">
                        {{ $jadwal->birthdate }}
                        </p>
                    </div>
                </div>
                
            </div>
                @empty
                @endforelse 
           

            <a href="{{ route('jadwal_kegiatan') }}"
                class="flex gap-2 border border-2 border-black group hover:bg-black bg-transparent rounded-full px-3 py-0 items-center my-10 md:my-16 md:px-4 md:py-2">
                <span
                    class="font-['Poppins'] text-[8px] md:text-sm font-medium group-hover:text-white">Selengkapnya</span>
                <svg class="w-3 md:w-6 stroke-black group-hover:stroke-white" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 12H19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M12 5L19 12L12 19" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- last section -->
<div class="container" id="fourth-section">
    <div class="w-full h-full lg:h-screen pb-10 lg:pb-0 text-center">
        <h2 class="font-['Source_Sans_3'] font-semibold text-xl mt-4 md:mt-10 md:text-2xl lg:text-4xl">Dokumentasi</h2>
        <p class="text-[#018CB5] font-['Poppins'] font-medium text-[10px] mt-5 md:text-base">Berikut adalah foto dokumentasi ePosyandu desa benjarsari.</p>

        <div class="flex justify-center flex-wrap items-center px-5 mt-10 lg:px-20 lg:mt-20 gap-5">
        @forelse ($dokumentasimasters as $dokumentasimaster)
            <a href="{{ route('dokumentasi.detail', ['judul' => $dokumentasimaster->nama]) }}" class="relative flex justify-center items-center cursor-pointer border-4 border-gray-300 rounded md:w-3/4 lg:w-auto">
                @if ($dokumentasimaster->image)
                <img src="{{ asset('storage/' . $dokumentasimaster->image) }}" alt="" class="w-full lg:w-[340px]">
                @else
                No Image
                @endif
                <div class="absolute inset-0 bg-black opacity-40"></div>
                <div class="absolute m-auto left-0 right-0">
                    <h5 class="mb-1 sm:mb-2 text-white font-['Poppins'] font-semibold text-2xl md:text-[60px] lg:text-[40px] ">{{ $dokumentasimaster->nama }}</h5>
                    <p class="text-white font-['Poppins'] font-normal text-sm md:text-xl">{{ $dokumentasimaster->deskripsi }}</p>
                </div>
            </a>
            @empty
            @endforelse 
            <div class="w-full">
                <a href="{{ route('dokumentasi') }}"
                    class="flex w-fit mx-auto gap-2 border border-2 border-black group hover:bg-black bg-transparent rounded-full px-3 py-0 items-center my-10 md:my-16 md:px-4 md:py-2">
                    <span
                        class="font-['Poppins'] text-[8px] md:text-sm font-medium group-hover:text-white">Selengkapnya</span>
                    <svg class="w-3 md:w-6 stroke-black group-hover:stroke-white" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12H19" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 5L19 12L12 19" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            
        </div>
    </div>
    
</div>
@endsection
