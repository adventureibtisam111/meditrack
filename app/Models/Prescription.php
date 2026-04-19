<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\Patient;


class Prescription extends Model {
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'medicine_name',
        'dosage',
        'instructions'
    ];

  public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
