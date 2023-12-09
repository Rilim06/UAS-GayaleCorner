<head>
    @vite('resources/css/app.css')
    @vite('resources/css/index.css')
    @vite('resources/css/navbar.css')
    @vite('resources/js/index.js')
    <script src="../../js/index.js"></script>
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
                    <!-- <li class="dropdown__item">
                        <div class="nav__link">
                            Analytics <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <ul class="dropdown__menu">
                            <li>
                                <a href="#" class="dropdown__link">
                                    <i class="ri-pie-chart-line"></i> Overview
                                </a>
                            </li>

                            <li>
                                <a href="#" class="dropdown__link">
                                    <i class="ri-arrow-up-down-line"></i> Transactions
                                </a>
                            </li>

                            <li class="dropdown__subitem">
                                <div class="dropdown__link">
                                    <i class="ri-bar-chart-line"></i> Reports <i class="ri-add-line dropdown__add"></i>
                                </div>

                                <ul class="dropdown__submenu">
                                    <li>
                                        <a href="#" class="dropdown__sublink">
                                            <i class="ri-file-list-line"></i> Documents
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="dropdown__sublink">
                                            <i class="ri-cash-line"></i> Payments
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="dropdown__sublink">
                                            <i class="ri-refund-2-line"></i> Refunds
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->

                    <!-- <li><a href="#" class="nav__link">Products</a></li> -->
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
                    <!-- <li><a href="#" class="nav__link">Contact</a></li> -->
                </ul>
            </div>
        </nav>
    </header>
    <section class="h-screen flex items-center justify-center">
        <div class="flex flex-col lg:flex-row ">
            <div class="kiri lg:text-left text-center pt-40 lg:pt-40">
                <h1 class="text-black font-bold text-5xl px-20">The Ultimate Destination for Your</h1>
                <h1 class="text-[#FE8A3B] font-bold text-5xl px-20">Fashion and Taste!</h1>
            </div>
            <div class="fotokanan flex justify-center items-center pt-0 lg:pt-20">
                <img src="storage/photos/Layer_1.png" alt="" class="w-[50%] lg:w-[80%]">
            </div>
        </div>
    </section>
    <section class="h-screen items-center ">
        <div class="text-center">
            <h1 class="text-5xl"><span class="text-[#282828] font-[800]">Why Choose Gayale</span><span class="text-[#F98538] font-[800]">Corner?</span></h1>
        </div>
        <div class="flex flex-col lg:flex-row pt-20 ">
            <div class="car-wrapper">
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
            <div class="items-center pt-32 lg:pt-0">
                <div class="milk-loader">
                    <div class="glass">
                        <div class="milk">
                            <h1 class="flex justify-center items-center text-center text-white text-3xl font-bold">%</h1>
                        </div>
                    </div>
                </div>
                <h1 class="flex justify-center pt-10 font-bold text-2xl items-center">Best Price</h1>
            </div>
            <div class=" items-center text-center">
                <div class="setiapjam flex justify-center">
                    <svg preserveAspectRatio="xMidYMid meet" viewBox="0 0 187.3 93.7" height="300px" width="400px">
                        <path d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 				c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="4" fill="none" id="outline" stroke="#F98538"></path>
                        <path d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 				c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z" stroke-miterlimit="10" stroke-linejoin="round" stroke-linecap="round" stroke-width="4" stroke="#4E4FEB" fill="none" opacity="0.05" id="outline-bg"></path>
                    </svg>
                </div>
                <h1 class=" text-center font-bold text-2xl">Here For You 24/7</h1>
            </div>
        </div>
    </section>
    <section class=" md:h-[90vh] lg:h-screen items-center pt-0 md:pt-40 lg:pt-0 ">
        <div class="text-center">
            <h1 class="text-5xl"><span class="text-[#282828] font-[800]">Our </span><span class="text-[#F98538] font-[800]">Best </span><span class="text-[#282828] font-[800]">Product</span></h1>
        </div>
        <div class="swiper topSwiper mt-12 w-full aspect-square rounded-xl lg:aspect-auto h-[32rem] md:h-[40rem] lg:h-[30rem] lg:mt-8 xl:h-[35rem] 2xl:h-[40rem]">
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
    <div class="wavekedua lg:h-[12vh] xl:h-[15vh] mt-12">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-[#f0f5ff]"></path>
        </svg>
    </div>
    <footer class="footer flex justify-center items-center px-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 flex justify-between pl-0 md:pl-8 items-center">
            <div class="footer-col px-10">
                <h1 class="text-6xl md:text-4xl"><span class="text-white font-[800]">Gayale</span><span class="text-[#F98538] font-[800]">Corner</span></h1>
                <br>
                <h5 class="text-lg md:text-xl text-white text-justify">GayaleCorner is an online store dealing with all product
                    GayaleCorner provide cheap, high quality, products to
                    customers</h5>


            </div>
            <div class="footer-col px-10 ml-0 pt-16 lg:pt-0 lg:ml-10">
                <h4 class="text-6xl md:text-2xl">Connect Us</h4>
                <h5 class="text-white text-lg md:text-xl text-justify">support@GayaleCorner.com</h5>
                <h5 class="text-white text-lg md:text-xl text-justify">021 - 123 -456</h5>
                <h5 class="text-white text-lg md:text-xl  text-justify">Summarecon, South Tangerang</h5>

            </div>
            <div class="footer-col px-10 pt-16 lg:pt-0  ml-0 lg:ml-10  ">
                <h4 class="text-6xl md:text-2xl">Follow Us</h4>
                <div class="social-links text-lg md:text-xl ">
                    <a href="#"><i class="fab fa-instagram"></i>&nbsp;&nbsp;&nbsp;@GayaleCorner.com</a>
                    <br>
                    <a href="#"><i class="fas fa-envelope"></i>&nbsp;&nbsp;&nbsp;@GayaleCorner.com</a>
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
    </script>
</body>