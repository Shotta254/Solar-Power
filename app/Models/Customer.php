<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // allow mass assignment for these fields
    protected $fillable = [
        'name',
        'address',
        'mobile',
        'telephone',
        'email',
    ];
}
