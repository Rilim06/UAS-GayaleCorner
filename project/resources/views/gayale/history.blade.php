<head>
    @vite('resources/css/app.css')
    @vite('resources/css/dashboard.css')
    <!-- @vite('resources/css/navbar.css') -->
    @vite('resources/js/index.js')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/history.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
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
                            <div class="hover:text-[#F98538]">Categories</div>
                        </div>
                        <ul class="dropdown__menu">
                            <li>
                                <a href="clothes" class="dropdown__link hover:text-[#F98538]">
                                    <i class="ri-pie-chart-line"></i> Clothes
                                </a>
                            </li>
                            <li>
                                <a href="foods" class="dropdown__link hover:text-[#F98538]">
                                    <i class="ri-arrow-up-down-line"></i> Foods
                                </a>
                            </li>
                            <li>
                                <a href="beverages" class="dropdown__link hover:text-[#F98538]">
                                    <i class="ri-arrow-up-down-line"></i> Beverages
                                </a>
                            </li>
                            <li>
                                <a href="accessories" class="dropdown__link hover:text-[#F98538]">
                                    <i class="ri-arrow-up-down-line"></i> Accessories
                                </a>
                            </li>
                            <li>
                                <a href="others" class="dropdown__link hover:text-[#F98538]">
                                    <i class="ri-arrow-up-down-line"></i> Others
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
    <div class='all' id='blur'>
        <div class="cardContainer">
            @foreach($groupedTransactions as $transactionID => $transactions)
            @php
            $status = 'Unknown';
    
            if ($transactions->isNotEmpty()) {
            $firstTransaction = $transactions->first();
    
            if ($firstTransaction->status == 0) {
            $status = 'Pending';
            } elseif ($firstTransaction->status == 1) {
            $status = 'Packaging';
            } elseif ($firstTransaction->status == 2) {
            $status = 'Delivering';
            } elseif ($firstTransaction->status == 3) {
            $status = 'Arrived';
            }
            }
            @endphp
            <!-- Untuk per transactions -->
            <div class="card" onclick='openPopup(
                    "{{ $transactionID }}",
                    "{{ $status }}",
                    @json($transactions->toArray())
                )'>
                <h2>Transaction ID: {{ $transactionID }}</h2>
                <p>Status: {{ $status }}</p>
                @foreach ($transactions as $transaction)
                <p>{{ $transaction->product->name }}&nbsp;&nbsp;&nbsp;x{{ $transaction->quantity }}</p>
                @endforeach
            </div>

            <div>
                
            </div>
    
            <!-- Untuk per transactions -->
            <br />
            <br />
            @endforeach
        </div>
    </div>
    <footer class="footer bottom-0 w-full mt-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 pl-0 md:pl-8 items-center">
            <div class="footer-col px-10">
                <h1 class="text-6xl lg:text-4xl xl:text-3xl"><span class="text-white font-[800]">Gayale</span><span class="text-[#F98538] font-[800]">Corner</span></h1>
                <br>
                <h5 class="text-3xl lg:text-xl text-white">Many things. All in one
                </h5>
            </div>
            <div class="footer-col px-10 ml-0 pt-16 lg:pt-0 lg:ml-10">
                <h4 class="text-5xl lg:text-3xl">Connect Us</h4>
                <!-- <h5 class="text-white text-lg md:text-xl text-justify">support@GayaleCorner.com</h5> -->
                <a href="https://wa.me/6287717955384" target="_blank">
                    <h5 class="text-white text-3xl lg:text-xl">0877-1795-5384</h5>
                </a>
                <h5 class="text-white text-3xl lg:text-xl mt-2">Bintaro, Tangerang Selatan</h5>

            </div>
            <div class="footer-col px-10 pt-16 lg:pt-0  ml-0 lg:ml-10  ">
                <h4 class="text-5xl lg:text-3xl">Follow Us</h4>
                <div class="social-links text-3xl lg:text-xl">
                    <a href="https://www.instagram.com/gayale_corner/" target="_blank"><i class="fab fa-instagram"></i>&nbsp;&nbsp;&nbsp;@gayale_corner</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Popup -->
    <div id='popup'>
        <h3 id="transactionId">Transaction ID: </h3>
        <div class="popupLine">
            <p>Status: </p><span id="transactionStatus"></span>
        </div>
        <div class="popupLine">
            <p>Address: </p><p id="transactionAddress"></p>
        </div>
        <div class="popupLine">
            <div id="transactionDetails"></div>
        </div>
        <div class="popupLine">
            <p>Subtotal:</p>
            <p id="price"></p>
        </div>
        <div class="popupLine">
            <p>Ongkir:</p>
            <p>9000</p>
        </div>
        <div class="popupLine">
            <p>Total:</p><p id="total"></p>
        </div>
        <div class="popupLine">
            <p>Ordered at: </p>
            <p id="transactionDate"></p>
        </div>
        
        
        
        
        <!-- <p id="tax"></p> -->
        
        
        <a class="closing" onclick='closePopup()'>
            <button class="closeBtn">
                <span class="X"></span>
                <span class="Y"></span>
            </button>
        </a>
    </div>

</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script type='text/javascript'>
    function openPopup(transactionID, status, details) {
        var blur = document.getElementById('blur');
        var popup = document.getElementById('popup');
        var statusElement = document.getElementById('transactionStatus');
        var detailsElement = document.getElementById('transactionDetails');
        var idElement = document.getElementById('transactionId');
        var dateElement = document.getElementById('transactionDate');
        var addressElement = document.getElementById('transactionAddress');
        var priceElement = document.getElementById('price');
        var taxElement = document.getElementById('tax');
        var totalElement = document.getElementById('total');

        idElement.textContent = `Transaction ID: ${transactionID}`;
        statusElement.textContent = status;
        var address = details[0].address;
        addressElement.textContent = `${address}`;
        var rawDate = details[0].created_at;
        var date = new Date(rawDate);
        var formattedDate = date.toLocaleString();
        dateElement.textContent = `${formattedDate}`;
        detailsElement.innerHTML = '';

        var allPrice = 0;

        details.forEach(function(transaction) {
            var detailDiv = document.createElement('div');
            var price = transaction.quantity * transaction.product.price;
            allPrice += price;
            detailDiv.innerHTML = `
            <p>${transaction.product.name}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x${transaction.quantity}&nbsp;&nbsp;&nbsp;${price}</p>
        `;
            detailsElement.appendChild(detailDiv);
        });

        var tax = allPrice * 0.1;
        var total = allPrice + tax + 10000;

        priceElement.textContent = `${allPrice}`;
        // taxElement.textContent = `Tax (10%): ${tax}`;
        totalElement.textContent = `${total}`;

        var isPopupActive = popup.classList.contains('active');

        if (!isPopupActive) {
            blur.classList.add('active');
            popup.classList.add('active');
        } else {
            blur.classList.remove('active');
            popup.classList.remove('active');
        }
    }

    function closePopup() {
        var blur = document.getElementById('blur');
        var popup = document.getElementById('popup');

        blur.classList.remove('active');
        popup.classList.remove('active');
    }
</script>