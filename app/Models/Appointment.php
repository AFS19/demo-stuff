<?php

namespace App\Models;

use App\Enums\AppointmentMethodEnum;
use App\Enums\AppointmentStatusEnum;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'specialty_id',
        'status',
        'date_time',
        'method',
        'payment_status',
        'google_event_id',
        'zoom_meeting_link'
    ];

    protected $casts = [
        'date_time' => 'datetime',
        'status' => AppointmentStatusEnum::class,
        'method' => AppointmentMethodEnum::class,
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

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
