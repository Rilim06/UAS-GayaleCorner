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
            @if ($user_role == '1')
            <a href="gayale/create">Add products</a>
            @endif
            <div class="container">
                <div class="menu-container">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 w-full h-80">
                        @foreach ($products as $product)
                        <div class="bg-[#ebe0ce] shadow-6xl rounded-lg p-4 food-card">
                            <img class="photo" src="{{asset('storage/' . $product->photo)}}" /><br />
                            {{$product->price}}
                            @if ($user_role == '1')
                            <h1 class="font-bold">Ini Admin</h1>
                            <a href="/gayale/{{$product->id}}/edit">Edit</a>
                            <form action="/gayale/{{$product->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Delete</button>
                            </form>
                            @else
                            <h1 class="font-bold">Ini User</h1>
                            <button class='bg-[#ee3c20] text-white px-2 py-1 rounded'
                                onclick='openPopup(
                                    "{{$product->id}}",
                                    "{{$product->name}}",
                                    "{{$product->description}}",
                                    "{{$product->price}}",
                                    "{{asset("storage/" . $product->photo)}}"
                                    )'>View</button>
                            @endif
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