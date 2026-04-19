<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'age',
        'illness',
        'address'
    ];

public function appointments()
{
    return $this->hasMany(Appointment::class);
}

}
