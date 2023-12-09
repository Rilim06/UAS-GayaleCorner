<head>
    @vite('resources/css/app.css')
</head>

<body>
    <div class='all' id='blur'>
        <div class="p-4 h-full">
            <form method="post" action="{{route('logout')}}" class="p-6">
                @csrf
                <button type='submit'>Logout</button>
            </form>
            <a href="/gayale">Home</a>
            <a href="clothes">Clothes</a>
            <a href="foods">Foods</a>
            <a href="beverages">Beverages</a>
            <a href="accessories">Accessories</a>
            <a href="others">Others</a>
            <div class="w-[90%] mx-auto">
                <a href="gayale/create" class="">
                    <button class="bg-[#08243A] hover:bg-[#0d3b5f] text-white text-center text-3xl py-4 px-8 mt-10 rounded-full lg:text-sm lg:px-5 lg:py-3 xl:text-md 2xl:text-lg">
                        Tambah Item
                    </button>
                </a>
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
                <!-- <div class="menu-container">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 w-full h-80">
                        @foreach ($products as $product)
                        <div class="bg-[#ebe0ce] shadow-6xl rounded-lg p-4 food-card">
                            <img class="photo" src="{{asset('storage/' . $product->photo)}}" /><br />
                            {{$product->name}} <br />
                            Category: {{$product->category}} <br />
                            {{$product->description}} <br />
                            <a href="/gayale/{{$product->id}}/edit">Edit</a>
                            <form action="/gayale/{{$product->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>