<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Konfirmasi Pemesanan</h1>
        <div class="bg-gray-50 p-4 rounded-lg mb-6 space-y-2">
            <p><strong>ID Tiket:</strong> {{ $ticket->ticket_id }}</p>
            <p><strong>Nama:</strong> {{ $ticket->name }}</p>
            <p><strong>Kursi:</strong> {{ $ticket->seat_category }}</p>
            <p class="text-xl font-bold">Total: Rp{{ number_format($ticket->price, 0, ',', '.') }}</p>
        </div>
        <button id="pay-button" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-bold">Bayar Sekarang</button>
    </div>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script>
        document.getElementById('pay-button').onclick = function () {
            snap.pay('{{ $ticket->snap_token }}', {
                onSuccess: function(result){ window.location.href = "{{ route('ticket.show', $ticket->ticket_id) }}"; },
                onPending: function(result){ alert("Menunggu pembayaran!"); },
                onError: function(result){ alert("Pembayaran gagal!"); }
            });
        };
    </script>
</body>
</html>
