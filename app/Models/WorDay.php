<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorDay extends Model
{
    use HasFactory;

    protected $fillable=[
        
            'day',
            'user_id',
            'active',
            'moning_start',
            'moning_end',
            'afternoon_start',
            'afternoon_end',
          
          
    ];
}
