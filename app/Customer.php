<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   // use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'dob'
    ];
}
