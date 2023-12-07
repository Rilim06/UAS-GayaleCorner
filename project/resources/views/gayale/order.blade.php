<head>
    @vite('resources/css/app.css')
</head>

<body>
    <div class='all' id='blur'>
        <a href="/gayale">Home</a>
        <select id="statusFilter">
            <option value="all">All</option>
            <option value="0">Pending</option>
            <option value="1">Packaging</option>
            <option value="2">Delivering</option>
            <option value="3">Arrived</option>
        </select>
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
        <div class="transactions">
            <div class="bg-[#ebe0ce] shadow-6xl rounded-lg p-4 status-{{ $status }}" onclick='openPopup(
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
            <div class="bg-[#ebe0ce] shadow-6xl rounded-lg p-4">
                <button onclick='openBukti(@json($transactions->toArray()))'>Bukti Pembayaran</button>
            </div>
            <div class="bg-[#ebe0ce] shadow-6xl rounded-lg p-4">
                <form action="/transaction/{{$transaction->transaction_id}}" method="post"
                    id="updateForm{{$transaction->transaction_id}}">
                    @method('PATCH')
                    @csrf
                    <select name="status"
                        onchange="document.getElementById('updateForm{{$transaction->transaction_id}}').submit()">
                        <option value="0" {{ $transaction->status == 0 ? 'selected' : '' }}>Pending</option>
                        <option value="1" {{ $transaction->status == 1 ? 'selected' : '' }}>Packaging</option>
                        <option value="2" {{ $transaction->status == 2 ? 'selected' : '' }}>Delivering</option>
                        <option value="3" {{ $transaction->status == 3 ? 'selected' : '' }}>Arrived</option>
                    </select>
                </form>

            </div>
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
        <p id="user"></p>
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

    <div id='popupBukti'>
        <img src='' id="paymentProofImage">
        <a class="closing" onclick='closePopupBukti()'>
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
        var userElement = document.getElementById('user');

        var user = details[0].user_id;
        userElement.textContent = `User ID: ${user}`;
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

    function openBukti(paymentDetails) {
        var blur = document.getElementById('blur');
        var popupBukti = document.getElementById('popupBukti');
        var imgElement = document.querySelector('#popupBukti img');

        var imageUrl = paymentDetails[0].payment;
        imgElement.src = `storage/${imageUrl}`;

        var isBuktiPopupActive = popupBukti.classList.contains('active');

        if (!isBuktiPopupActive) {
            blur.classList.add('active');
            popupBukti.classList.add('active');
        } else {
            blur.classList.remove('active');
            popupBukti.classList.remove('active');
        }
    }

    function closePopup() {
        var blur = document.getElementById('blur');
        var popup = document.getElementById('popup');

        blur.classList.remove('active');
        popup.classList.remove('active');
    }

    function closePopupBukti() {
        var blur = document.getElementById('blur');
        var popup = document.getElementById('popupBukti');

        blur.classList.remove('active');
        popup.classList.remove('active');
    }

    document.addEventListener('DOMContentLoaded', function () {
    const statusFilter = document.getElementById('statusFilter');
    const transactionDivs = document.querySelectorAll('.transactions');

    statusFilter.addEventListener('change', function () {
        const selectedStatus = statusFilter.value;

        transactionDivs.forEach(function (transaction) {
            const divStatus = transaction.querySelector('.bg-[#ebe0ce]').classList;
            const transactionStatus = Array.from(divStatus).find(cls => cls.startsWith('status-'));
            if (selectedStatus === 'all' || transactionStatus === `status-${selectedStatus}`) {
                transaction.style.display = 'block';
            } else {
                transaction.style.display = 'none';
            }
        });
    });
});

</script>