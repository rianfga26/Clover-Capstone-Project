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
    <section id="login">
        <form action="/login" method="post">
            @csrf
            <div class="flex">
            <div class="w-full bg-white px-5 pt-2 sm:px-10 h-screen sm:w-1/2">
                <a href="{{ route('beranda') }}" class="flex items-center gap-2" id="logo">
                    <img src="{{ asset('img/logo.png') }}" alt="">
                    <p class="font-['Source_Sans_3'] font-semibold text-[#018CB5] text-base md:text-xl">ePosyandu Banjarsari</p>
                </a>
                <div class="flex flex-col justify-start mt-20 px-5 md:w-3/4">
                    <h1 class="text-4xl text-[#032D23] font-['Source_Sans_3'] font-bold mb-3 md:text-5xl">Login</h1>
                    <div class="text-[#032D23] font-semibold text-lg font-['Source_Sans_3'] my-3">Masuk dengan akun anda yang sudah didaftarkan.</div>
                    <form action="" class="mt-5">
                        <input type="text" class="w-full border-2 mb-4 h-11 px-3 text-base text-[#032D23] border-[#032D23] rounded font-['Poppins'] focus:border-[#018CB5]" placeholder="Email" name="email">
                        @error('email')
                        <small style="color:red">{{ $message }}</small>
                        @enderror
                        <input type="password" class="w-full border-2 mb-4 h-11 px-3 text-base text-[#16201e] border-[#032D23] rounded font-['Poppins']" placeholder="Password" name="password">
                        @error('password')
                        <small style="color:red">{{ $message }}</small>
                        @enderror
                        <div class="flex items-center gap-2 mb-3">
                            <input type="checkbox" class="rounded w-4 border-2 hover:ring-offset-1 hover:ring-1" id="remember">
                            <label class="font-['Poppins']" for="remember">Remember me</label>
                        </div>
                        <button type="submit" class="w-full text-white font-['Poppins'] font-semibold py-3 rounded bg-[#032D23]">Login</button>
                    </form>
                    <a href="{{ route('forgot.pw') }}" class="text-[#018CB5] font-semibold font-['Poppins'] mx-auto mt-3 text-sm sm:text-base sm:mt-4">Forgot Password?</a>
                </div>
            </div>
            <div class="w-1/2 hidden sm:flex bg-[#F0F3FB] h-screen justify-center items-center mx-auto">
                <img src="{{ asset('img/ilustrasi/Tablet login-pana.png') }}" alt="" class="w-2/3 ">
            </div>
        </div>
        </form>
        
    </section>
</body>
</html>