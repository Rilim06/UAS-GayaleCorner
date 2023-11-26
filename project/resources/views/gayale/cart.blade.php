<a href="/gayale">Home</a>
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
<a href="/checkout">Checkout</a>