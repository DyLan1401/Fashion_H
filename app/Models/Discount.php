<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';
    protected $primaryKey = 'discount_id';
    public $incrementing = false;
    protected $fillable = [
        'discount_id', 'discount_percent', 'discount_type', 'min_order_value',
        'usage_limit', 'usage_count', 'discount_expiry_date'
    ];
}