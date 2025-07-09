<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class MedicalHistory extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id', 
        'BloodPressure',
        'BloodSugar',
        'Weight',
        'Temperature',
        'MedicalPres',
        'CreationDate',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
