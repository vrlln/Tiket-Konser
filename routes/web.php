<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [RegistrationController::class, 'showForm']);
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');

Route::get('/payment/{ticket_id}', function ($ticket_id) {
    $ticket = App\Models\TicketRegistration::where('ticket_id', $ticket_id)->firstOrFail();
    return view('payment', compact('ticket'));
})->name('payment');

Route::get('/ticket/{ticket_id}', function ($ticket_id) {
    $ticket = App\Models\TicketRegistration::where('ticket_id', $ticket_id)->firstOrFail();
    return view('ticket', compact('ticket'));
})->name('ticket.show');

Route::get('/ticket/{ticket_id}/download', [App\Http\Controllers\TicketController::class, 'download'])->name('ticket.download');

Route::get('/confirmation/{ticket_id}', function ($ticket_id) {
    $ticket = App\Models\TicketRegistration::where('ticket_id', $ticket_id)->firstOrFail();
    return view('confirmation', compact('ticket'));
})->name('confirmation');

Route::get('/input-va/{ticket_id}', function ($ticket_id) {
    $ticket = App\Models\TicketRegistration::where('ticket_id', $ticket_id)->firstOrFail();
    return view('input-va', compact('ticket'));
})->name('input.va');

Route::get('/ticket-verify/{ticket_id}', function ($ticket_id) {
    $ticket = App\Models\TicketRegistration::where('ticket_id', $ticket_id)->firstOrFail();
    return view('verify', compact('ticket'));
})->name('ticket.verify');
