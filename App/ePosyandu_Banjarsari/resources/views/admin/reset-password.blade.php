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
    
    {{-- JS --}}
    @vite('resources/js/app.js')
</head>

<body>
    <section id="resetPassword">
            <div class="w-full flex flex-col justify-center items-center mx-auto bg-white pt-2 h-4/5 sm:px-10 sm:w-1/2">
                <div class="w-full">
                    <a href="{{ route('beranda') }}" class="flex items-center gap-2" id="logo">
                        <img src="{{ asset('img/logo.png') }}" alt="">
                        <p class="font-['Source_Sans_3'] font-semibold text-[#018CB5] text-base md:text-xl">ePosyandu Banjarsari</p>
                    </a>
                </div>
                <div class="flex flex-col justify-center items-center mt-20 px-5 md:w-3/4">
                    <h1 class="text-4xl text-[#032D23] font-['Source_Sans_3'] font-bold mb-3 md:text-5xl">Reset Password</h1>
                    <div class="text-[#032D23] font-semibold text-lg font-['Source_Sans_3'] my-3 rounded">Silahkan membuat password baru.</div>
                    @error('email')  
                    <div class="w-full text-red-600 font-['Source_Sans_3'] p-3 bg-red-300 rounded">
                        {{ $message }}
                    </div>
                    @enderror
                    <form action="{{ route('password.update') }}" method="post" class="mt-5">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="email" class="w-full border-2 mb-1 h-11 px-3 text-base text-[#16201e] border-[#032D23] rounded font-['Poppins']" placeholder="Masukkan email yang terdaftar" name="email" value="{{ old('email') }}">
                        @error('email')
                        <small style="color:red">{{ $message }}</small>
                        @enderror
                        <input type="password" class="w-full border-2 mb-1 mt-2 h-11 px-3 text-base text-[#16201e] border-[#032D23] rounded font-['Poppins']" placeholder="Masukkan Password Baru" name="password">
                        @error('password')
                        <small style="color:red">{{ $message }}</small>
                        @enderror
                        <input type="password" class="w-full border-2 mb-4 mt-2 h-11 px-3 text-base text-[#16201e] border-[#032D23] rounded font-['Poppins']" placeholder="Konfirmasi Password" name="password_confirmation">

                        <button type="submit" class="w-full text-white font-['Poppins'] font-semibold py-3 rounded bg-[#032D23]">Kirim</button>
                    </form>
                </div>
            </div>
    </section>
</body>
</html>