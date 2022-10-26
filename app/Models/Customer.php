<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'city',
        'address',
        'image',
        'shop_name',
        'account_name',
        'account_number',
        'bank_name',
        'branch_name',
    ];
}
