@extends('layouts.master-user')

@section('body')
    <section id="subMenu" class="bg-cover w-full px-4 h-1/4 py-5 lg:py-7 lg:px-16"
        style="background: url({{ asset('img/bg-submenu.png') }})">
        <h1 class="font-['Poppins'] text-xl font-semibold md:text-[32px] lg:text-[40px]">Dokumentasi Posyandu</h1>
        <div class="flex gap-1 mt-4">
            <a href="/"
                class="font-['Source_Sans_3'] text-sm font-medium text-[#00475C] hover:underline md:text-xl lg:text-[18px]">Beranda</a>
            <img src="img/icons/chevron-right.svg" alt="" class="w-3 md:w-5 lg:w-3">
            <span class="font-['Source_Sans_3'] text-sm font-medium md:text-xl lg:text-[18px]">Dokumentasi</span>
        </div>
    </section>

    <section id="dokumentasiPosyandu" class="">
        <div class="container" id="fourth-section">
            <div class="w-full h-full pb-10 text-center">
                <div class="flex justify-start flex-wrap items-center px-5 mt-10 lg:px-20 lg:mt-20 gap-5">
                    @forelse ($dokumentasimasters as $dokumentasimaster)
                        <a href="{{ route('dokumentasi.detail', ['judul' => $dokumentasimaster->nama]) }}"
                            class="relative flex justify-center items-center cursor-pointer border-4 border-gray-300 rounded sm:w-3/4 sm:w-auto">
                            @if ($dokumentasimaster->image)
                                <img src="{{ asset('storage/' . $dokumentasimaster->image) }}" alt=""
                                    class="w-full object-cover sm:w-[260px] lg:w-[300px] lg:h-[200px]">
                            @else
                                <img src="" alt="">
                            @endif
                            <div class="absolute inset-0 bg-black opacity-40"></div>
                            <div class="absolute m-auto left-0 right-0">
                                <h5
                                    class="mb-2 text-white font-['Poppins'] font-semibold text-2xl sm:text-[25px] lg:text-[40px] ">
                                    {{ $dokumentasimaster->nama }}</h5>
                                <p class="text-white font-['Poppins'] font-normal text-sm">
                                    {{ $dokumentasimaster->deskripsi }}</p>
                            </div>
                        </a>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
