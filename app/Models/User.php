<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * Les attributs que l'on peut remplir massivement.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'sexe',
        'dob',
        'age',
        'phone',
        'address',
        'city',
        'specialization',
        'consultancy_fees',
        'medical_history',
        'doctor_id',
        'role',
        'email_verified_at',
    ];

    /**
     * Les attributs masqués dans les tableaux ou JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs convertis automatiquement à des types natifs.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'dob' => 'date',
        'age' => 'integer',
        'consultancy_fees' => 'float',
    ];

    /**
     * Relation : Un patient peut être suivi par un médecin.
     */
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    /**
     * Relation : Un médecin peut avoir plusieurs patients.
     */
    public function patients()
    {
        return $this->hasMany(User::class, 'doctor_id');
    }
}
