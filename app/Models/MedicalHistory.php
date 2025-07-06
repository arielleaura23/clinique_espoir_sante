<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    public $timestamps = false; 

    protected $fillable = [
        'PatientID',
        'BloodPressure',
        'BloodSugar',
        'Weight',
        'Temperature',
        'MedicalPres',
        'CreationDate',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientID');
    }
}
