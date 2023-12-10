<head>
    @vite('resources/css/app.css')
    @vite('resources/css/dashboard.css')
    @vite('resources/js/index.js')
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.7.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body class="relative">
    <div class='all h-full' id='blur'>
        <header class="header bg-white text-black">
            <nav class="nav container z-20">
                <div class="nav__data">
                    <a href="/gayale" class="nav__logo ml-8">
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
                            <!-- <div class="nav__link"> -->
                                <div class="text-2xl flex items-center lg:pt-6 lg:text-xl xl:pt-0 xl:h-full py-1 px-5 hover:text-[#F98538]">Categories</div>
                            <!-- </div> -->
                            <ul class="dropdown__menu">
                                <li>
                                    <a href="clothes" class="dropdown__link hover:text-[#F98538]">
                                        <i class="ri-t-shirt-2-fill"></i> Clothes
                                    </a>
                                </li>
                                <li>
                                    <a href="foods" class="dropdown__link hover:text-[#F98538]">
                                        <i class="ri-restaurant-2-fill"></i> Foods
                                    </a>
                                </li>
                                <li>
                                    <a href="beverages" class="dropdown__link hover:text-[#F98538]">
                                        <i class="ri-drinks-2-fill"></i> Beverages
                                    </a>
                                </li>
                                <li>
                                    <a href="accessories" class="dropdown__link hover:text-[#F98538]">
                                        <i class="ri-circle-fill"></i> Accessories
                                    </a>
                                </li>
                                <li>
                                    <a href="others" class="dropdown__link hover:text-[#F98538]">
                                        <i class="ri-archive-stack-fill"></i> Others
                                    </a>
                                </li>
                                <!-- <li class="dropdown__subitem">
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
                                </li> -->
                            </ul>
                        </li>
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
                        <!-- <li><a href="#" class="nav__link">Products</a></li> -->
                        <li>
                            <form method="post" action="{{route('logout')}}" class="nav__link p-6">
                                @csrf
                                <button class="hover:text-[#F98538]" type='submit'>Logout</button>
                            </form>
                        </li>
                        <!-- <li><a href='/login'>
                                <h1 class="nav__link font-[700] text-[#F98538] hover:text-white rounded-md bg-transparent hover:bg-[#F98538]">Login</h1>
                            </a></li>
                        <li><a href='/register'>
                                <h1 class="nav__link font-[700] bg-[#F98538] text-white rounded-md hover:text-[#F98538] hover:bg-white" id="designregister">Register</h1>
                            </a></li> -->
                        <!-- <li><a href="#" class="nav__link">Contact</a></li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <div class="p-4">
            <!-- <form method="post" action="{{route('logout')}}" class="p-6">
                @csrf
                <button type='submit'>Logout</button>
            </form>
            <a href="/gayale">Home</a>
            <a href="/cart">Cart</a>
            <a href="/history">History</a>
            <a href="clothes">Clothes</a>
            <a href="foods">Foods</a>
            <a href="beverages">Beverages</a>
            <a href="accessories">Accessories</a>
            <a href="others">Others</a> -->
            <h3 class="font-bold text-5xl mt-32 sm:mt-40 text-center lg:text-3xl xl:mt-28 xl:text-4xl">Categories</h3>
            <div class="menu-container mt-4">
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6">
                    @foreach ($products as $product)
                    <div class="bg-[#F7F7FF] shadow-[0px_2px_8px_0px_rgba(0,0,0,.25)] rounded-lg food-card" onclick='openPopup(
                                        "{{$product->id}}",
                                        "{{$product->name}}",
                                        "{{$product->category}}",
                                        "{{$product->description}}",
                                        "{{$product->price}}",
                                        "{{asset("storage/" . $product->photo)}}"
                                    )'>
                        <img class="photo w-full aspect-square rounded-t-lg" src="{{asset('storage/' . $product->photo)}}" />
                        <div class="text-4xl px-4 py-2 sm:text-3xl lg:text-2xl">
                            <h1>{{$product->name}}</h1>
                            <div class="font-bold mt-2 lg:mt-0">Rp. {{$product->price}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <footer class="footer absolute bottom-0 lg:static w-full mt-8 z-0">
        <div class="grid grid-cols-1 pl-0 md:pl-8 lg:grid-cols-3 lg:gap-8">
                <div class="footer-col px-10">
                    <h1 class="text-6xl lg:text-4xl xl:text-3xl"><span class="text-white font-[800]">Gayale</span><span class="text-[#F98538] font-[800]">Corner</span></h1>
                    <br>
                    <h5 class="text-3xl lg:text-xl text-white">Many things. All in one
                    </h5>
                </div>
                <div class="footer-col px-10 ml-0 pt-16 lg:pt-0">
                    <h4 class="text-5xl lg:text-3xl">Connect with Us</h4>
                    <!-- <h5 class="text-white text-lg md:text-xl text-justify">support@GayaleCorner.com</h5> -->
                    <a href="https://wa.me/6287717955384" target="_blank">
                        <h5 class="text-white text-3xl lg:text-xl">0877-1795-5384</h5>
                    </a>
                    <h5 class="text-white text-3xl lg:text-xl mt-2">Bintaro, Tangerang Selatan</h5>

                </div>
                <div class="footer-col px-10 pt-16 lg:pt-0  ml-0  ">
                    <h4 class="text-5xl lg:text-3xl">Follow Us</h4>
                    <div class="social-links text-3xl lg:text-xl">
                        <a href="https://www.instagram.com/gayale_corner/" target="_blank"><i class="fab fa-instagram"></i>&nbsp;&nbsp;&nbsp;@gayale_corner</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="w-[90%] pt-20 pb-8 px-8 sm:w-[75%] sm:pt-16 sm:px-8 lg:py-8 lg:ps-8 lg:pe-0 rounded-3xl" id='popup'>
        <div class=" lg:grid lg:grid-cols-2 lg:gap-8">
            <img class="photo w-full sm:w-3/4 lg:w-full sm:mx-auto aspect-square rounded-xl" src="" alt="Product Image" />
            <div class="flex flex-col justify-between">
                <div>
                    <div class="flex flex-col gap-3 mt-8 sm:gap-1 sm:px-20 lg:mt-0 lg:px-0">
                        <h2 id="productName" class="font-bold text-7xl sm:text-5xl lg:text-3xl xl:text-4xl"></h2>
                        <p id="productCategory" class="text-slate-500 text-5xl sm:text-4xl lg:text-2xl xl:text-3xl"></p>
                        <p id="productPrice" class="font-bold text-5xl sm:text-4xl lg:text-2xl xl:text-3xl"></p>
                    </div>
                    <p id="productDescription" class="text-slate-500 text-5xl sm:text-3xl sm:px-20 mt-8 lg:px-0 lg:text-[1.3rem] lg:mt-2 xl:mt-4 xl:text-md"></p>
                </div>
                <form action="/cart" method="post">
                    @csrf
                    <div class="quantity mt-4 flex justify-center items-center gap-4">
                        <label class="text-5xl sm:text-4xl lg:text-xl xl:text-2xl" for="productQuantity">Quantity:</label>
                        <div class="quantity-controls flex gap-4 lg:gap-2">
                            <button type="button" class="quantity-decrease text-5xl sm:text-4xl lg:text-xl xl:text-2xl">-</button>
                            <input class="p-1 w-16 rounded-lg text-center text-5xl sm:text-4xl lg:w-10 lg:text-xl xl:text-2xl" type="number" id="productQuantity" name="quantity" value="1" min="1">
                            <button type="button" class="quantity-increase text-5xl sm:text-4xl lg:text-xl xl:text-2xl">+</button>
                        </div>
                    </div>
                    <input type="hidden" id="productId" name="productId" value="">
                    <input type="hidden" id="productPriceHidden" name="productPrice" value="">
                    <button type="submit" class="bg-[#F98538] hover:bg-[#ff9854] focus:bg-[#d16f2e] text-white text-5xl mt-8 mx-auto rounded-full flex items-center gap-4 px-12 py-6 sm:text-4xl lg:text-xl lg:px-4 lg:py-2 lg:gap-2 xl:text-2xl">
                        <img class="w-12 sm:w-8 lg:w-6 xl:w-5" src="{{asset('storage/photos/Add.svg')}}" alt="">
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