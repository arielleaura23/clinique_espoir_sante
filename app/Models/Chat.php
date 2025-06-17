<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'name', // nom du chat/groupe
    ];

    // Relation : un chat a plusieurs messages
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // Relation : un chat a plusieurs utilisateurs (participants)
    public function users()
    {
        return $this->belongsToMany(User::class, 'chat_user'); // table pivot chat_user à créer
    }
}
