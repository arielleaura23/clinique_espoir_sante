<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'fullname', 'address', 'city', 'gender', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
