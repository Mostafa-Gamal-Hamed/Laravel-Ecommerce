<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","price","offerPrice","image","quantity","user_id","product_id"
    ];

    // Relationship
    public function product() {
        return $this->belongsTo(Product::class,"product_id");
    }
}
