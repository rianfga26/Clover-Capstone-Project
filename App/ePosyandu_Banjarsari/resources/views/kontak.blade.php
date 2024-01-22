@extends('layouts.master-user')

@section('body')
<section id="subMenu" class="bg-cover w-full px-4 h-1/4 py-5 lg:py-7 lg:px-16" style="background: url({{ asset('img/bg-submenu.png') }})">
    <h1 class="font-['Poppins'] text-xl font-semibold md:text-[32px] lg:text-[40px]">Kontak Kami</h1>
    <div class="flex gap-1 mt-4">
        <a href="" class="font-['Source_Sans_3'] text-sm font-medium text-[#00475C] hover:underline md:text-xl lg:text-[18px]">Beranda</a>
        <img src="img/icons/chevron-right.svg" alt="" class="w-3 md:w-5 lg:w-3">
        <span class="font-['Source_Sans_3'] text-sm font-medium md:text-xl lg:text-[18px]">Kontak</span>
    </div>
</section>

<section id="kontakKami" class="my-10">
    <div class="container">
     <iframe class="w-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.5783398827275!2d112.58050997410663!3d-7.174641892830224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e77ff98097b5e1f%3A0x86d4a7fd729d352e!2sJl.%20Raya%20Banjarsari%20No.1%2C%20Banjai%20Sari%2C%20Banjarsari%2C%20Kec.%20Cerme%2C%20Kabupaten%20Gresik%2C%20Jawa%20Timur%2061171!5e0!3m2!1sid!2sid!4v1704706841461!5m2!1sid!2sid" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


     <div class="shadow-2xl py-4 px-4 mx-5 mt-10 rounded sm:border sm:px-4 md:px-10">
          <div class="flex flex-wrap justify-center break-all items-center md:gap-10 sm:justify-between">

             <!-- Lokasi -->
              <div class="flex items-center gap-4 w-full my-5 sm:w-1/3 md:w-auto lg:w-1/3">
                  <img src="img/icons/location.svg" alt="" class="border border-[#2998FF] rounded-full p-1">
                  <div>
                      <h5 class="font-['Poppins'] font-semibold text-base mb-2 md:text-xl">Lokasi :</h5>
                      <p class="font-['Poppins'] font-reguler text-sm md:text-base">Jl. Raya Banjarsari No. 001 Desa Banjarsari Kec. Cerme Kab. Gresik, 61171</p>
                  </div>
              </div>

              <!-- Telp -->
              <div class="flex items-center gap-4 w-full my-5 sm:w-auto sm:order-last lg:order-none">
                  <img src="img/icons/mobile.svg" alt="" class="border border-[#2998FF] rounded-full p-1">
                  <div>
                      <h5 class="font-['Poppins'] font-semibold text-base mb-2 md:text-xl">Telp :</h5>
                      <p class="font-['Poppins'] font-reguler text-sm md:text-base">0317990941</p>
                  </div>
              </div>

              <!-- Email -->
              <div class="flex items-center gap-4 w-full my-5 sm:w-auto">
                 <img src="img/icons/sms.svg" alt="" class="border border-[#2998FF] rounded-full p-1">
                 <div class="min-w-0">
                     <h5 class="font-['Poppins'] font-semibold text-base mb-2 md:text-xl">Email :</h5>
                     <div class="font-['Poppins'] font-reguler text-sm break-words md:text-base">Banjarsari61171cerme@gmail.com</div>
                 </div>
             </div>
          </div>
         </div>
    </div>
 </section>
@endsection