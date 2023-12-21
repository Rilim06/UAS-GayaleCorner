<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.7.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="relative">
    <div class='all' id='blur'>
        <header class="header bg-white text-black">
            <nav class="nav container z-20">
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
                        <li class="dropdown__item">
                            <div class="nav__link">
                                <a class="hover:text-[#F98538]" href="/history">History</a>
                            </div>
                        </li>
                        <li class="dropdown__item">
                            <div class="nav__link">
                                <a class="hover:text-[#F98538]" href="/cart">Cart</a>
                            </div>
                        </li>
                        <li>
                            <form method="post" action="{{route('logout')}}" class="nav__link">
                                @csrf
                                <button class="hover:text-[#F98538]" type='submit'>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="w-[90%] lg:w-[75%] mx-auto">
                <div class="swiper topSwiper w-full aspect-square rounded-xl mt-40 lg:aspect-auto lg:h-[30rem] xl:h-[35rem] xl:mt-24 2xl:h-[40rem]">
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
                <h3 class="font-bold mt-36 text-5xl sm:text-5xl sm:mt-12 lg:mt-8 lg:text-2xl xl:text-3xl text-center">All Categories</h3>
                <div class="category-grid flex flex-wrap mt-16 justify-center gap-4 sm:mt-8 lg:w-full lg:grid lg:grid-cols-5 lg:gap-4 lg:mt-4">
                    <a href="category/clothes">
                        <div class="category-1 w-screen min-[320px]:w-80 lg:w-full lg:mt-4 aspect-square flex justify-center items-center rounded-md hover:scale-105 ease-in duration-300">
                            <p class="text-white text-5xl lg:text-lg xl:text-xl font-bold align-middle">Clothes</p>
                        </div>
                    </a>
                    <a href="category/foods">
                        <div class="category-2 w-screen min-[320px]:w-80 lg:w-full lg:mt-4 aspect-square flex justify-center items-center rounded-md hover:scale-105 ease-in duration-300">
                            <p class="text-white text-5xl lg:text-lg xl:text-xl font-bold align-middle">Foods</p>
                        </div>
                    </a>
                    <a href="category/beverages">
                        <div class="category-3 w-screen min-[320px]:w-80 lg:w-full lg:mt-4 aspect-square flex justify-center items-center rounded-md hover:scale-105 ease-in duration-300">
                            <p class="text-white text-5xl lg:text-lg xl:text-xl font-bold align-middle">Beverages</p>
                        </div>
                    </a>
                    <a href="category/accessories">
                        <div class="category-4 w-screen min-[320px]:w-80 lg:w-full lg:mt-4 aspect-square flex justify-center items-center rounded-md hover:scale-105 ease-in duration-300">
                            <p class="text-white text-5xl lg:text-lg xl:text-xl font-bold align-middle">Accessories</p>
                        </div>
                    </a>
                    <a href="category/others">
                        <div class="category-5 w-screen min-[320px]:w-80 lg:w-full lg:mt-4 aspect-square flex justify-center items-center rounded-md hover:scale-105 ease-in duration-300">
                            <p class="text-white text-5xl lg:text-lg xl:text-xl font-bold align-middle">Others</p>
                        </div>
                    </a>
                </div>
            </div>
            <h3 class="font-bold mt-36 text-5xl text-center sm:mt-12 sm:text-5xl lg:mt-8 lg:text-2xl xl:text-3xl">All Products</h3>
            <div class="swiper btmSwiper w-[90%] h-min mt-16 sm:mt-8 lg:mt-8">
                <div class="swiper-wrapper">
                    @foreach ($products as $product)
                    <div class="swiper-slide aspect-square p-1 lg:w-36 rounded-xl hover:scale-105 ease-in-out duration-200" onclick='openPopup(
                                        "{{$product->id}}",
                                        "{{$product->name}}",
                                        "{{$product->category}}",
                                        "{{$product->description}}",
                                        "Rp.{{$product->price}},-",
                                        "{{asset("storage/" . $product->photo)}}"
                                    )'>
                        <img class="photo w-full rounded-xl" src="{{asset('storage/' . $product->photo)}}" />
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <footer class="footer mt-4 w-full">
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
    </div>
    <!-- popup -->
    <div class="w-[90%] pt-20 pb-8 px-8 sm:w-[75%] sm:pt-16 sm:px-8 lg:py-8 lg:ps-8 lg:pe-0 rounded-3xl" id='popup'>
        <div class="w-full lg:grid lg:grid-cols-2 lg:gap-8">
            <img class="photo w-full sm:w-3/4 lg:w-full sm:mx-auto aspect-square rounded-xl object-cover" src="" alt="Product Image" />
            <div class="flex flex-col justify-between">
                <div>
                    <div class="flex flex-col gap-3 mt-8 sm:gap-1 sm:px-20 lg:mt-0 lg:px-0">
                        <h2 id="productName" class="font-bold text-3xl sm:text-5xl lg:text-3xl lg:w-5/6 xl:text-4xl"></h2>
                        <p id="productCategory" class="text-slate-500 text-3xl sm:text-4xl lg:text-2xl xl:text-3xl"></p>
                        <p id="productPrice" class="font-bold text-3xl sm:text-4xl lg:text-2xl xl:text-3xl"></p>
                    </div>
                    <p id="productDescription" class="text-slate-500 text-3xl sm:text-3xl sm:px-20 mt-8 lg:px-0 lg:text-[1.3rem] lg:mt-2 xl:mt-4 xl:text-md"></p>
                </div>
                <form action="/cart" method="post">
                    @csrf
                    <div class="quantity mt-4 flex justify-center items-center gap-4">
                        <label class="text-xl sm:text-4xl lg:text-xl xl:text-2xl" for="productQuantity">Quantity:</label>
                        <div class="quantity-controls flex lg:gap-2">
                            <button type="button" class="quantity-decrease text-xl sm:text-4xl lg:text-xl xl:text-2xl">-</button>
                            <input class="p-1 w-16 rounded-lg text-center text-xl sm:text-4xl lg:w-10 lg:text-xl xl:text-2xl" type="number" id="productQuantity" name="quantity" value="1" min="1">
                            <button type="button" class="quantity-increase text-xl sm:text-4xl lg:text-xl xl:text-2xl">+</button>
                        </div>
                    </div>
                    <input type="hidden" id="productId" name="productId" value="">
                    <input type="hidden" id="productPriceHidden" name="productPrice" value="">
                    <button type="submit" class="bg-[#F98538] hover:bg-[#ff9854] focus:bg-[#d16f2e] text-white text-xl mt-8 mx-auto rounded-full flex items-center gap-4 px-4 py-2 sm:text-4xl lg:text-xl lg:px-4 lg:py-2 lg:gap-2 xl:text-2xl">
                        <img class="w-4 sm:w-8 lg:w-6 xl:w-5" src="storage/photos/Add.svg" alt="">
                        <p>Cart</p>
                    </button>
                </form>
            </div>
        </div>
        <div class="closing">
            <a class="closing" onclick='openPopup()'>
                <button class="closeBtn mt-2">
                    <span class="X"></span>
                    <span class="Y"></span>
                </button>
            </a>
        </div>
    </div>
</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

<!-- popup -->
<script type='text/javascript'>
    function openPopup(productId, productName, productCategory, productDescription, productPrice, productPhoto) {
        var blur = document.getElementById('blur');
        var popup = document.getElementById('popup');

        var isPopupActive = popup.classList.contains('active');

        if (!isPopupActive) {
            blur.classList.add('active');
            popup.classList.add('active');

            var popupImage = popup.querySelector('.photo');
            var popupProductName = popup.querySelector('#productName');
            var popupProductCategory = popup.querySelector('#productCategory');
            var popupProductDescription = popup.querySelector('#productDescription');
            var popupProductPrice = popup.querySelector('#productPrice');
            var productIdInput = popup.querySelector('#productId');

            popupImage.src = productPhoto;
            popupProductName.textContent = productName;
            popupProductCategory.textContent = productCategory;
            popupProductDescription.textContent = productDescription;
            popupProductPrice.textContent = productPrice;
            productIdInput.value = productId;
        } else {
            blur.classList.remove('active');
            popup.classList.remove('active');
        }
    }


    $(document).ready(function() {
        $('.quantity-controls').on('click', '.quantity-decrease', function() {
            var input = $(this).parent().find('input[type="number"]');
            var currentValue = parseInt(input.val(), 10);
            if (!isNaN(currentValue) && currentValue > 1) {
                input.val(currentValue - 1);
            }
        });

        $('.quantity-controls').on('click', '.quantity-increase', function() {
            var input = $(this).parent().find('input[type="number"]');
            var currentValue = parseInt(input.val(), 10);
            if (!isNaN(currentValue)) {
                input.val(currentValue + 1);
            }
        });
    });

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

    var swiper = new Swiper(".btmSwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        grabCursor: true,
        loop: true,
        // pagination: {
        //     el: ".swiper-pagination",
        //     clickable: true,
        // },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 10,
            },
            1280: {
                slidesPerView: 6,
                spaceBetween: 10,
            },
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