<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemoveFavorite extends Model
{
    use HasFactory;

    protected $table = 'remove_favorites_list';

    protected $fillable = [
        'user_name', 'product_name', 'removed_at'
    ];
}