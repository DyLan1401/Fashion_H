<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product_types extends Model
{
    public function category():BelongsTo
    {
        return $this->belongsTo(Categories::class,'category_id');
    }
    public function products(){
        return $this->hasMany(Products::class,'type_id');
    }
}
