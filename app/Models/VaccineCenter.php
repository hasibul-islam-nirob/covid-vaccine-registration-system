<?php

namespace App\Models;

use App\Models\Registration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VaccineCenter extends Model
{
    protected $fillable = [
        'name', 
        'daily_limit'
    ];

    public function registrations(){
        return $this->hasMany(Registration::class);
    }
}
