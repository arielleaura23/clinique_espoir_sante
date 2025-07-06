<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;


    protected $fillable = [
        'AppointmentNumber',
        'Name',
        'MobileNumber',
        'Email',
        'AppointmentDate',
        'AppointmentTime',
        'Specialization',
        'doctor_id',
        'Message',
        'ApplyDate',
        'Remark',
        'Status',
    ];

public function doctor()
{
    return $this->belongsTo(Medecin::class, 'doctor_id');
}

public function patient()
{
    return $this->belongsTo(Patient::class, 'user_id');
}
}
