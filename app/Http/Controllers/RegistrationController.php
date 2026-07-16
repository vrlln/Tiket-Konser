<?php

namespace App\Http\Controllers;

use App\Models\TicketRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class RegistrationController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function showForm()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'seat_category' => 'required|in:VIP,Bawah Panggung,Reguler Tengah,Reguler Kanan,Reguler Kiri',
        ]);

        $prices = [
            'VIP' => 500000,
            'Bawah Panggung' => 350000,
            'Reguler Tengah' => 200000,
            'Reguler Kanan' => 150000,
            'Reguler Kiri' => 150000,
        ];

        $ticket = TicketRegistration::create([
            'ticket_id' => 'TIKET-' . Str::upper(Str::random(8)),
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'seat_category' => $validated['seat_category'],
            'price' => $prices[$validated['seat_category']],
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $ticket->ticket_id,
                'gross_amount' => $ticket->price,
            ],
            'customer_details' => [
                'first_name' => $ticket->name,
                'email' => $ticket->email,
                'phone' => $ticket->phone,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        $ticket->update(['snap_token' => $snapToken]);

        return redirect()->route('payment', $ticket->ticket_id);
    }
}
