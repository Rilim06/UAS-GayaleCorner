<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>

<body>
    <div class="h-full flex flex-col justify-center bg-slate-500 items-center">
        <h1 class="text-7xl font-bold text-center text-white lg:text-2xl">Add New Product</h1>
        @if($errors)
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <form class="bg-white w-[90%] text-2xl p-8 mt-8 rounded-2xl lg:text-sm lg:p-4 lg:mt-4 lg:w-[40%]" action="/gayale" method="post" enctype="multipart/form-data">
            @csrf
            <div class="">
                Name: <input class="text-3xl rounded-lg lg:text-sm lg:py-1" type="text" name="name" /><br />
            </div>
            <div class="flex gap-4 items-center mt-2">
                Description: <textarea class="text-3xl rounded-lg lg:text-sm" name="description"></textarea><br />
            </div>
            <div class="flex flex-wrap items-center gap-4 mt-2">
                Category: <br />
                <div class="">
                    <label><input type="radio" name="category" value="foods"> Foods</label><br>
                    <label><input type="radio" name="category" value="beverages"> Beverages</label><br>
                    <label><input type="radio" name="category" value="clothes"> Clothes</label><br>
                    <label><input type="radio" name="category" value="accessories"> Accessories</label><br>
                    <label><input type="radio" name="category" value="others"> Others</label><br>
                </div>
            </div>
            <div class="mt-2">
                Price: <input class="text-3xl rounded-lg lg:text-sm lg:py-1" type="text" name="price" /><br />
            </div>
            <div class="mt-2">
                Stock: <input class="text-3xl rounded-lg lg:text-sm lg:py-1" type="text" name="stock" /><br />
            </div>
            <div class="mt-2">
                Photo: <input type="file" name="photo" /><br />
            </div>
            <div class="flex justify-center items-center text-white">
                <button class="py-2 px-4 mt-8 lg:mt-4 bg-[#F98538] rounded-lg" type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>