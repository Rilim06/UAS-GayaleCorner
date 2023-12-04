<head>
    @vite('resources/css/app.css')
</head>

<body>
    <div class='all' id='blur'>
        <div class="bg-gray-200 p-4 h-full">
            <h1 class="text-3xl font-bold underline">Ini Admin</h1>
            <form method="post" action="{{route('logout')}}" class="p-6">
                @csrf
                <button type='submit'>Logout</button>
            </form>
            <a href="/gayale/create">Add products</a>
            <a href="/gayale">Home</a>
            <a href="clothes">Clothes</a>
            <a href="foods">Foods</a>
            <a href="beverages">Beverages</a>
            <a href="accessories">Accessories</a>
            <a href="others">Others</a>
            <div class="container">
                <div class="menu-container">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 w-full h-80">
                        @foreach ($products as $product)
                        <div class="bg-[#ebe0ce] shadow-6xl rounded-lg p-4 food-card">
                            <img class="photo" src="{{asset('storage/' . $product->photo)}}" /><br />
                            {{$product->name}} <br />
                            {{$product->category}} <br />
                            <a href="/gayale/{{$product->id}}/edit">Edit</a>
                            <form action="/gayale/{{$product->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>