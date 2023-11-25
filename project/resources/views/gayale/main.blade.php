<head>
    @vite('resources/css/app.css')
</head>

<body>
    <div class='all' id='blur'>
        <div class="bg-gray-200 p-4 h-full">
            <h1 class="text-3xl font-bold underline">Ini Main</h1>
            <form method="post" action="{{route('logout')}}" class="p-6">
                @csrf
                <button type='submit'>Logout</button>
            </form>
            <a href="category/clothes">Clothes</a>
            <a href="category/foods">Foods</a>
            <a href="category/beverages">Beverages</a>
            <a href="category/accessories">Accessories</a>
            <a href="category/others">Others</a>
            <div class="container">
                <div class="menu-container">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 w-full h-80">
                        @foreach ($products as $product)
                        <div class="bg-[#ebe0ce] shadow-6xl rounded-lg p-4 food-card"
                            onclick='openPopup(
                                        "{{$product->id}}",
                                        "{{$product->name}}",
                                        "{{$product->category}}",
                                        "{{$product->description}}",
                                        "{{$product->price}}",
                                        "{{asset("storage/" . $product->photo)}}"
                                    )'>
                            <img class="photo" src="{{asset('storage/' . $product->photo)}}" /><br />
                            {{$product->price}}
                            {{$product->category}}
                            <h1 class="font-bold">Ini User</h1>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id='popup'>
        <img class="photo" src="" alt="Product Image" />
        <h2 id="productName"></h2>
        <p id="productCategory"></p>
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

            popupImage.src = productPhoto;
            popupProductName.textContent = productName;
            popupProductCategory.textContent = productCategory;
            popupProductDescription.textContent = productDescription;
            popupProductPrice.textContent = productPrice;
        } else {
            blur.classList.remove('active');
            popup.classList.remove('active');
        }
    }
</script>