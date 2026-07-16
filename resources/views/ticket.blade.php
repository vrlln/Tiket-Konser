<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Tiket Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 p-4 md:p-8 flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full bg-white rounded-3xl overflow-hidden shadow-2xl">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 text-center text-white">
            <h1 class="text-3xl font-black uppercase tracking-widest italic">CONCERT TICKET</h1>
            <p class="text-indigo-100 mt-1 opacity-80 italic">Verified & Paid</p>
        </div>

        <div class="p-6">
            <!-- Status & Date -->
            <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                <div class="text-left">
                    <p class="text-xs text-gray-400 uppercase font-semibold">Status</p>
                    <p class="text-green-600 font-bold flex items-center">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                        CONFIRMED
                    </p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-gray-400 uppercase font-semibold">Tanggal</p>
                    <p class="text-gray-800 font-bold">{{ date('d M Y') }}</p>
                </div>
            </div>

            <!-- Main Info -->
            <div class="space-y-6">
                <div>
                    <label class="text-xs text-gray-400 uppercase font-semibold">Nama Pemesan</label>
                    <p class="text-xl font-bold text-gray-900">{{ $ticket->name }}</p>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs text-gray-400 uppercase font-semibold">ID Tiket</label>
                        <p class="text-lg font-mono font-bold text-blue-600">{{ $ticket->ticket_id }}</p>
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 uppercase font-semibold">Kategori</label>
                        <p class="text-lg font-bold text-gray-900">{{ $ticket->seat_category }}</p>
                    </div>
                </div>

                <div class="pt-4 border-t border-gray-100">
                    <label class="text-xs text-gray-400 uppercase font-semibold mb-2 block">Scan QR Check-in</label>
                    <div class="bg-gray-50 p-4 rounded-2xl flex justify-center border border-gray-100">
                        {!! QrCode::size(160)->backgroundColor(249, 250, 251)->generate(route('ticket.verify', $ticket->ticket_id)) !!}
                    </div>
                </div>
            </div>

            <!-- Footer Details -->
            <div class="mt-8 text-center border-t-2 border-dashed border-gray-200 pt-6 relative">
                <!-- Hole cutouts -->
                <div class="absolute -left-10 -top-3 w-8 h-8 bg-slate-900 rounded-full"></div>
                <div class="absolute -right-10 -top-3 w-8 h-8 bg-slate-900 rounded-full"></div>
                
                <p class="text-xs text-gray-400 italic mb-4">Harap tunjukkan QR Code ini saat memasuki area konser</p>
                <a href="{{ route('ticket.download', $ticket->ticket_id) }}" 
                   class="inline-flex items-center justify-center w-full bg-indigo-600 text-white px-6 py-4 rounded-2xl font-bold hover:bg-indigo-700 transition-all transform hover:scale-[1.02] shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                    Unduh Struk Tiket (PDF)
                </a>
            </div>
        </div>
    </div>
</body>
</html>
