<?php
namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class CategoryFeature extends Model
{
     protected $hidden = ["created_at", "updated_at"];
}