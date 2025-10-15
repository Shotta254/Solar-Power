<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemShoppingCart extends Model
{
    protected $fillable = [ 
           'shopping_cart_id', 
           'item_id', 
           'quantity']; 
}
