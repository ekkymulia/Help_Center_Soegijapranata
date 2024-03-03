<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageHistory extends Model
{
    use HasFactory;
    protected $table = 'message_history';

    protected $fillable = [
        'tiket_id',
        'role_id',
        'sender_id',
        'chat',
        'is_flagged'
    ];

    public function tiket(){
        return $this->belongsTo(Ticket::class, 'tiket_id');
    }

    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function sender(){
        return $this->belongsTo(User::class, 'sender_id');
    }
}
