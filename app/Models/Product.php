<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","description","smallDesc","price","offerPrice","image1","image2","image3","quantity","category_id"
    ];

    // Relationship
    public function categoryChild() {
        return $this->belongsTo(CategoryChild::class,"category_id");
    }

    public function cart() {
        return $this->hasMany(Cart::class,"product_id");
    }

    public function orderDetails() {
        return $this->belongsTo(Order::class);
    }

    public function userOrders() {
        return $this->belongsTo(userOrders::class);
    }
}
