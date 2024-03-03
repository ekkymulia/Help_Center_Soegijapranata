<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';

    protected $fillable = [
        'judul',
        'deskripsi',
        'topik_id',
        'user_id',
        'status_layanan',
        'is_public',
        'takeover_id',
        'is_active',
        'chat_api_id',
    ];

    public function participants()
    {
        return $this->hasMany(TicketParticipants::class, 'tiket_id', 'id');
    }

    public function topik()
    {
        return $this->belongsTo(Topic::class, 'topik_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function takeover(){
        return $this->belongsTo(Role::class, 'takeover_id');
    }
}
