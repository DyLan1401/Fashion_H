<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Products extends Model
{
    use HasFactory;
    public function Category(){
        return $this->belongsTo(Categories::class,'category_id');
    }
    public function Type(){
        return $this->belongsTo(Product_types::class,'type_id');
    }
}
