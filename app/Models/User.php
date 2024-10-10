<?php

namespace App\Models;

use App\Models\Registration;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'nid', 
        'name', 
        'email', 
        'phone'
    ];

    public function registration(){
        return $this->hasOne(Registration::class);
    }
}
