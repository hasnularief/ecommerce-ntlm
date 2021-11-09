<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class ShoppingCart extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}