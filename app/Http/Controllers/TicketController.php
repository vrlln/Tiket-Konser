<?php

namespace App\Http\Controllers;

use App\Models\TicketRegistration;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function download($ticket_id)
    {
        $ticket = TicketRegistration::where('ticket_id', $ticket_id)->firstOrFail();
        $pdf = Pdf::loadView('ticket-pdf', compact('ticket'));
        return $pdf->download('E-Tiket-' . $ticket->ticket_id . '.pdf');
    }
}
