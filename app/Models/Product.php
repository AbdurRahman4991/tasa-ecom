<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'price',
        'discount',
        'quantity',
        'featured',
        'description',
        'view_count',
        'add_cart_count',
        'wish_count',
        'status',
        'front_img',
        'back_img',
        'left_image',
        'right_imge',
    ];
    
}
