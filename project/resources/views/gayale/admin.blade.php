<head>
    @vite('resources/css/app.css')
</head>

<body>
    <div class='all' id='blur'>
        <div class="p-4 h-full">
            <!-- <h1 class="text-3xl font-bold underline">Ini Admin</h1> -->
            <form method="post" action="{{route('logout')}}" class="p-6">
                @csrf
                <button type='submit'>Logout</button>
            </form>
            <a href="/order">Orders</a>
            <a href="category/clothes">Clothes</a>
            <a href="category/foods">Foods</a>
            <a href="category/beverages">Beverages</a>
            <a href="category/accessories">Accessories</a>
            <a href="category/others">Others</a>
            <div class="w-[90%] mx-auto">
                <a href="gayale/create" class=""><button class="bg-[#08243A] hover:bg-[#08243A] text-white text-center text-3xl py-4 px-8 mt-10 rounded-full lg:text-sm lg:px-5 lg:py-3 xl:text-md 2xl:text-lg">
                        Tambah Item
                    </button></a>
                <div class="menu-container mt-8 lg:mt-4">
                    <div class="w-full grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-4 2xl:grid-cols-3">
                        @foreach ($products as $product)
                        <div class="shadow-[0px_3px_10px_0px_rgba(0,0,0,.25)] rounded-2xl px-12 py-8 food-card grid grid-cols-3 gap-12 lg:p-4 2xl:p-6">
                            <img class="photo w-full aspect-square rounded-xl" src="{{asset('storage/' . $product->photo)}}" />
                            <div class="flex flex-col my-auto">
                                <h1 class="text-5xl lg:text-xl xl:text-2xl">{{$product->name}}</h1>
                                <h2 class="text-slate-500 text-sm mt-2 lg:mt-0 xl:text-lg">Category: {{$product->category}}</h2>
                                <h2 class="font-bold text-lg mt-6 lg:mt-1 xl:text-xl">Rp. {{$product->price}}</h2>
                            </div>
                            <div class="flex flex-col gap-4 justify-center text-center">
                                <a class="bg-[#F98538] hover:bg-[#ff9854] focus:bg-[#d16f2e] text-white text-2xl p-2 rounded-lg shadow-[0px_2px_8px_0px_rgba(0,0,0,.25)] flex justify-center mx-auto w-1/2 lg:w-full lg:text-lg lg:p-1" href="/gayale/{{$product->id}}/edit">Edit</a>
                                <form class="bg-[#F98538] hover:bg-[#ff9854] focus:bg-[#d16f2e] text-white text-2xl p-2 rounded-lg shadow-[0px_2px_8px_0px_rgba(0,0,0,.25)] flex justify-center mx-auto w-1/2 mb-0 lg:w-full lg:text-lg lg:p-1" action="/gayale/{{$product->id}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Belum siap -->
    <div id='popup'>
        <img class="photo" src="" alt="Product Image" />
        <h2 id="productName"></h2>
        <p id="productDescription"></p>
        <p id="productPrice"></p>
        <p>Order</p>

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

<!-- For popup -->
<script type='text/javascript'>
    function openPopup(productId, productName, productDescription, productPrice, productPhoto) {
        var blur = document.getElementById('blur');
        var popup = document.getElementById('popup');

        var isPopupActive = popup.classList.contains('active');

        if (!isPopupActive) {
            blur.classList.add('active');
            popup.classList.add('active');

            var popupImage = popup.querySelector('.photo');
            var popupProductName = popup.querySelector('#productName');
            var popupProductDescription = popup.querySelector('#productDescription');
            var popupProductPrice = popup.querySelector('#productPrice');

            popupImage.src = productPhoto;
            popupProductName.textContent = productName;
            popupProductDescription.textContent = productDescription;
            popupProductPrice.textContent = productPrice;
        } else {
            blur.classList.remove('active');
            popup.classList.remove('active');
        }
    }
</script>