<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Specialty extends Model
{
    use HasFactory;
 
 //Specialty con sus users
    public function users (){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
