<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class OrderDetail extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}