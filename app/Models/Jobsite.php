<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobsite extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'location',
        'stories',
        'roof_size',
        'roof_type',
        'roof_material',
        'roof_condition',
        'technician_id',
    ];

    //Relationship to technician
    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }
}
