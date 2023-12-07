<head>
    @vite('resources/css/app.css')
</head>

<body>
    <div class='all' id='blur'>
        <a href="/gayale">Home</a>
        @foreach($groupedTransactions as $transactionID => $transactions)
        @php
        $status = 'Unknown';

        if ($transactions->isNotEmpty()) {
        $firstTransaction = $transactions->first();

        if ($firstTransaction->status == 0) {
        $status = 'Pending';
        } elseif ($firstTransaction->status == 1) {
        $status = 'Packaging';
        } elseif ($firstTransaction->status == 2) {
        $status = 'Delivering';
        } elseif ($firstTransaction->status == 3) {
        $status = 'Arrived';
        }
        }
        @endphp
        <!-- Untuk per transactions -->
        <div class="bg-[#ebe0ce] shadow-6xl rounded-lg p-4" onclick='openPopup(
                "{{ $transactionID }}",
                "{{ $status }}",
                @json($transactions->toArray())
            )'>
            <h2>Transaction ID: {{ $transactionID }}</h2>
            <p>Status: {{ $status }}</p>
            @foreach ($transactions as $transaction)
            <p>{{ $transaction->product->name }}&nbsp;&nbsp;&nbsp;x{{ $transaction->quantity }}</p>
            @endforeach
        </div>

        <!-- Untuk per transactions -->
        <br />
        <br />
        @endforeach
    </div>

    <!-- Popup -->
    <div id='popup'>
        <h3 id="transactionId">Transaction ID: </h3>
        <p>Status: <span id="transactionStatus"></span></p>
        <p id="transactionAddress"></p>
        <div id="transactionDetails"></div>
        <p id="price"></p>
        <p>Ongkir: 10000</p>
        <p id="tax"></p>
        <p id="total"></p>
        <p id="transactionDate"></p>
        <a class="closing" onclick='closePopup()'>
            <button class="closeBtn">
                <span class="X"></span>
                <span class="Y"></span>
            </button>
        </a>

    </div>

</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script type='text/javascript'>
    function openPopup(transactionID, status, details) {
        var blur = document.getElementById('blur');
        var popup = document.getElementById('popup');
        var statusElement = document.getElementById('transactionStatus');
        var detailsElement = document.getElementById('transactionDetails');
        var idElement = document.getElementById('transactionId');
        var dateElement = document.getElementById('transactionDate');
        var addressElement = document.getElementById('transactionAddress');
        var priceElement = document.getElementById('price');
        var taxElement = document.getElementById('tax');
        var totalElement = document.getElementById('total');

        idElement.textContent = `Transaction ID: ${transactionID}`;
        statusElement.textContent = status;
        var address = details[0].address;
        addressElement.textContent = `Address: ${address}`;
        var rawDate = details[0].created_at;
        var date = new Date(rawDate);
        var formattedDate = date.toLocaleString();
        dateElement.textContent = `Ordered at: ${formattedDate}`;
        detailsElement.innerHTML = '';

        var allPrice = 0;

        details.forEach(function (transaction) {
            var detailDiv = document.createElement('div');
            var price = transaction.quantity * transaction.product.price;
            allPrice += price;
            detailDiv.innerHTML = `
            <p>${transaction.product.name}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x${transaction.quantity}&nbsp;&nbsp;&nbsp;${price}</p>
        `;
            detailsElement.appendChild(detailDiv);
        });

        var tax = allPrice * 0.1;
        var total = allPrice + tax + 10000;

        priceElement.textContent = `Subtotal: ${allPrice}`;
        taxElement.textContent = `Tax (10%): ${tax}`;
        totalElement.textContent = `Total: ${total}`;

        var isPopupActive = popup.classList.contains('active');

        if (!isPopupActive) {
            blur.classList.add('active');
            popup.classList.add('active');
        } else {
            blur.classList.remove('active');
            popup.classList.remove('active');
        }
    }

    function closePopup() {
        var blur = document.getElementById('blur');
        var popup = document.getElementById('popup');

        blur.classList.remove('active');
        popup.classList.remove('active');
    }
</script>