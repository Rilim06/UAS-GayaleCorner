<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto max-w-5xl">
        <div class="grid grid-cols-3 gap-4 p-4 rounded-3xl">
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded-full">
                    Pesanan Masuk
                </button>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded-full">
                    Berlangsung
                </button>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded-full">
                    Selesai Pesanan Masuk
                </button>
        </div>
    </div>
    <?php
    // Contoh array data input (bisa berasal dari formulir atau DB)
    $orders = [
        [
            "orderNumber" => "ORD/XI/2023/12345/",
            "customerName" => "John Doe",
            "orderDate" => "11 Nov; 11:11",
            "courier" => "JNE",
            "deliveryLocation" => "Surabaya",
        ],
        [
            "orderNumber" => "ORD/X/2010/99999/",
            "customerName" => "John Wick",
            "orderDate" => "1 Jan; 12:00",
            "courier" => "Si Cepat",
            "deliveryLocation" => "Bandung"
        ],
    ];

    // Loop
    foreach ($orders as $order) {
        ?>
        <div class="container mx-auto max-w-5xl px-4 py-2">
            <div class="bg-white shadow-lg rounded-3xl p-8 flex justify-between items-start">
                <div class="flex flex-col my-8">
                    <h2 class="text-2xl font-bold">
                        <?php echo $order['orderNumber']; ?>
                    </h2>
                    <p class="text-gray-600">
                        <?php echo $order['customerName']; ?>
                    </p>
                </div>
                <div class="ml-4">
                    <div class="mb-4">
                        <p class="text-lg font-semibold">
                            <?php echo $order['orderDate']; ?>
                        </p>
                    </div>
                    <div class="mb-4">
                        <p><?php echo $order['courier']; ?></p>
                    </div>
                    <div class="mb-4">
                        <p><?php echo $order['deliveryLocation']; ?></p>
                    </div>
                </div>
                <div class="ml-4">
                    <div class="flex flex-col space-y-4">
                        <button style="background-color: #FE8A3B;" class="hover:bg-FE8A3B-700 hover:text-white font-bold py-2 px-4 rounded-2xl">Detail Pesanan</button>
                        <button style="background-color: #FE8A3B;" class="hover:bg-FE8A3B-700 hover:text-white font-bold py-2 px-4 rounded-2xl">Cek Pembayaran</button>
                    </div>
                </div>
            </div>
        </div>

        <?php
    }
    ?>
</body>
</html>
