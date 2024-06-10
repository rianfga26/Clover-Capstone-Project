@extends('layouts.master-user')

@section('header_css')
<link rel="stylesheet" href="/vendor/ui-5.0.36/dist/fancybox/fancybox.css" />
@endsection


@section('footer_js')
<script src="/vendor/ui-5.0.36/dist/fancybox/fancybox.umd.js"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
  // Your custom options
});

</script>
@endsection

@section('body')
    <section id="subMenu" class="bg-cover w-full px-4 h-1/4 py-5 lg:py-7 lg:px-16"
        style="background: url({{ asset('img/bg-submenu.png') }})">
        <h1 class="font-['Poppins'] text-xl capitalize font-semibold md:text-[32px] lg:text-[40px]">{{ Str::slug($judul, ' ') }}</h1>
        <div class="flex gap-1 mt-4">
            <img src="{{ asset('img/icons/chevron-right.svg') }}" alt="" class="w-3 rotate-180 md:w-5 lg:w-3">
            <a href="/dokumentasi"
                class="font-['Source_Sans_3'] text-sm font-medium text-[#00475C] hover:underline md:text-xl lg:text-[18px]">Kembali</a>
        </div>
    </section>

    <section id="detail_dokumentasi" class="my-10">

        <div class="container" id="fourth-section">

            <div class="flex flex-wrap justify-center gap-5 px-5 sm:gap-10 md:px-16">
                @forelse ($dokumentasis as $dokumentasi)
                    <div class="shadow-2xl rounded-md px-3 py-3 w-full sm:w-2/5 lg:w-[300px] border">
                        <div class="border border-1 rounded p-5">
                            @if ($dokumentasi->image)
                                <a href="{{ asset('storage/' . $dokumentasi->image) }}" data-fancybox="gallery" data-caption="{{ $dokumentasi->deskripsi }}">
                                    <img src="{{ asset('storage/' . $dokumentasi->image) }}" alt=""
                                        class="rounded mt-2 w-full h-40 object-cover">
                                </a>
                                
                            @else
                                <img src="" alt="" class="w-full">
                            @endif
                        </div>
                        <hr>
                        <p class="font-['Poppins'] font-medium text-center capitalize text-[14px] mt-3 sm:text-base lg:text-xl">
                            {{ $dokumentasi->judul }}</p>

                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
@endsection

