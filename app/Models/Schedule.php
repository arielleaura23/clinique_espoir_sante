<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'date',
        'start_time',
        'end_time',
        'patient_name',
        'motif'
    ];

    public function doctor()
    {
        return $this->belongsTo(Medecin::class, 'doctor_id');
    }
}

