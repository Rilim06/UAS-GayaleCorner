<head>
    @vite('resources/css/app.css')
    @vite('resources/css/edit.css')
</head>

<body>
    <div class="h-full flex flex-col justify-center bg-slate-500 items-center">
        <h1 class="text-7xl font-bold text-center text-white lg:text-2xl">Edit Product</h1>
        <form class="bg-white w-[90%] text-2xl p-8 mt-8 rounded-2xl lg:text-sm lg:p-4 lg:mt-4 lg:w-[40%]" action="/gayale/{{$product->id}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="">
                Name: <input class="text-3xl rounded-lg lg:text-sm lg:py-1" type="text" name="name" value="{{$product->name}}" /><br />
            </div>
            <div class="flex gap-4 items-center mt-2">
                Description:<textarea class="text-3xl rounded-lg lg:text-sm" name="description">{{$product->description}}</textarea><br />
            </div>
            <div class="flex flex-wrap items-center gap-4 mt-2">
                Category:
                <div class="">
                    <label><input type="radio" name="category" value="foods" {{$product->category === 'foods' ? 'checked' : ''}}>
                        Foods</label><br>
                    <label><input type="radio" name="category" value="beverages" {{$product->category === 'beverages' ? 'checked' :
                            ''}}> Beverages</label><br>
                    <label><input type="radio" name="category" value="clothes" {{$product->category === 'clothes' ? 'checked' : ''}}>
                        Clothes</label><br>
                    <label><input type="radio" name="category" value="accessories" {{$product->category === 'accessories' ? 'checked' :
                            ''}}> Accessories</label><br>
                    <label><input type="radio" name="category" value="others" {{$product->category === 'others' ? 'checked' : ''}}>
                        Others</label><br>
                </div>
            </div>
            <div class="mt-2">
                Price: <input class="text-3xl rounded-lg lg:text-sm lg:py-1" type="text" name="price" value="{{$product->price}}" /><br />
            </div>
            <div class="mt-2">
                Stock: <input class="text-3xl rounded-lg lg:text-sm lg:py-1" type="text" name="stock" value="{{$product->stock}}" /><br />
            </div>
            <div class="flex mt-2 items-center gap-4">
                Current Photo: <img class="photo w-24" src="{{asset($photo)}}" /><br />
            </div>
            <div class="mt-2">
                Photo: <input type="file" name="newPhoto" /><br />
            </div>
            <div class="flex justify-center items-center text-white">
                <button class="py-2 px-4 mt-8 lg:mt-4 bg-[#F98538] rounded-lg" type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>