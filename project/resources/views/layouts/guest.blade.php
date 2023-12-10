<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --swiper-theme-color: #07213A !important;
        }
    </style>
</head>

<body class="antialiased font-['Manrope'] bg-[#07213A]">
    <div class="flex justify-center items-center h-screen">
        <!-- Container for Swiper and Login -->
        <div class="flex flex-col sm:flex-row w-full max-w-screen-lg bg-white shadow-md rounded-lg overflow-hidden">
            <!-- Login Form -->
            <div class="w-full sm:w-1/2 p-6 flex flex-col justify-center">
                <h1 class="text-white font-bold text-4xl mb-6"><span class="text-[#07213A]">Gayale</span><span class="text-[#F98538]">Corner</span></h1>
                <div class="w-full rounded-lg overflow-hidden">
                    {{ $slot }}
                </div>
            </div>

            <!-- Swiper Container with Pagination Inside -->
            <div class="relative w-full sm:w-1/2 max-h-screen">
                <div class="swiper-container h-full">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        <div class="swiper-slide">
                            <img src="storage/photos/swiper (1).jpg" alt="Image 1" class="w-full h-full object-cover">
                        </div>
                        <!-- Slide 2 -->
                        <div class="swiper-slide">
                            <img src="storage/photos/swiper (2).jpg" alt="Image 2" class="w-full h-full object-cover">
                        </div>
                        <!-- Slide 3 -->
                        <div class="swiper-slide">
                            <img src="storage/photos/swiper (3).jpg" alt="Image 3" class="w-full h-full object-cover">
                        </div>
                    </div>
                    <!-- Add Pagination Inside -->
                    <div class="swiper-pagination absolute bottom-4 right-4"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            effect: 'fade', // Set the fade effect
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 3200, // Set the delay in milliseconds (5 seconds)
            },
        });
    </script>

</body>

</html>