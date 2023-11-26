<a href="/gayale">Home</a>
<a href="/cart">Back</a>
@foreach($carts as $cart)
<div>
    <h3>{{ $cart->product->name }}</h3>
    <p>Quantity: {{ $cart->quantity }}</p>
    <p>Price per item: {{ $cart->product->price }}</p>
    <p>Total Price: {{ $cart->quantity * $cart->product->price }}</p>
</div>
@endforeach

<br />
<br />
<p>Total: {{ $carts->sum(function ($cart) {
    return $cart->quantity * $cart->product->price;
    }) }}</p>