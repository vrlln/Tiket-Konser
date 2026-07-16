<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 min-h-screen py-12 px-4 flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-10 rounded-3xl shadow-xl border border-slate-100">
        <h1 class="text-3xl font-bold mb-8 text-slate-900 text-center">Konfirmasi</h1>
        
        @if(session('error'))
            <div class="bg-red-50 text-red-600 p-4 rounded-2xl mb-6 text-sm font-medium border border-red-100">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-slate-50 p-6 rounded-2xl mb-8 space-y-4">
            <div class="flex justify-between items-center border-b border-slate-200 pb-3">
                <span class="text-slate-500 text-sm">ID Tiket</span>
                <span class="font-bold text-blue-600 font-mono">{{ $ticket->ticket_id }}</span>
            </div>
            <div class="flex justify-between items-center border-b border-slate-200 pb-3">
                <span class="text-slate-500 text-sm">Pemesan</span>
                <span class="font-bold text-slate-900">{{ $ticket->name }}</span>
            </div>
            <div class="flex justify-between items-center border-b border-slate-200 pb-3">
                <span class="text-slate-500 text-sm">Kategori</span>
                <span class="font-bold text-slate-900">{{ $ticket->seat_category }}</span>
            </div>
            <div class="flex justify-between items-center pt-2">
                <span class="text-slate-500 text-sm">Total Bayar</span>
                <span class="text-2xl font-black text-slate-900 italic">Rp{{ number_format($ticket->price, 0, ',', '.') }}</span>
            </div>
        </div>

        <div class="space-y-4">
            <button id="pay-button" class="w-full bg-blue-600 text-white py-5 rounded-2xl font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-200 flex items-center justify-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                <span id="btn-text">Bayar Sekarang</span>
            </button>

            <div class="p-4 bg-amber-50 rounded-2xl border border-amber-100 flex items-start space-x-3">
                <svg class="w-5 h-5 text-amber-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p class="text-xs text-amber-700 leading-relaxed font-medium">
                    Setelah menyalin nomor VA dari pop-up Midtrans, klik tombol konfirmasi di bawah.
                </p>
            </div>
            
            <a href="{{ route('input.va', $ticket->ticket_id) }}" class="block w-full bg-slate-900 text-white py-5 rounded-2xl font-bold hover:bg-slate-800 transition text-center shadow-lg shadow-slate-200">
                Konfirmasi Input VA
            </a>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script>
        document.getElementById('pay-button').onclick = function () {
            const btn = document.getElementById('pay-button');
            const btnText = document.getElementById('btn-text');
            btnText.innerText = 'Menghubungkan...';
            btn.disabled = true;

            snap.pay('{{ $ticket->snap_token }}', {
                onSuccess: function(result) { window.location.href = "{{ route('ticket.show', $ticket->ticket_id) }}"; },
                onPending: function(result) { btnText.innerText = 'Bayar Sekarang'; btn.disabled = false; },
                onError: function(result) { alert('Pembayaran gagal'); btnText.innerText = 'Bayar Sekarang'; btn.disabled = false; }
            });
        };
    </script>
</body>
</html>
