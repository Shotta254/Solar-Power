<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //Relationship
    //An item type has many inventory items
    public function inventoryItems()
    {
        return $this->hasMany(InventoryItem::class, 'item_type_id');
    }
}

