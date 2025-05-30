<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'price',
        'quantity',
        'product_image',
        'category_id',
        'type_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(ProductType::class, 'type_id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
} 