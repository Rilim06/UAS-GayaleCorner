<head>
    @vite('resources/css/app.css')
    @vite('resources/css/dashboard.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body>
    <div class='all' id='blur'>
        <div class="bg-gray-200 p-4">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="flex justify-between p-4">
                <h1 class="text-3xl font-bold underline">Ini Dashboard</h1>
                <div class="flex">
                    <form method="post" action="{{route('logout')}}" class="px-4">
                        @csrf
                        <button type='submit'>Logout</button>
                    </form>
                    <a href="/history">History</a>
                    <a href="/cart">Cart</a>
                </div>
            </div>
            <div class="w-[80%] mx-auto">
                <div class="swiper topSwiper w-full h-[30rem] mt-8 rounded-md">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="storage/photos/komarin.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="storage/photos/komari.jpeg" alt=""></div>
                        <div class="swiper-slide"><img src="storage/photos/Genshin 4.1.jpeg" alt=""></div>
                        <div class="swiper-slide"><img src="storage/photos/Baizhu Qiqi Web Event Wallpaper.jpg" alt=""></div>
                        <div class="swiper-slide"><img src="storage/photos/aliongjpeg.jpeg" alt=""></div>
                    </div>
                    <div class="swiper-button-next drop-shadow-lg"></div>
                    <div class="swiper-button-prev drop-shadow-lg"></div>
                    <div class="swiper-pagination"></div>
                </div>
                <h3 class="mt-8 font-bold text-2xl text-center">All Categories</h3>
                <div class="category-grid w-full grid grid-cols-5 gap-4 mt-4">
                    <a href="category/clothes">
                        <div class="category-1 mt-4 aspect-square flex justify-center items-center rounded-md hover:scale-105 ease-in duration-300">
                            <p class="text-white text-lg font-bold align-middle">Clothes</p>
                        </div>
                    </a>
                    <a href="category/foods">
                        <div class="category-2 mt-4 aspect-square flex justify-center items-center rounded-md hover:scale-105 ease-in duration-300">
                            <p class="text-white text-lg font-bold align-middle">Foods</p>
                        </div>
                    </a>
                    <a href="category/beverages">
                        <div class="category-3 mt-4 aspect-square flex justify-center items-center rounded-md hover:scale-105 ease-in duration-300">
                            <p class="text-white text-lg font-bold align-middle">Beverages</p>
                        </div>
                    </a>
                    <a href="category/accessories">
                        <div class="category-4 mt-4 aspect-square flex justify-center items-center rounded-md hover:scale-105 ease-in duration-300">
                            <p class="text-white text-lg font-bold align-middle">Accessories</p>
                        </div>
                    </a>
                    <a href="category/others">
                        <div class="category-5 mt-4 aspect-square flex justify-center items-center rounded-md hover:scale-105 ease-in duration-300">
                            <p class="text-white text-lg font-bold align-middle">Others</p>
                        </div>
                    </a>
                </div>
            </div>
            <h3 class="mt-8 font-bold text-2xl text-center">All Products</h3>
            <div class="swiper btmSwiper w-full h-min mt-8">
                <div class="swiper-wrapper">
                    @foreach ($products as $product)
                    <div class="swiper-slide aspect-square w-36 rounded-lg hover:scale-110 ease-in-out duration-200" onclick='openPopup(
                                        "{{$product->id}}",
                                        "{{$product->name}}",
                                        "{{$product->category}}",
                                        "{{$product->description}}",
                                        "Rp.{{$product->price}},-",
                                        "{{asset("storage/" . $product->photo)}}"
                                    )'>
                        <img class="photo" src="{{asset('storage/' . $product->photo)}}" />
                        <!-- <br /> -->
                        <!-- {{$product->price}}
                            {{$product->category}}
                            <h1 class="font-bold">{{$product->name}}</h1> -->
                    </div>
                    @endforeach
                </div>
                <!-- <div class="swiper-button-next drop-shadow-lg"></div>
                <div class="swiper-button-prev drop-shadow-lg"></div>
                <div class="swiper-pagination"></div> -->
            </div>
            <!-- <div class="container flex justify-center max-w-full mt-8">
                <div class="menu-container flex max-w-full pb-4">
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-2 w-full">
                        @foreach ($products as $product)
                        <div class="shadow rounded-lg hover:scale-105 ease-in-out duration-200" onclick='openPopup(
                                        "{{$product->id}}",
                                        "{{$product->name}}",
                                        "{{$product->category}}",
                                        "{{$product->description}}",
                                        "Rp.{{$product->price}},-",
                                        "{{asset("storage/" . $product->photo)}}"
                                    )'>
                            <img class="photo" src="{{asset('storage/' . $product->photo)}}" />
                        </div>
                        @endforeach
                    </div>
                </div>
            </div> -->
        </div>
        <div class="footer bg-red-500">INI FOOTER</div>
    </div>
    <!-- popup -->
    <div class="py-8 ps-8 pe-2" id='popup'>
        <div class="grid grid-cols-2 gap-8">
            <img class="photo aspect-square" src="" alt="Product Image" />
            <div class="flex flex-col justify-between">
                <div class="">
                    <h2 id="productName" class="xl:text-3xl font-bold"></h2>
                    <p id="productCategory" class="xl:text-xl text-slate-500"></p>
                    <p id="productPrice" class="xl:text-xl font-bold"></p>
                </div>
                <p id="productDescription" class="text-md text-slate-500 mt-4"></p>
                <form action="/cart" method="post">
                    @csrf
                    <div class="quantity mt-4 flex justify-center items-center gap-4">
                        <label for="productQuantity">Quantity:</label>
                        <div class="quantity-controls flex gap-2">
                            <button type="button" class="quantity-decrease">-</button>
                            <input class="p-1 w-10 rounded-lg" type="number" id="productQuantity" name="quantity" value="1" min="1">
                            <button type="button" class="quantity-increase">+</button>
                        </div>
                    </div>
                    <input type="hidden" id="productId" name="productId" value="">
                    <input type="hidden" id="productPriceHidden" name="productPrice" value="">
                    <button type="submit" class="bg-[#F98538] hover:bg-[#ff9854] focus:bg-[#d16f2e] text-white rounded-[32px] flex items-center px-4 py-2 gap-2 mt-8 mx-auto"><img src="storage/photos/Add.svg" alt="">Cart</button>
                </form>
            </div>
        </div>
        <div class="closing">
            <a class="closing" onclick='openPopup()'>
                <button class="closeBtn">
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
</script>
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

    var swiper = new Swiper(".btmSwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        grabCursor: true,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 10,
            },
        },
    });
</script>