<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'order_id',
        'user_id',
        'quantity',
        'total_amount',
        'order_date',
        'payment_method',
        'shipping_address',
        'discount_id',
        'email',
        'customer_name',
        'phone',
        'note',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // You might also want to define relationships to User, Cart, and Discount models here if they exist.
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function cart()
    // {
    //     return $this->belongsTo(Cart::class, 'cart_id', 'cart_id');
    // }

    // public function discount()
    // {
    //     return $this->belongsTo(Discount::class, 'discount_id', 'discount_id');
    // }
}
