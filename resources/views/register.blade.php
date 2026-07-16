<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Tiket</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-lg">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Formulir Pendaftaran</h1>
        <form action="{{ route('register.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">ID Tiket</label>
                <input type="text" value="AUTO-GENERATE" readonly class="w-full mt-1 p-2 border rounded-lg bg-gray-100">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" required class="w-full mt-1 p-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">No WhatsApp</label>
                <input type="number" name="phone" required class="w-full mt-1 p-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required class="w-full mt-1 p-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Kategori Kursi</label>
                <select name="seat_category" class="w-full mt-1 p-2 border rounded-lg">
                    <option value="VIP">VIP - Rp500.000</option>
                    <option value="Bawah Panggung">Bawah Panggung - Rp350.000</option>
                    <option value="Reguler Tengah">Reguler Tengah - Rp200.000</option>
                    <option value="Reguler Kanan">Reguler Kanan - Rp150.000</option>
                    <option value="Reguler Kiri">Reguler Kiri - Rp150.000</option>
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 transition">Pesan Tiket</button>
        </form>
    </div>
</body>
</html>
