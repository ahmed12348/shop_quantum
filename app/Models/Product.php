<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'price', 'stock'
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
