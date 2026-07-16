<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketRegistration extends Model
{
    protected $fillable = [
        'ticket_id',
        'name',
        'phone',
        'email',
        'seat_category',
        'price',
        'status',
        'snap_token',
    ];
}
