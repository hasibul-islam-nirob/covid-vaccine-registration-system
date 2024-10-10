<?php

namespace App\Models;

use App\Models\User;
use App\Models\VaccineCenter;
use App\Models\VaccinationSchedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registration extends Model
{
    protected $fillable = [
        'user_id', 
        'vaccine_center_id', 
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function vaccineCenter(){
        return $this->belongsTo(VaccineCenter::class);
    }

    public function vaccinationSchedule(){
        return $this->hasOne(VaccinationSchedule::class);
    }
}
