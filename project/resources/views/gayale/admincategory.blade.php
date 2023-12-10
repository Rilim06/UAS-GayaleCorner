<head>
    @vite('resources/css/admin.css')
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="navbar">
        <ul class="navbar-nav">
            <li class="logo">
                <div class="nav-link">
                    <span class="link-text logo-text">Admin</span>
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="angle-double-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x">
                        <g class="fa-group">
                            <path fill="currentColor" d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z" class="fa-secondary"></path>
                            <path fill="currentColor" d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z" class="fa-primary"></path>
                        </g>
                    </svg>
                </div>
            </li>

            <li class="nav-item">
                <a href="/gayale" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 650 650">
                        <g class="fa-group">
                            <path fill="currentColor" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" class="fa-secondary"></path>
                        </g>
                    </svg>
                    <span class="link-text">Gayale</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="clothes" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 650 650">
                        <g class="fa-group">
                            <path fill="currentColor" d="M211.8 0c7.8 0 14.3 5.7 16.7 13.2C240.8 51.9 277.1 80 320 80s79.2-28.1 91.5-66.8C413.9 5.7 420.4 0 428.2 0h12.6c22.5 0 44.2 7.9 61.5 22.3L628.5 127.4c6.6 5.5 10.7 13.5 11.4 22.1s-2.1 17.1-7.8 23.6l-56 64c-11.4 13.1-31.2 14.6-44.6 3.5L480 197.7V448c0 35.3-28.7 64-64 64H224c-35.3 0-64-28.7-64-64V197.7l-51.5 42.9c-13.3 11.1-33.1 9.6-44.6-3.5l-56-64c-5.7-6.5-8.5-15-7.8-23.6s4.8-16.6 11.4-22.1L137.7 22.3C155 7.9 176.7 0 199.2 0h12.6z" class="fa-secondary"></path>
                        </g>
                    </svg>
                    <span class="link-text">Clothes</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="foods" class="nav-link">
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="space-station-moon-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-space-station-moon-alt fa-w-16 fa-5x">
                        <g class="fa-group">
                            <path fill="currentColor" d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" class="fa-secondary"></path>
                        </g>
                    </svg>
                    <span class="link-text">Foods</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="beverages" class="nav-link">
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="space-shuttle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-space-shuttle fa-w-20 fa-5x">
                        <g class="fa-group">
                            <path fill="currentColor" d="M64 0C47.4 0 33.5 12.8 32.1 29.3l-14 168.4c-6 72 42.5 135.2 109.9 150.6V448H80c-17.7 0-32 14.3-32 32s14.3 32 32 32h80 80c17.7 0 32-14.3 32-32s-14.3-32-32-32H192V348.4c67.4-15.4 115.9-78.6 109.9-150.6l-14-168.4C286.5 12.8 272.6 0 256 0H64zM81.9 203.1L93.4 64H226.6l11.6 139.1C242 248.8 205.9 288 160 288s-82-39.2-78.1-84.9z" class="fa-secondary"></path>
                        </g>
                    </svg>
                    <span class="link-text">Beverages</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="accessories" class="nav-link">
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="space-shuttle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-space-shuttle fa-w-20 fa-5x">
                        <g class="fa-group">
                            <path fill="currentColor" d="M32 32H480c17.7 0 32 14.3 32 32V96c0 17.7-14.3 32-32 32H32C14.3 128 0 113.7 0 96V64C0 46.3 14.3 32 32 32zm0 128H480V416c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V160zm128 80c0 8.8 7.2 16 16 16H336c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z" class="fa-secondary"></path>

                        </g>
                    </svg>
                    <span class="link-text">Accessories</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="others" class="nav-link">
                    <svg aria-hidden="true" focusable="false" data-prefix="fad" data-icon="space-shuttle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-space-shuttle fa-w-20 fa-5x">
                        <g class="fa-group">
                            <path fill="currentColor" d="M403.8 34.4c12-5 25.7-2.2 34.9 6.9l64 64c6 6 9.4 14.1 9.4 22.6s-3.4 16.6-9.4 22.6l-64 64c-9.2 9.2-22.9 11.9-34.9 6.9s-19.8-16.6-19.8-29.6V160H352c-10.1 0-19.6 4.7-25.6 12.8L284 229.3 244 176l31.2-41.6C293.3 110.2 321.8 96 352 96h32V64c0-12.9 7.8-24.6 19.8-29.6zM164 282.7L204 336l-31.2 41.6C154.7 401.8 126.2 416 96 416H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H96c10.1 0 19.6-4.7 25.6-12.8L164 282.7zm274.6 188c-9.2 9.2-22.9 11.9-34.9 6.9s-19.8-16.6-19.8-29.6V416H352c-30.2 0-58.7-14.2-76.8-38.4L121.6 172.8c-6-8.1-15.5-12.8-25.6-12.8H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H96c30.2 0 58.7 14.2 76.8 38.4L326.4 339.2c6 8.1 15.5 12.8 25.6 12.8h32V320c0-12.9 7.8-24.6 19.8-29.6s25.7-2.2 34.9 6.9l64 64c6 6 9.4 14.1 9.4 22.6s-3.4 16.6-9.4 22.6l-64 64z" class="fa-secondary"></path>
                        </g>
                    </svg>
                    <span class="link-text">Others</span>
                </a>
            </li>

            <li class="nav-item" id="themeButton">
                <a href="#" class="nav-link">
                    <svg class="theme-icon" id="lightIcon" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="moon-stars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-moon-stars fa-w-16 fa-7x">
                        <g class="fa-group">
                            <path fill="currentColor" d="M320 32L304 0l-16 32-32 16 32 16 16 32 16-32 32-16zm138.7 149.3L432 128l-26.7 53.3L352 208l53.3 26.7L432 288l26.7-53.3L512 208z" class="fa-secondary"></path>
                            <path fill="currentColor" d="M332.2 426.4c8.1-1.6 13.9 8 8.6 14.5a191.18 191.18 0 0 1-149 71.1C85.8 512 0 426 0 320c0-120 108.7-210.6 227-188.8 8.2 1.6 10.1 12.6 2.8 16.7a150.3 150.3 0 0 0-76.1 130.8c0 94 85.4 165.4 178.5 147.7z" class="fa-primary"></path>
                        </g>
                    </svg>
                    <svg class="theme-icon" id="solarIcon" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="sun" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sun fa-w-16 fa-7x">
                        <g class="fa-group">
                            <path fill="currentColor" d="M502.42 240.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.41-94.8a17.31 17.31 0 0 0-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4a17.31 17.31 0 0 0 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.41-33.5 47.3 94.7a17.31 17.31 0 0 0 31 0l47.31-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3a17.33 17.33 0 0 0 .2-31.1zm-155.9 106c-49.91 49.9-131.11 49.9-181 0a128.13 128.13 0 0 1 0-181c49.9-49.9 131.1-49.9 181 0a128.13 128.13 0 0 1 0 181z" class="fa-secondary"></path>
                            <path fill="currentColor" d="M352 256a96 96 0 1 1-96-96 96.15 96.15 0 0 1 96 96z" class="fa-primary">
                            </path>
                        </g>
                    </svg>
                    <svg class="theme-icon" id="darkIcon" aria-hidden="true" focusable="false" data-prefix="fad" data-icon="sunglasses" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-sunglasses fa-w-18 fa-7x">
                        <g class="fa-group">
                            <path fill="currentColor" d="M574.09 280.38L528.75 98.66a87.94 87.94 0 0 0-113.19-62.14l-15.25 5.08a16 16 0 0 0-10.12 20.25L395.25 77a16 16 0 0 0 20.22 10.13l13.19-4.39c10.87-3.63 23-3.57 33.15 1.73a39.59 39.59 0 0 1 20.38 25.81l38.47 153.83a276.7 276.7 0 0 0-81.22-12.47c-34.75 0-74 7-114.85 26.75h-73.18c-40.85-19.75-80.07-26.75-114.85-26.75a276.75 276.75 0 0 0-81.22 12.45l38.47-153.8a39.61 39.61 0 0 1 20.38-25.82c10.15-5.29 22.28-5.34 33.15-1.73l13.16 4.39A16 16 0 0 0 180.75 77l5.06-15.19a16 16 0 0 0-10.12-20.21l-15.25-5.08A87.95 87.95 0 0 0 47.25 98.65L1.91 280.38A75.35 75.35 0 0 0 0 295.86v70.25C0 429 51.59 480 115.19 480h37.12c60.28 0 110.38-45.94 114.88-105.37l2.93-38.63h35.76l2.93 38.63c4.5 59.43 54.6 105.37 114.88 105.37h37.12C524.41 480 576 429 576 366.13v-70.25a62.67 62.67 0 0 0-1.91-15.5zM203.38 369.8c-2 25.9-24.41 46.2-51.07 46.2h-37.12C87 416 64 393.63 64 366.11v-37.55a217.35 217.35 0 0 1 72.59-12.9 196.51 196.51 0 0 1 69.91 12.9zM512 366.13c0 27.5-23 49.87-51.19 49.87h-37.12c-26.69 0-49.1-20.3-51.07-46.2l-3.12-41.24a196.55 196.55 0 0 1 69.94-12.9A217.41 217.41 0 0 1 512 328.58z" class="fa-secondary"></path>
                            <path fill="currentColor" d="M64.19 367.9c0-.61-.19-1.18-.19-1.8 0 27.53 23 49.9 51.19 49.9h37.12c26.66 0 49.1-20.3 51.07-46.2l3.12-41.24c-14-5.29-28.31-8.38-42.78-10.42zm404-50l-95.83 47.91.3 4c2 25.9 24.38 46.2 51.07 46.2h37.12C489 416 512 393.63 512 366.13v-37.55a227.76 227.76 0 0 0-43.85-10.66z" class="fa-primary"></path>
                        </g>
                    </svg>
                </a>
            </li>
        </ul>
    </nav>
    <div class='all' id='blur'>
        <div class="p-4 h-full">
            <!-- <a href="/gayale">Home</a>
            <a href="clothes">Clothes</a>
            <a href="foods">Foods</a>
            <a href="beverages">Beverages</a>
            <a href="accessories">Accessories</a>
            <a href="others">Others</a> -->
            <div class="w-[85%] ms-24">
                <div class="flex justify-between items-center">
                    <a href="gayale/create" class="">
                        <button class="bg-[#08243A] hover:bg-[#0d3b5f] text-white text-center text-3xl py-4 px-8 rounded-full lg:text-sm lg:px-5 lg:py-3 xl:text-md 2xl:text-lg">
                            Tambah Item
                        </button>
                    </a>
                    <form method="post" action="{{route('logout')}}" class="pt-4">
                        @csrf
                        <button class="bg-[#F98538] hover:bg-[#ff9854] focus:bg-[#d16f2e] text-white text-center text-3xl py-4 px-8 rounded-full lg:text-sm lg:px-5 lg:py-3 xl:text-md 2xl:text-lg" type='submit'>Logout</button>
                    </form>
                </div>
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