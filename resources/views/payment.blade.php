<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Ringkasan Pembayaran</h1>
        <div class="space-y-3 mb-6">
            <p><strong>ID Tiket:</strong> {{ $ticket->ticket_id }}</p>
            <p><strong>Nama:</strong> {{ $ticket->name }}</p>
            <p><strong>Kategori:</strong> {{ $ticket->seat_category }}</p>
            <p class="text-xl"><strong>Total:</strong> Rp{{ number_format($ticket->price, 0, ',', '.') }}</p>
        </div>
        <button id="pay-button" class="w-full bg-green-600 text-white p-3 rounded-lg hover:bg-green-700 transition">Lanjutkan Pembayaran</button>
    </div>

    <!-- Midtrans Script -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script>
        document.getElementById('pay-button').onclick = function () {
            snap.pay('{{ $ticket->snap_token }}', {
                onSuccess: function(result){
                    window.location.href = "{{ route('ticket.show', $ticket->ticket_id) }}";
                },
                onPending: function(result){
                    alert("Menunggu pembayaran Anda!");
                },
                onError: function(result){
                    alert("Pembayaran gagal!");
                }
            });
        };
    </script>
</body>
</html>
