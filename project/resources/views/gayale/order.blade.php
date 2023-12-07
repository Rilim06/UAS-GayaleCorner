<head>
    @vite('resources/css/app.css')
</head>
<body>
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
        </body>