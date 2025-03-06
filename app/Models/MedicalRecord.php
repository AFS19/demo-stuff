<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'speciality_id',
        'diagnosis', // record the doctor's assessment or conclusion about the patient's condition
        'treatment' // document the course of action prescribed by the doctor to address the diagnosis.
    ];

    // Relationships
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
}
