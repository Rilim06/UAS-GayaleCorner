<!DOCTYPE html>
<html lang="en">

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
</head>

<body>
    <header class="header bg-white text-black fixed top-0 w-full z-50">
        <nav class="nav container ">
            <div class="nav__data">
                <a href="#" class="nav__logo ml-8">
                    <span class="text-[#282828] font-[800]">Gayale</span><span class="text-[#F98538] font-[800]">Corner</span>
                </a>
                <div class="nav__toggle mr-20 w-[40px]" id="nav-toggle">
                    <i class="ri-menu-line nav__burger"></i>
                    <i class="ri-close-line nav__close"></i>
                </div>
            </div>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list ">
                    @if ($user)
                    <li>
                        <form method="post" action="{{route('logout')}}" class="nav__link p-6">
                            @csrf
                            <button type='submit'>Logout</button>
                        </form>
                    </li>
                    @else
                    <li><a href='/login'>
                            <h1 class="nav__link font-[700] text-[#F98538] hover:text-white rounded-md bg-transparent hover:bg-[#F98538]">Login</h1>
                        </a></li>
                    <li><a href='/register'>
                            <h1 class="nav__link font-[700] bg-[#F98538] text-white lg:mr-2 mr-0 rounded-md hover:text-[#F98538] hover:bg-white" id="designregister">Register</h1>
                        </a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>
    <section class="h-5/6 flex items-center justify-center px-2 md:h-3/4 lg:h-screen">
        <div class="flex flex-col mt-40 lg:flex-row lg:items-center lg:mt-8 lg:px-8">
            <div class="kiri text-center lg:text-left">
                <h1 class="text-black font-bold text-3xl md:text-4xl 2xl:text-5xl">The Ultimate Destination for Your</h1>
                <h1 class="text-[#FE8A3B] font-bold text-3xl md:text-4xl 2xl:text-5xl">Fashion and Taste!</h1>
            </div>
            <div class="fotokanan flex justify-center items-center lg:mt-20">
                <img src="storage/photos/Layer_1.png" alt="" class="2xl:w-[30rem]">
            </div>
        </div>
    </section>
    <section class="h-max mt-8">
        <div class="text-center">
            <h1 class="text-4xl"><span class="text-[#282828] font-[800]">Why Choose Gayale</span><span class="text-[#F98538] font-[800]">Corner?</span></h1>
        </div>
        <div class="flex flex-col h-full mt-12 md:gap-12 md:mt-20 lg:grid lg:grid-cols-3 lg:h-min lg:px-8">
            <!-- Car Section -->
            <div class="md:w-full">
                <div class="items-center">
                    <div class="car-wrapper_inner">
                        <div class="car_outter">
                            <div class="car">
                                <div class="bodycar">
                                    <div class="isicar"></div>
                                </div>
                                <div class="decos">
                                    <div class="line-bot"></div>
                                    <div class="door">
                                        <div class="handle"></div>
                                        <div class="bottom"></div>
                                    </div>
                                    <div class="window"></div>
                                    <div class="light"></div>
                                    <div class="light-front"></div>
                                    <div class="antenna"></div>
                                </div>
                                <div class="ban">
                                    <div class="wheel"></div>
                                    <div class="wheel"></div>
                                </div>
                                <div class="windy">
                                    <div class="per per1"></div>
                                    <div class="per per2"></div>
                                    <div class="per per3"></div>
                                    <div class="per per4"></div>
                                    <div class="per per5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class=" flex justify-center pt-10 font-bold text-2xl  items-center">Flexible Delivery</h1>
                </div>
            </div>
            <div class="md:w-full mt-8 lg:mt-0">
                <div class="flex flex-col lg:h-full items-center justify-between">
                    <div class="milk-loader">
                        <div class="glass">
                            <div class="milk">
                                <h1 class="flex justify-center items-center text-center text-white text-3xl font-bold">%
                                </h1>
                            </div>
                        </div>
                    </div>
                    <h1 class="flex justify-center pt-10 font-bold text-2xl items-center">Best Price</h1>
                </div>
            </div>
            <div class="md:w-full">
                <div class="flex flex-col lg:h-full items-center justify-between text-center">
                    <div class="setiapjam flex justify-center mt-[-3rem] lg:mt-[-4rem]">
                        <svg preserveAspectRatio="xMidYMid meet" viewBox="0 0 187.3 93.7" height="300px" width="400px">
                            <path d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 				c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="4" fill="none" id="outline" stroke="#F98538"></path>
                            <path d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 				c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="4" stroke="#4E4FEB" fill="none" opacity="0.05" id="outline-bg"></path>
                        </svg>
                    </div>
                    <h1 class="text-center font-bold text-2xl mt-[-4rem]">Here For You 24/7</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="h-min items-center mt-8 md:mt-24 lg:pt-0 ">
        <div class="text-center">
            <h1 class="text-4xl"><span class="text-[#282828] font-[800]">Our </span><span class="text-[#F98538] font-[800]">Best </span><span class="text-[#282828] font-[800]">Product</span>
            </h1>
        </div>
        <div class="swiper topSwiper mt-12 aspect-square w-full rounded-xl px-2 lg:aspect-auto md:h-[40rem] lg:h-[20rem] lg:mt-8 xl:h-[25rem] 2xl:h-[30rem]">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img class="object-contain mx-auto aspect-square h-full rounded-xl" src="storage/photos/swiper (1).jpg" alt=""></div>
                <div class="swiper-slide"><img class="object-contain mx-auto aspect-square h-full rounded-xl" src="storage/photos/swiper (2).jpg" alt=""></div>
                <div class="swiper-slide"><img class="object-contain mx-auto aspect-square h-full rounded-xl" src="storage/photos/swiper (3).jpg" alt=""></div>
                <div class="swiper-slide"><img class="object-contain mx-auto aspect-square h-full rounded-xl" src="storage/photos/swiper (4).jpg" alt=""></div>
                <div class="swiper-slide"><img class="object-contain mx-auto aspect-square h-full rounded-xl" src="storage/photos/swiper (5).jpg" alt=""></div>
            </div>
            <div class="swiper-button-next drop-shadow-xl"></div>
            <div class="swiper-button-prev drop-shadow-xl"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <div class="wavekedua lg:h-[12vh] xl:h-[15vh] mt-10">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-[#f0f5ff]"></path>
        </svg>
    </div>
    <footer class="footer lg:py-12 xl:py-20 2xl:pb-24">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16 pl-0 md:pl-8 items-center">
            <div class="footer-col px-10">
                <h1 class="text-3xl md:text-5xl lg:text-3xl 2xl:text-4xl"><span class="text-white font-[800]">Gayale</span><span class="text-[#F98538] font-[800]">Corner</span></h1>
                <h5 class="text-xl mt-4 md:text-3xl lg:text-lg 2xl:text-2xl text-white">Many things. All in one
                </h5>
            </div>
            <div class="footer-col px-10">
                <h4 class="text-2xl md:text-4xl lg:text-2xl 2xl:text-3xl">Connect with Us</h4>
                <a href="https://wa.me/6287717955384" target="_blank">
                    <h5 class="text-white text-xl mt-2 md:text-3xl lg:text-lg 2xl:text-2xl">0877-1795-5384</h5>
                </a>
                <h5 class="text-white text-xl mt-2 md:text-3xl lg:text-lg 2xl:text-2xl">Bintaro, Tangerang Selatan</h5>
            </div>
            <div class="footer-col px-10">
                <h4 class="text-2xl md:text-4xl lg:text-2xl 2xl:text-3xl">Follow Us</h4>
                <div class="social-links text-xl mt-2 md:text-3xl lg:text-lg 2xl:text-2xl">
                    <a href="https://www.instagram.com/gayale_corner/" target="_blank"><i class="fab fa-instagram"></i>&nbsp;&nbsp;&nbsp;@gayale_corner</a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        var swiper = new Swiper(".topSwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        /*=============== SHOW MENU ===============*/
        const showMenu = (toggleId, navId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId)

            toggle.addEventListener('click', () => {
                nav.classList.toggle('show-menu')

                toggle.classList.toggle('show-icon')
            })
        }
        showMenu('nav-toggle', 'nav-menu')
    </script>
</body>

</html>