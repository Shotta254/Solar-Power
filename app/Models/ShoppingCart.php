<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    /**
     * The items that belong to this shopping cart.
     */
    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_shopping_cart')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    /**
     * Each cart belongs to one user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
