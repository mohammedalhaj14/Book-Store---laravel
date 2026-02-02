<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class Book extends Model
{
    use SoftDeletes;
   protected $fillable = [
    'title', 
    'author', 
    'isbn', 
    'genre',
    'price', 
    'stock_quantity',
    'category_id', 
    'description', 
    'cover_image'
];
public function category()
{
    return $this->belongsTo(Category::class);
}
    use HasFactory;
}
