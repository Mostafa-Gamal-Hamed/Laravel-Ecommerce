<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryChild extends Model
{
    use HasFactory;
    protected $fillable = [
        "name","image","category_id"
    ];

    // Relationship
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function product() {
        return $this->hasMany(Product::class);
    }
}
