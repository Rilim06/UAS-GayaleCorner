<head>
    @vite('resources/css/app.css')
</head>
<body>
<a href="/gayale">Home</a>
<a href="/cart">Back</a>
<div class='all'id='blur'>
@foreach($carts as $cart)
<div>
    <h3>{{ $cart->product->name }}</h3>
    <p>Quantity: {{ $cart->quantity }}</p>
    <p>Price per item: {{ $cart->product->price }}</p>
    <p>Total Price: {{ $cart->quantity * $cart->product->price }}</p>
</div>
<br />
@endforeach

<!-- Hitung total -->
<p>Subtotal: {{ $carts->sum(function ($cart) {
    return $cart->quantity * $cart->product->price;
    }) }}</p>
<p>Ongkir: 10000</p>
<p>Tax 10%: {{ $carts->sum(function ($cart) {
    return $cart->quantity * $cart->product->price * 0.1;
    }) }}</p>
@php
$subtotal = $carts->sum(function ($cart) {
return $cart->quantity * $cart->product->price;
});
$tax = $carts->sum(function ($cart) {
return $cart->quantity * $cart->product->price * 0.1;
});
$total = $subtotal + $tax + 10000; // Subtotal + Tax + Ongkir
@endphp
<p>Total: {{ $total }}</p>
<!-- Hitung total -->

<h3>Silakan memasukkan alamat dan bukti pembayaran anda </h3>
<div id="error-message" style="display: none; color: red;">
        Please fill in the address and select a photo.
</div>
<form id="transactionForm" action="/transaction" method="post" enctype="multipart/form-data">
    @csrf
    Alamat: <textarea name="address" required></textarea><br />
    Bukti Pembayaran: <input type="file" name="photo" required/><br />

    @foreach($carts as $cart)
    <input type="hidden" name="carts[{{ $loop->index }}][product_id]" value="{{ $cart->product->id }}">
    <input type="hidden" name="carts[{{ $loop->index }}][quantity]" value="{{ $cart->quantity }}">
    @endforeach

    <button type="submit" onclick="showPopup(event)"><b>Pesan</b></button>
</form>
</div>

<div id='popup'>
    <h1>Pesanan anda telah diterima, silahkan menunggu barang anda sampai</h1>
    <h1>Untuk mengecek pesanan anda, dapat dilihat pada bagian history</h1>
    <h1>Terima kasih telah berbelanja di Gayale Corner</h1>
</div>
</body>

<!-- popup -->
<script type='text/javascript'>
    function showPopup(event) {
        event.preventDefault();

        var address = document.querySelector('textarea[name="address"]').value;
        var photo = document.querySelector('input[name="photo"]').value;

        if (address.trim() !== '' && photo.trim() !== '') {
            var blur = document.getElementById('blur');
            var popup = document.getElementById('popup');

            blur.classList.add('active');
            popup.classList.add('active');

            setTimeout(function() {
                document.getElementById('transactionForm').submit();
            }, 3000);
        } else {
            var errorMessage = document.getElementById('error-message');
            errorMessage.style.display = 'block';

            setTimeout(function() {
                errorMessage.style.display = 'none';
            }, 3000);
        }
    }
</script>
