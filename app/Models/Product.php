<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'gender', 'sku', 'category_id', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
