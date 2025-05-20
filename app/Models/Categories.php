<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    protected $fillable = ['category_name'];
    public function product_type():HasMany{
        return $this->hasMany(Product_types::class, 'category_id');
    }
}
