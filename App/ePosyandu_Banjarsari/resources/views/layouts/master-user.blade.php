<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fonts CDN-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Source+Sans+3:wght@400;600;700&display=swap"
        rel="stylesheet" />

    <!-- CSS -->
    @vite('resources/css/app.css')
    @yield('header_css')
    
    {{-- JS --}}
    @yield('header_js')
    @vite('resources/js/app.js')
</head>

<body>
    <!-- navbar -->
    <nav class="lg:py-4 pt-2 w-full bg-white z-[999]" x-data="{ top: true, open: false }"
    @scroll.window="top = (window.pageYOffset > 50) ? false : true" x-bind:class="!top ? 'fixed shadow-lg' : ''">
        <div class="container">
        <div class="w-full lg:flex lg:justify-between lg:items-center">
            <div class="flex items-center lg:gap-3 gap-1 px-2 md:px-4 lg:px-16">
                <img src="{{ asset('img/logo.png') }}" alt="" class="w-7 lg:w-10" />
                <p class="text-[#018CB5] font-['Source_Sans_3'] font-bold text-sm lg:text-base">
                    ePosyandu
                    <span class="text-black font-['Source_Sans_3']">Banjarsari</span>
                </p>
                <template x-if="!open">
                    <img src="{{ asset('img/icons/hamburger.svg') }}" alt="" class="w-6 ml-auto lg:hidden"
                        @click="open = ! open" />
                </template>
                <template x-if="open">
                    <img src="{{ asset('img/icons/hamburger-close.svg') }}" alt="" class="w-6 ml-auto lg:hidden"
                        @click="open = ! open" />
                </template>
            </div>

            <hr class="border-t-[1.5px] mt-2 shadow-lg lg:hidden" />

            <!-- Desktop -->

            <div class="gap-9 items-center pt-3 px-2 lg:px-16 bg-white relative py-2 hidden lg:flex">
                <a href="{{ route('beranda') }}"
                    class="font-semibold lg:text-[18px] text-sm font-['Source_Sans_3'] cursor-pointer">Beranda</a>
                <a href="{{ route('jadwal_kegiatan') }}" class="font-semibold lg:text-[18px] text-sm font-['Source_Sans_3'] cursor-pointer">Jadwal
                    Kegiatan</a>
                <a href="{{ route('dokumentasi') }}"
                    class="font-semibold lg:text-[18px] text-sm font-['Source_Sans_3'] cursor-pointer">Dokumentasi</a>
                <a href="{{ route('kontak') }}"
                    class="text-center font-semibold text-base font-['Source_Sans_3'] cursor-pointer border border-2 border-[#1E5562] rounded-full py-2 px-5 hover:bg-[#1E5562] hover:text-white">Kontak
                    Kami</a>
            </div>

            <!-- Mobile & Tablet -->

            <div class="flex flex-col gap-5 pt-3 px-2 bg-white py-2 absolute w-full shadow-md lg:hidden md:px-4 z-[999]"
                x-show="open" x-transition.origin.top.duration.300ms @click.outside="open = !open">
                <a href="{{ route('beranda') }}"
                    class="font-semibold lg:text-[18px] text-sm font-['Source_Sans_3'] cursor-pointer inline">Beranda</a>
                <a href="{{ route('jadwal_kegiatan') }}" class="font-semibold lg:text-[18px] text-sm font-['Source_Sans_3'] cursor-pointer">Jadwal
                    Kegiatan</a>
                <a href="{{ route('dokumentasi') }}"
                    class="font-semibold lg:text-[18px] text-sm font-['Source_Sans_3'] cursor-pointer">Dokumentasi</a>
                <a href="{{ route('kontak') }}"
                    class="text-center font-semibold text-base font-['Source_Sans_3'] cursor-pointer border border-2 border-[#1E5562] rounded-full py-2 px-5 hover:bg-[#1E5562] hover:text-white md:w-1/4">Kontak
                    Kami</a>
            </div>
        </div>
        </div>
    </nav>

    <main>
        @yield('body')
    </main>

    <!-- footer -->
    <footer class="w-full bg-[#2F2F2F] lg:mt-36">
        <div class="container py-8 mx-auto">
            <!-- logo -->
            <div class="flex justify-center items-center gap-6 mb-10">
                <img src="{{ asset('img/logo.png') }}" alt="" class="w-9 md:w-12 lg:w-12" />
                <div class="text-white text-base sm:text-xl font-['Source_Sans_3'] font-bold">
                    ePosyandu <br />
                    DESA BANJARSARI
                </div>
            </div>

            <!-- caption -->
            <div class="w-full mx-auto sm:w-3/4">
                <div
                    class="flex flex-col justify-center items-center sm:flex-row sm:gap-8">
                    <div
                        class="text-center sm:text-left w-3/4 sm:w-1/2 md:w-1/3 text-sm sm:text-base font-semibold text-white">
                        Jalan Raya Banjarsari Nomor 001 Desa Banjarsari Kecamatan Cerme
                        Kabupaten Gresik, 61171 Kecamatan Cerme, Kabupaten Gresik - Jawa
                        Timur 61171
                    </div>
                    <div class="border-r-2 border-white h-28 hidden sm:block"></div>
                    <div class="w-full sm:w-1/3 lg:py-3 md:py-3 pt-10">
                        <!-- Telepon -->
                        <div class="gap-3 hidden sm:flex mb-4">
                            <img src="img/icons/telepon.svg" alt="" class="w-6" />
                            <p class="text-base font-semibold text-white">
                                Telp. 0317990941
                            </p>
                        </div>

                        <!-- Mobile -->
                        <div class="flex flex-col items-center sm:hidden gap-3">
                            <div class="flex items-center gap-2">
                                <img src="img/icons/telepon.svg" alt="" class="w-6" />
                                <p class="text-white text-base font-semibold">Telepon</p>
                            </div>
                            <p class="text-base font-normal text-white">
                                <a href="tel:0317990941" class="underline">0317990941</a>
                            </p>
                        </div>

                        <!-- Email -->
                        <div class="gap-3 hidden sm:flex">
                            <img src="img/icons/email.svg" alt="" class="w-6" />
                            <p class="text-base font-semibold text-white">
                                Email <br />
                                <a href="mailto:Banjarsari61171cerme@gmail.com"
                                    class="underline break-words">banjarsari61171cerme@gmail.com</a>
                            </p>
                        </div>

                        <!-- Mobile -->
                        <div class="flex flex-col items-center mt-3 sm:hidden gap-3">
                            <div class="flex items-center gap-2">
                                <img src="img/icons/email.svg" alt="" class="w-6" />
                                <p class="text-white text-base font-semibold">Email</p>
                            </div>
                            <p class="text-base font-normal text-white">
                                <a href="mailto:Banjarsari61171cerme@gmail.com"
                                    class="underline">Banjarsari61171cerme@gmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @yield('footer_js')
</body>

</html>