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
        'country_id',
        'department_id',
        'name',
        'batch_number',
        'parts_number',
        'quantity',
        'condition',
        'location',
        'rack_number',
        'image',
        'purchase_order_number',
        'purchase_price',
        'selling_price',
        'purchase_at',
        'expire_at',
        'note',
    ];
}