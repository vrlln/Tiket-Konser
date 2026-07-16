<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; background-color: #f8fafc; color: #1e293b; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .header { background: linear-gradient(to right, #2563eb, #4338ca); color: white; padding: 30px; text-align: center; }
        .header h1 { margin: 0; font-size: 24px; letter-spacing: 4px; text-transform: uppercase; }
        .content { padding: 30px; }
        .info-group { margin-bottom: 20px; border-bottom: 1px solid #f1f5f9; padding-bottom: 10px; }
        .label { font-size: 10px; color: #94a3b8; text-transform: uppercase; font-weight: bold; margin-bottom: 4px; }
        .value { font-size: 18px; font-weight: bold; color: #0f172a; }
        .id-value { color: #2563eb; font-family: monospace; }
        .qr-section { text-align: center; margin-top: 30px; padding: 20px; background: #f8fafc; border-radius: 15px; }
        .footer { text-align: center; font-size: 10px; color: #64748b; margin-top: 20px; border-top: 1px dashed #e2e8f0; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>CONCERT TICKET</h1>
            <div style="font-size: 12px; margin-top: 5px; opacity: 0.8;">OFFICIAL RECEIPT</div>
        </div>
        <div class="content">
            <div class="info-group">
                <div class="label">Nama Pemesan</div>
                <div class="value">{{ $ticket->name }}</div>
            </div>
            <div style="display: table; width: 100%;">
                <div style="display: table-cell; width: 50%;">
                    <div class="info-group">
                        <div class="label">ID Tiket</div>
                        <div class="value id-value">{{ $ticket->ticket_id }}</div>
                    </div>
                </div>
                <div style="display: table-cell; width: 50%;">
                    <div class="info-group">
                        <div class="label">Kategori</div>
                        <div class="value">{{ $ticket->seat_category }}</div>
                    </div>
                </div>
            </div>
            <div class="qr-section">
                <div class="label" style="margin-bottom: 15px;">SCAN UNTUK VERIFIKASI</div>
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(150)->generate(route('ticket.verify', $ticket->ticket_id))) !!} ">
            </div>
            <div class="footer">
                <p>Tiket ini adalah bukti pembayaran yang sah. Harap tunjukkan tiket ini saat memasuki area konser.</p>
                <p>&copy; 2026 Concert Management</p>
            </div>
        </div>
    </div>
</body>
</html>
