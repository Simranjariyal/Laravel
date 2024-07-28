<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'product_add';

    // The attributes that are mass assignable
    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'product_image',
    ];

    // The attributes that should be cast to native types
    protected $casts = [
        'product_price' => 'decimal:2',
    ];
}
