<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Tiket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-50 min-h-screen py-12 px-4">
    <div class="max-w-xl mx-auto bg-white p-10 rounded-3xl shadow-xl border border-slate-100">
        <h1 class="text-3xl font-bold mb-8 text-slate-900">Formulir Pendaftaran</h1>
        <form action="{{ route('register.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-600 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" required class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 transition">
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-600 mb-2">No WhatsApp</label>
                        <input type="number" name="phone" required class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-600 mb-2">Email</label>
                        <input type="email" name="email" required class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 transition">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-600 mb-2">Kategori Kursi</label>
                    <select name="seat_category" class="w-full p-4 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500 transition">
                        <option value="VIP">VIP - Rp500.000</option>
                        <option value="Bawah Panggung">Bawah Panggung - Rp350.000</option>
                        <option value="Reguler Tengah">Reguler Tengah - Rp200.000</option>
                        <option value="Reguler Kanan">Reguler Kanan - Rp150.000</option>
                        <option value="Reguler Kiri">Reguler Kiri - Rp150.000</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="w-full bg-slate-900 text-white p-4 rounded-2xl font-bold hover:bg-slate-800 transition transform hover:scale-[1.01]">Pesan Tiket Sekarang</button>
        </form>
    </div>
</body>
</html>
