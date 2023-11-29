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
        <div class="bg-[#ebe0ce] shadow-6xl rounded-lg p-4"
            onclick='openPopup()'>
            <h2>Transaction ID: {{ $transactionID }}</h2>
            <p>Status: {{ $status }}</p>
            @foreach($transactions as $transaction)
            <div>
                <p>{{ $transaction->product->name }}</p>
                <p>Quantity: {{ $transaction->quantity }}</p>
            </div>
            @endforeach
        </div>
        <!-- Untuk per transactions -->

        <br />
        <br />
        @endforeach
    </div>

    <!-- Popup -->
    <div id='popup'>
        <!-- <h3 id="transactionId"></h3>
        <p id="transactionStatus"></p>
        <p id="transactionSubtotal"></p>
        <p id="transactionTax"></p>
        <p id="transactionTotal"></p>
        <p id="transactionTimestamp"></p> -->
        Detail transaction here

        <div class="closing">
            <a class="closing" onclick='openPopup()'>
                <button class="closeBtn">
                    <span class="X"></span>
                    <span class="Y"></span>
                </button>
            </a>
        </div>
    </div>
</body>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script type='text/javascript'>
    function openPopup() {
        var blur = document.getElementById('blur');
        var popup = document.getElementById('popup');

        var isPopupActive = popup.classList.contains('active');

        if (!isPopupActive) {
            blur.classList.add('active');
            popup.classList.add('active');
        } else {
            blur.classList.remove('active');
            popup.classList.remove('active');
        }
    }
</script>