<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id', 
        'customer_name', 
        'email', 
        'address', 
        'total_amount', 
        'status'
    ];

    /**
     * An order belongs to a user (customer).
     * This is used to check ownership for profile views and receipt downloads.
     */
    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    /**
     * An order has many items.
     * This links the Order to the specific books/quantities purchased.
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}