<html>
    <head>
        @vite('resources/css/app.css')
        @vite('resources/css/index.css')
        @vite('resources/css/navbar.css')
        @vite('resources/js/index.js')
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            function updateQuantity(itemId, action, stock) {
                
                var quantityElement = document.getElementById('quantity_item' + itemId);
                var totalElement = document.getElementById('total_item' + itemId);
                var priceElement = document.getElementById('price_item' + itemId);
                var currentQuantity = parseInt(quantityElement.textContent);
                var priceText = priceElement.textContent.replace('Rp. ', '').replace(',-', '').replace('.','');
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
                totalElement.textContent = 'Rp. ' + newTotal.toLocaleString('id-ID', { maximumFractionDigits: 0 }) + ',-';
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
                                <h3 id="quantity_item{{$cart->id}}" >{{$cart->quantity}}</h3>
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