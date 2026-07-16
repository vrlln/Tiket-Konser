<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Nomor VA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8 flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Verifikasi Nomor VA</h1>
        <p class="text-gray-600 mb-6">Silakan masukkan kembali nomor Virtual Account yang Anda copy untuk konfirmasi sistem:</p>
        
        <form action="{{ route('ticket.show', $ticket->ticket_id) }}" method="GET" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nomor Virtual Account</label>
                <input type="text" name="va_number" required placeholder="Contoh: 888123456789" 
                    class="w-full mt-1 p-3 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-bold shadow-md">
                Konfirmasi & Lihat Tiket
            </button>
        </form>
    </div>
</body>
</html>
