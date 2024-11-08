<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketFile extends Model
{
    use HasFactory;

    protected $table = 'ticket_files';

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
