<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 


class Medecin extends Model
{
    use HasFactory;



    protected $fillable = [
        'FullName',
        'MobileNumber',
        'Email',
        'Specialization',
        'Password',
        'CreationDate',
    ];

    // Les attributs qui doivent être cachés pour les tableaux.
    protected $hidden = [
        'Password',
    ];

    // Les attributs qui doivent être castés en types natifs.
    protected $casts = [
        'CreationDate' => 'datetime',
    ];

    // Définir la relation avec le modèle Appointment (un médecin peut avoir plusieurs rendez-vous)
    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }
}
