<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

        protected $fillable = [
        'Docid',
        'PatientName',
        'PatientContno',
        'PatientEmail',
        'PatientGender',
        'PatientAdd',
        'PatientAge',
        'PatientMedhis',
        'CreationDate',
        'UpdationDate',
    ];
}
