<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'image', 'price'];

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}