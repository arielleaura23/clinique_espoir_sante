<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id',
        'chat_id',
        'content',
    ];

    // Relation : un message appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation : un message appartient à un chat
    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
