<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        :root {
            --swiper-theme-color: #07213A !important;
        }
    </style>
</head>

<body class="antialiased font-['Manrope'] bg-[#07213A]">
    <div class="p-4 flex justify-center items-center h-screen">
        <div class="flex flex-col sm:flex-row w-full max-w-screen-lg bg-white shadow-md rounded-lg overflow-hidden">
            <div class="w-full sm:w-1/2 p-6 flex flex-col justify-center">
                <h1 class="text-white font-black text-3xl mb-6 "><span class="text-[#07213A]">Gayale</span><span class="text-[#F98538]">Corner</span></h1>
                <div class="w-full rounded-lg overflow-hidden">
                    {{ $slot }}
                </div>
            </div>
            <div class="relative w-full sm:w-1/2">
                <div class="swiper-container h-full">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="storage/photos/swiper (1).jpg" alt="Image 1" class="w-full aspect-square object-cover">
                        </div>
                        <div class="swiper-slide">
                            <img src="storage/photos/swiper (2).jpg" alt="Image 2" class="w-full aspect-square object-cover">
                        </div>
                        <div class="swiper-slide">
                            <img src="storage/photos/swiper (3).jpg" alt="Image 3" class="w-full aspect-square object-cover">
                        </div>
                    </div>
                    <div class="swiper-pagination absolute bottom-4 right-4"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            effect: 'fade',
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 3200,
            },
        });
    </script>

</body>

</html>