<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'order_id', 
        'book_id', 
        'quantity', 
        'price'
    ];

    /**
     * Each item belongs to a specific order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Each item belongs to a specific book.
     * This is crucial for showing the book title in receipts and order history.
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}