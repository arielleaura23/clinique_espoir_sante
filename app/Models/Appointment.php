<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_number',
        'name',
        'mobile_number',
        'email',
        'appointment_date',
        'appointment_time',
        'specialization',
        'doctor_id',
        'user_id',
        'doctor_specialization',
        'consultancy_fees',
        'message',
        'apply_date',
        'remark',
        'status',
        'user_status',
        'doctor_status',
        'posting_date',
        'updation_date',
    ];

public function doctor()
{
    return $this->belongsTo(Medecin::class, 'doctor_id');
}

public function patient()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
