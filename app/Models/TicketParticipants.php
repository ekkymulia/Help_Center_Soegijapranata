<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketParticipants extends Model
{
    use HasFactory;
    protected $table = 'ticket_participants';

    protected $fillable = [
        'tiket_id',
        'user_id',
        'status',
        'type'
    ];  

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'tiket_id');
    }

}
