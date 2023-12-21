<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/history.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.7.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body class="relative">
    <header class="header bg-white text-black">
        <nav class="nav z-20">
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
    <div class='all' id='blur'>
        <div class="cardContainer h-fit {{ count($groupedTransactions) === 0 ? 'h-screen' : '' }}">
            <h3 class="font-bold text-5xl mt-32 sm:mt-40 text-center lg:text-3xl xl:mt-28 xl:text-4xl">History</h3>
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
    <footer class="footer w-full mt-8 {{ count($groupedTransactions) === 0 ? 'absolute bottom-0' : '' }}">
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
    <!-- Popup -->
    <div id='popup'>
        <h3 id="transactionId">Transaction ID: </h3>
        <div class="popupLine">
            <p>Status: </p><span id="transactionStatus"></span>
        </div>
        <div class="popupLine">
            <p>Address: </p>
            <p id="transactionAddress"></p>
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
            <p>Total:</p>
            <p id="total"></p>
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