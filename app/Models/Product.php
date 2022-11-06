<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'code',
        'location',
        'route',
        'image',
        'purchase_price',
        'purchase_at',
        'expire_at',
        'selling_price',
        'category_id',
        'sub_category_id',
        'supplier_id',
    ];
}