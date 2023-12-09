<html>
    <head>
        @vite('resources/css/app.css')
        @vite('resources/css/index.css')
        @vite('resources/css/navbar.css')
        @vite('resources/js/index.js')
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
        <script>
            function updateQuantity(itemId, action, stock) {
                var quantityElement = document.getElementById('quantity_' + itemId);
                var totalElement = document.getElementById('total_' + itemId);
                var priceElement = document.getElementById('price_' + itemId);
                
                var currentQuantity = parseInt(quantityElement.textContent);
                var priceText = priceElement.textContent.replace('Rp. ', '').replace(',-', '');
                var price = parseFloat(priceText);
                
                console.log('currentQuantity:', currentQuantity);
                console.log('priceText:', priceText);
                console.log('price:', price);

                if (isNaN(price)) {
                    console.error('Error: Unable to parse price');
                    return;
                }

                if (action === 'add') {
                    if(currentQuantity < stock){
                        currentQuantity++;
                    }
                    else{
                        alert("Not enough items in stock!")
                    }
                } else if (action === 'subtract' && currentQuantity > 1) {
                    currentQuantity--;
                }

                var newTotal = currentQuantity * price;

                quantityElement.textContent = currentQuantity;
                totalElement.textContent = 'Rp. ' + newTotal.toFixed(3).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ',-';
                // Update subtotal and total based on all items in the cart
                updateCartTotal();
            }

            // Function to update subtotal and total based on all items in the cart
            function updateCartTotal() {
                var subtotalElements = document.querySelectorAll('[id^="total_item"]');
                var deliveryElement = document.getElementById('deliveryCost');
                var subtotal = 0;

                var deliveryCost = parseInt(deliveryElement.textContent.replace('Rp. ', '').replace(',-', ''));

                // Calculate subtotal based on each item
                subtotalElements.forEach(function (element) {
                    var subtotalText = element.textContent.replace('Rp. ', '').replace(',-', '');
                    subtotal += parseFloat(subtotalText);
                });

                var total = subtotal + deliveryCost;

                // Update subtotal and total in the HTML
                document.getElementById('subtotal').textContent = 'Rp. ' + subtotal.toFixed(3).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ',-';
                document.getElementById('total').textContent = 'Rp. ' + total.toFixed(3).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ',-';
            }
            
        </script>
    </head>
    <body>
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
                            <!-- <ul class="dropdown__menu">
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
                            </ul> -->
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
        <div class="container">
            <h1 class="cartTitle">Keranjang</h1>
            <div class="itemContainer">
            @foreach($carts as $cart)
                <div class="item">
                    <div class="delete itemSection">
                        <form action="/cart/{{$cart->id}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button><img src="{{ asset('icons/deleteIcon.svg')}}" alt=""></button>
                        </form>
                    </div>
                    <div class="pic itemSection">
                        <img src="{{$cart->product->photo}}" alt="">
                    </div>
                    <div class="info itemSection">
                        <div class="infoContent">
                            <p>{{$cart->product->name}}</p>
                            <h3 id="price_item{{$cart->id}}">Rp. {{$cart->product->price}},-</h3>
                            <div class="infoCount">
                                <button class="countBtn" onclick="updateQuantity('item{{$cart->id}}', 'subtract', {{$cart->product->stock}})">
                                    <img src="{{ asset('icons/subtract.svg') }}" alt="">
                                </button>
                                <h3 id="quantity_item{{$cart->id}}">{{$cart->quantity}}</h3>
                                <button class="countBtn" onclick="updateQuantity('item{{$cart->id}}', 'add', {{$cart->product->stock}})">
                                    <img src="{{ asset('icons/add.svg') }}" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="total itemSection">
                        <p>Total: </p>
                        <h3 id="total_item{{$cart->id}}"></h3>
                    </div>
                </div>
                @endforeach
            
                <div class="address"> 
                    <img src="{{ asset('icons/addressbox.svg') }}" alt="">
                    <div class="addressContent">
                        <div class="addressTop">
                            <p>PaskahIcad</p>
                            <p>+62 012-2192-0391</p>
                        </div>
                        <div class="addressBot">
                            <h3>JL.Semarecon serpong damai sektor 2 no 7 SERPONG, TANGGERANG SELATAN, BANTEN, ID 15133</h3>
                        </div>
                    </div>
                </div>

                <div class="checkout">
                    <div class="checkoutContent">
                        <div class="checkoutLeft">
                                <div class="checkoutPrice sub">
                                    <p>Subtotal</p>
                                    <p id="subtotal"></p>
                                </div>
                                <div class="checkoutPrice">
                                    <p>Ongkos Kirim</p>
                                    <p id="deliveryCost">Rp. 9.000,-</p>
                                </div>
                                <div class="checkoutPrice checkoutTotal">
                                    <p>Total</p>
                                    <p id="total"></p>
                                </div>
                        </div>
                        <img src="{{ asset('icons/line.svg') }}" alt="">
                        <div class="checkoutRight">
                            <div class="deliveryBox">
                                <input type="radio" name="deliveryOpt" id="jne" value="jne">
                                <label for="jne" class="deliBtn">
                                    <img src="{{asset('icons/jne.svg')}}" alt="">
                                </label>
                            </div>
                            <div class="deliveryBox">
                                <input type="radio" name="deliveryOpt" id="jnt" value="jnt">
                                <label for="jnt" class="deliBtn">
                                    <img src="{{asset('icons/jnt.svg')}}" alt="">
                                </label>
                            </div>
                            <div class="deliveryBox">
                                <input type="radio" name="deliveryOpt" id="scpt" value="scpt">
                                <label for="scpt" class="deliBtn">
                                    <img src="{{asset('icons/scpt.svg')}}" alt="">
                                </label>
                            </div>
                            <div class="deliveryBox">
                                <input type="radio" name="deliveryOpt" id="whn" value="whn">
                                <label for="whn" class="deliBtn">
                                    <img src="{{asset('icons/whn.svg')}}" alt="">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="checkoutBtn">Checkout</button>
            </div>
        
            <a href="/gayale">Home</a>
            <a href="/checkout">Checkout</a>
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
    </body>
</html>