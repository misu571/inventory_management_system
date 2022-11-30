<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'brand_id',
        'category_id',
        'sub_category_id',
        'supplier_id',
        'department',
        'serial_number',
        'parts_number',
        'location',
        'rack_number',
        'image',
        'purchase_order_number',
        'purchase_at',
        'expire_at',
        'purchase_price',
        'selling_price',
        'quantity',
        'country_origin',
    ];
}