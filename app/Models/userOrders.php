<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userOrders extends Model
{
    use HasFactory;
    protected $fillable = [
        "orderDate","shippedDate","status","product_id","quantity","user_id"
    ];

    // Relationship
    public function products() {
        return $this->hasMany(Product::class,"id","product_id");
    }
}
