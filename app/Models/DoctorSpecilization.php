<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorSpecilization extends Model
{
    public $timestamps = false; // because you use creationDate/updationDate instead of created_at/updated_at

    protected $fillable = [
        'specilization',
        'creationDate',
        'updationDate',
    ];
}
