<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/index.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.7.0/fonts/remixicon.css" rel="stylesheet">

    <script>
        function updateQuantity(itemId, action, stock) {

            var quantityElement = document.getElementById('quantity_item' + itemId);
            var totalElement = document.getElementById('total_item' + itemId);
            var priceElement = document.getElementById('price_item' + itemId);
            var currentQuantity = parseInt(quantityElement.textContent);
            var priceText = priceElement.textContent.replace('Rp. ', '').replace(',-', '').replace('.', '');
            var price = parseFloat(priceText);

            console.log('currentQuantity:', currentQuantity);
            console.log('priceText:', priceText);
            console.log('price:', price);

            if (isNaN(price)) {
                console.error('Error: Unable to parse price');
                return;
            }

            if (action === 'add') {
                if (currentQuantity < stock) {
                    currentQuantity++;
                } else {
                    alert("Not enough items in stock!")
                }
            } else if (action === 'subtract' && currentQuantity > 1) {
                currentQuantity--;
            }

            var newTotal = currentQuantity * price;

            quantityElement.textContent = currentQuantity;
            totalElement.textContent = 'Rp. ' + newTotal.toLocaleString('id-ID', {
                maximumFractionDigits: 0
            }) + ',-';
            // Update subtotal and total based on all items in the cart
            check(itemId);

        }

        // Function to update subtotal and total based on all items in the cart


        function check(checkbox, itemId) {
            var isChecked = checkbox.checked ? 1 : 0;

            var quantityElement = document.getElementById('quantity_item' + itemId);
            var x = parseInt(quantityElement.textContent);

            $.ajax({
                type: "PATCH",
                url: "/cart/" + itemId,
                data: {
                    is_checked: isChecked,
                    y: x,
                    _token: "{{ csrf_token() }}"
                },
            });
        }


        updateQuantity();
        window.onload = updateQuantity();
    </script>
</head>

<body>
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
                        <div class="nav__link hover:text-[#F98538]">Categories</div>
                        <ul class="dropdown__menu">
                            <li>
                                <a href="category/clothes" class="dropdown__link hover:text-[#F98538]">
                                    <i class="ri-t-shirt-2-fill"></i> Clothes
                                </a>
                            </li>
                            <li>
                                <a href="category/foods" class="dropdown__link hover:text-[#F98538]">
                                    <i class="ri-restaurant-2-fill"></i> Foods
                                </a>
                            </li>
                            <li>
                                <a href="category/beverages" class="dropdown__link hover:text-[#F98538]">
                                    <i class="ri-drinks-2-fill"></i> Beverages
                                </a>
                            </li>
                            <li>
                                <a href="category/accessories" class="dropdown__link hover:text-[#F98538]">
                                    <i class="ri-circle-fill"></i> Accessories
                                </a>
                            </li>
                            <li>
                                <a href="category/others" class="dropdown__link hover:text-[#F98538]">
                                    <i class="ri-archive-stack-fill"></i> Others
                                </a>
                            </li>
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
    <div class="container">
        <h1 class="cartTitle">Keranjang</h1>
        <div class="itemContainer">
            @foreach($carts as $cart)
            <div class="item">
                <input type="checkbox" name="is_checked" value="0" onchange="check(this, '{{$cart->id}}')" class="checkbox">
                <div class="delete itemSection">
                    <form action="/cart/{{$cart->id}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button><img src="{{ asset('icons/deleteIcon.svg')}}" alt=""></button>
                    </form>
                </div>
                <div class="pic itemSection">
                    <img src="{{asset('storage/' . $cart->product->photo)}}" alt="">
                </div>
                <div class="info itemSection">
                    <div class="infoContent">
                        <p>{{$cart->product->name}}</p>
                        <h3 id="price_item{{$cart->id}}">Rp. {{ number_format($cart->product->price, 0, ',', '.') }},-</h3>
                        <div class="infoCount">
                            <button class="countBtn" id="subtractBtn" onclick="updateQuantity('{{$cart->id}}', 'subtract', {{$cart->product->stock}}); check('{{$cart->id}}')">
                                <img src="{{ asset('icons/subtract.svg') }}" alt="">
                            </button>
                            <h3 id="quantity_item{{$cart->id}}">{{$cart->quantity}}</h3>
                            <button class="countBtn" id="addBtn" onclick="updateQuantity('{{$cart->id}}', 'add', {{$cart->product->stock}}); check('{{$cart->id}}')">
                                <img src="{{ asset('icons/add.svg') }}" alt="">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="total itemSection">
                    <p>Total: </p>
                    <h3 id="total_item{{$cart->id}}">Rp. {{ number_format($cart->quantity * $cart->product->price, 0, ',', '.') }},-</h3>
                </div>
            </div>
            @endforeach

            <a href="/checkout">
                <button class="checkoutBtn">Checkout</button>
            </a>
        </div>
    </div>
    <footer class="footer absolute bottom-0 w-full">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-16 pl-0 md:pl-8 items-center">
            <div class="footer-col px-10">
                <h1 class="text-3xl md:text-5xl"><span class="text-white font-[800]">Gayale</span><span class="text-[#F98538] font-[800]">Corner</span></h1>
                <h5 class="text-xl mt-4 md:text-3xl lg:text-xl text-white">Many things. All in one
                </h5>
            </div>
            <div class="footer-col px-10">
                <h4 class="text-2xl md:text-4xl lg:text-3xl">Connect with Us</h4>
                <a href="https://wa.me/6287717955384" target="_blank">
                    <h5 class="text-white text-xl mt-2 md:text-3xl lg:text-xl">0877-1795-5384</h5>
                </a>
                <h5 class="text-white text-xl mt-2 md:text-3xl lg:text-xl">Bintaro, Tangerang Selatan</h5>
            </div>
            <div class="footer-col px-10">
                <h4 class="text-2xl md:text-4xl lg:text-3xl">Follow Us</h4>
                <div class="social-links text-xl mt-2 md:text-3xl lg:text-xl">
                    <a href="https://www.instagram.com/gayale_corner/" target="_blank"><i class="fab fa-instagram"></i>&nbsp;&nbsp;&nbsp;@gayale_corner</a>
                </div>
            </div>
        </div>
    </footer>
    <script>
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