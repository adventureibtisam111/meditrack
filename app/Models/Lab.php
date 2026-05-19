<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $fillable = [
        'patient_id',
        'test_name',
        'result',
        'test_date'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
