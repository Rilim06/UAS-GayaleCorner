<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    </head>
    <body>
        <div class="container">
            <h1 class="cartTitle">Keranjang</h1>
            <div class="itemContainer">
                <div class="item">
                    <div class="delete itemSection">
                        <form action="" method="post">
                            @method('DELETE')
                            @csrf
                            <button><img src="{{ asset('icons/deleteIcon.svg')}}" alt=""></button>
                        </form>
                    </div>
                    <div class="pic itemSection">
                        <img src="https://www.gstatic.com/webp/gallery3/1.sm.png" alt="">
                    </div>
                    <div class="info itemSection">
                        <div class="infoContent">
                            <p>Makaroni</p>
                            <h3>Rp. 35.000,-</h3>
                            <div class="infoCount">
                                <button class="countBtn">
                                    <img src="{{ asset('icons/subtract.svg') }}" alt="">
                                </button>
                                <h3>1</h3>
                                <button class="countBtn">
                                    <img src="{{ asset('icons/add.svg') }}" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="total itemSection">
                        <p>Total: </p>
                        <h3>Rp. 35.000,-</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="delete itemSection">
                        <form action="" method="post">
                            @method('DELETE')
                            @csrf
                            <button><img src="{{ asset('icons/deleteIcon.svg')}}" alt=""></button>
                        </form>
                    </div>
                    <div class="pic itemSection">
                        <img src="https://www.gstatic.com/webp/gallery3/1.sm.png" alt="">
                    </div>
                    <div class="info itemSection">
                        <div class="infoContent">
                            <p>Salad</p>
                            <h3>Rp. 20.000,-</h3>
                            <div class="infoCount">
                                <button class="countBtn">
                                    <img src="{{ asset('icons/subtract.svg') }}" alt="">
                                </button>
                                <h3>1</h3>
                                <button class="countBtn">
                                    <img src="{{ asset('icons/add.svg') }}" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="total itemSection">
                        <p>Total: </p>
                        <h3>Rp. 100.000,-</h3>
                    </div>
                </div>
                <div class="item">
                    <div class="delete itemSection">
                        <form action="" method="post">
                            @method('DELETE')
                            @csrf
                            <button><img src="{{ asset('icons/deleteIcon.svg')}}" alt=""></button>
                        </form>
                    </div>
                    <div class="pic itemSection">
                        <img src="https://www.gstatic.com/webp/gallery3/1.sm.png" alt="">
                    </div>
                    <div class="info itemSection">
                        <div class="infoContent">   
                            <p>Kemeja</p>
                            <h3>Rp. 65.000,-</h3>
                            <div class="infoCount">
                                <button class="countBtn">
                                    <img src="{{ asset('icons/subtract.svg') }}" alt="">
                                </button>
                                <h3>1</h3>
                                <button class="countBtn">
                                    <img src="{{ asset('icons/add.svg') }}" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="total itemSection">
                        <p>Total: </p>
                        <h3>Rp. 130.000,-</h3>
                    </div>
                </div>

                <div class="address"> 
                    <img src="{{ asset('icons/addressbox.svg') }}" alt="">
                    <div class="addressContent">
                        <div class="addressTop">
                            <p>PaskahIcad</p>
                            <p>+62 012-2192-0391</p>
                        </div>
                        <div class="addressBot">
                            <h3>JL.Semarecon serpong damai sektor 2 no 7 SERPONG, TANGGERANG SELATAN, BANTEN, ID 15133</h3>
                        </div>
                    </div>
                </div>

                <div class="checkout">
                    <div class="checkoutContent">
                        <div class="checkoutLeft">
                                <div class="checkoutPrice sub">
                                    <p>Subtotal</p>
                                    <p>Rp. 70.000,-</p>
                                </div>
                                <div class="checkoutPrice">
                                    <p>Ongkos Kirim</p>
                                    <p>Rp. 9.000,-</p>
                                </div>
                                <div class="checkoutPrice checkoutTotal">
                                    <p>Total</p>
                                    <p>Rp. 79.000,-</p>
                                </div>
                        </div>
                        <img src="{{ asset('icons/line.svg') }}" alt="">
                        <div class="checkoutRight">
                            <div class="deliveryBox">
                                <input type="radio" name="deliveryOpt" id="jne" value="jne">
                                <label for="jne" class="deliBtn">
                                    <img src="{{asset('icons/jne.svg')}}" alt="">
                                </label>
                            </div>
                            <div class="deliveryBox">
                                <input type="radio" name="deliveryOpt" id="jnt" value="jnt">
                                <label for="jnt" class="deliBtn">
                                    <img src="{{asset('icons/jnt.svg')}}" alt="">
                                </label>
                            </div>
                            <div class="deliveryBox">
                                <input type="radio" name="deliveryOpt" id="scpt" value="scpt">
                                <label for="scpt" class="deliBtn">
                                    <img src="{{asset('icons/scpt.svg')}}" alt="">
                                </label>
                            </div>
                            <div class="deliveryBox">
                                <input type="radio" name="deliveryOpt" id="whn" value="whn">
                                <label for="whn" class="deliBtn">
                                    <img src="{{asset('icons/whn.svg')}}" alt="">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="checkoutBtn">Checkout</button>
            </div>
            @foreach($carts as $cart)
            <div>
                <h3>{{ $cart->product->name }}</h3>
                <p>Quantity: {{ $cart->quantity }}</p>
                <p>Price per item: {{ $cart->product->price }}</p>
                <p>Total Price: {{ $cart->quantity * $cart->product->price }}</p>
                <form action="/cart/{{$cart->id}}" method="post" id="updateForm{{$cart->id}}">
                    @method('PATCH')
                    @csrf
                    <input type="checkbox" name="is_checked" value="1" {{ $cart->is_checked ? 'checked' : '' }}
                    onchange="document.getElementById('updateForm{{$cart->id}}').submit()">
                </form>
                <form action="/cart/{{$cart->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </div>
            @endforeach
            <a href="/gayale">Home</a>
            <a href="/checkout">Checkout</a>
        </div>
    </body>
</html>
