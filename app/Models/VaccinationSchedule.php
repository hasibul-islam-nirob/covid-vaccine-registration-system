<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccinationSchedule extends Model
{
    protected $fillable = [
        'registration_id', 
        'scheduled_date'
    ];

    public function registration(){
        return $this->belongsTo(Registration::class);
    }
}
