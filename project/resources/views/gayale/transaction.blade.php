<html>
    <head>
        @vite('resources/css/app.css')
        @vite('resources/css/index.css')
        @vite('resources/css/navbar.css')
        @vite('resources/js/index.js')
        <link rel="stylesheet" href="{{ asset('css/transaction.css') }}">
    </head>
    <body>
        @php
            $subtotal = $carts->sum(function ($cart) {
            return $cart->quantity * $cart->product->price;
            });
            /*$tax = $carts->sum(function ($cart) {
            return $cart->quantity * $cart->product->price * 0.1;
            }); 
            $total = $subtotal + $tax + 10000; // Subtotal + Tax + Ongkir */
            $total = $subtotal + 9000;
        @endphp
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
            <div class="itemContainer">
                <h3 class="title">Checkout Items</h3>
                @foreach($carts as $cart)
                <div class="item">
                    <div class="itemSection">
                        <div class="infoContent">
                            <p>{{$cart->product->name}}</p>
                            <h3 id="price_item{{$cart->id}}">Price: Rp. {{ number_format($cart->product->price, 0, ',', '.') }},-</h3>
                            <div class="infoCount">
                                <h3 id="quantity_item{{$cart->id}}">Qty: {{$cart->quantity}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="total itemSection">
                        <h3 id="total_item{{$cart->id}}">Rp. {{ number_format($cart->quantity * $cart->product->price, 0, ',', '.') }},-</h3>
                    </div>
                </div>
                @endforeach
            </div>

            <form id="transactionForm" action="/transaction" method="post" enctype="multipart/form-data">
            @csrf
                <div class="address"> 
                    <img src="{{ asset('icons/addressbox.svg') }}" alt="">
                    <div class="addressContent">
                        <div class="addressTop">
                            <p>{{$user->name}}</p>
                            <p>{{$user->phone}}</p>
                        </div>
                        <div class="addressBot">
                            <h3><textarea name="address" placeholder="Silahkan masukkan alamat anda!" required></textarea></h3>
                        </div>
                    </div>
                </div>
        
                <div class="checkout">
                    <div class="checkoutContent">
                        <div class="checkoutLeft">
                                <div class="checkoutPrice sub">
                                    <p>Subtotal</p>
                                    <p id="subtotal">Rp. {{ number_format($carts->sum(function ($cart) {
                                        return $cart->quantity * $cart->product->price;
                                        }), 0, ',', '.') }},-</p>
                                </div>
                                <div class="checkoutPrice">
                                    <p>Ongkos Kirim</p>
                                    <p id="deliveryCost">Rp. 9.000,-</p>
                                </div>
                                <div class="checkoutPrice checkoutTotal">
                                    <p>Total</p>
                                    <p id="total">Rp. {{ number_format($total, 0, ',', '.') }},-</p>
                                </div>
                        </div>
                        <img src="{{ asset('icons/line.svg') }}" alt="">
                        <div class="checkoutRight">
                            <label for="photo" class="file-input-button">Bukti Pembayaran</label>
                            <input type="file" id="photo" name="photo" class="file-input" onchange="updateFileName()" required/>
                            <h3 id="fileLabel">No file chosen</h3>
                        </div>
                    </div>
                </div>

                @foreach($carts as $cart)
                <input type="hidden" name="carts[{{ $loop->index }}][product_id]" value="{{ $cart->product->id }}">
                <input type="hidden" name="carts[{{ $loop->index }}][quantity]" value="{{ $cart->quantity }}">
                @endforeach
                
                <button type="submit" class="orderBtn" onclick="return showPopup(event)">Pesan</button>
                <div id="error-message" style="display: none; color: red;">
                    Please fill in the address and select a photo.
                </div>
            </form>
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
    
    <div class="hide">
        <a href="/gayale">Home</a>
        <a href="/cart">Back</a>
        <div class='all'id='blur'>
        @foreach($carts as $cart)
        <div>
            <h3>{{ $cart->product->name }}</h3>
            <p>Quantity: {{ $cart->quantity }}</p>
            <p>Price per item: {{ $cart->product->price }}</p>
            <p>Total Price: {{ $cart->quantity * $cart->product->price }}</p>
        </div>
        <br />
        @endforeach
    
        <!-- Hitung total -->
        <p>Subtotal: {{ $carts->sum(function ($cart) {
            return $cart->quantity * $cart->product->price;
            }) }}</p>
        <p>Ongkir: 10000</p>
        <p>Tax 10%: {{ $carts->sum(function ($cart) {
            return $cart->quantity * $cart->product->price * 0.1;
            }) }}</p>
        @php
        $subtotal = $carts->sum(function ($cart) {
        return $cart->quantity * $cart->product->price;
        });
        $tax = $carts->sum(function ($cart) {
        return $cart->quantity * $cart->product->price * 0.1;
        });
        $total = $subtotal + $tax + 10000; // Subtotal + Tax + Ongkir
        @endphp
        <p>Total: {{ $total }}</p>
        <!-- Hitung total -->
    
        <h3>Silakan memasukkan alamat dan bukti pembayaran anda </h3>
        <form id="transactionorm" action="/transaction" method="post" enctype="multipart/form-data">
            @csrf
            Alamat: <textarea name="addrss" required></textarea><br />
            Bukti Pembayaran: <input type="file" name="phto" required/><br />
    
            @foreach($carts as $cart)
            <input type="hidden" name="carts[{{ $loop->index }}][product_id]" value="{{ $cart->product->id }}">
            <input type="hidden" name="carts[{{ $loop->index }}][quantity]" value="{{ $cart->quantity }}">
            @endforeach
    
            <button type="submit" onclick=showPopup(event)><b>Pesan</b></button>
        </form>
        </div>
    </div>

    <div id='popup'>
        <h1>Pesanan berhasil dibuat!</h1>
        <h1>Mohon menunggu pesan ini berakhir.</h1>
    </div>
    </body>

    <!-- popup -->
    <script type='text/javascript'>
        function showPopup(event) {
            event.preventDefault();

            var address = document.querySelector('textarea[name="address"]').value;
            var photo = document.querySelector('input[name="photo"]').value;

            if (address.trim() !== '' && photo.trim() !== '') {
                var blur = document.getElementById('blur');
                var popup = document.getElementById('popup');

                blur.classList.add('active');
                popup.classList.add('active');

                setTimeout(function() {
                    document.getElementById('transactionForm').submit();
                }, 3000);
            } else {
                var errorMessage = document.getElementById('error-message');
                errorMessage.style.display = 'block';

                setTimeout(function() {
                    errorMessage.style.display = 'none';
                }, 3000);
            }

            return false;
        }
        function updateFileName() {
            var fileInput = document.getElementById('photo');
            var fileLabel = document.getElementById('fileLabel');

            if (fileInput.files.length > 0) {
                var fileName = fileInput.files[0].name;
                var validExtensions = ['png', 'svg', 'jpeg', 'jpg'];

                var extension = fileName.split('.').pop().toLowerCase();

                if (validExtensions.includes(extension)) {
                    fileLabel.textContent = fileName;
                } else {
                    alert('Please choose a valid image file (png, svg, jpeg, jpg).');
                    fileInput.value = ''; // Clear the file input
                    fileLabel.textContent = 'No file chosen';
                }
            } else {
                fileLabel.textContent = 'No file chosen';
            }
        }
    </script>
</html>