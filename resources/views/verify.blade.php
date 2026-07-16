<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Tiket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-lg text-center">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Verifikasi Tiket</h1>
        <p class="text-green-600 font-bold text-xl">Tiket Valid!</p>
        <div class="mt-4 p-4 border rounded-lg bg-gray-50 text-left">
            <p><strong>ID:</strong> {{ $ticket->ticket_id }}</p>
            <p><strong>Nama:</strong> {{ $ticket->name }}</p>
            <p><strong>Kategori:</strong> {{ $ticket->seat_category }}</p>
        </div>
    </div>
</body>
</html>
