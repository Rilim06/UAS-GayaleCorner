<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- @vite('resources/css/app.css')
    @vite('resources/css/index.css')
    @vite('resources/css/navbar.css')
    @vite('resources/js/index.js') -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/transaction.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.7.0/fonts/remixicon.css" rel="stylesheet">
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
                        <input type="file" id="photo" name="photo" class="file-input" onchange="updateFileName()" required />
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

    <footer class="footer">
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

    <div class="hide">
        <a href="/gayale">Home</a>
        <a href="/cart">Back</a>
        <div class='all' id='blur'>
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
                Bukti Pembayaran: <input type="file" name="phto" required /><br />

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

</html>