<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventoryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_type_id',
        'brand',
        'model',
        'description',
        'quantity',
        'price',
    ];
    public function type()
    {
        return $this->belongsTo(ItemType::class, 'item_type_id');
    }
}
