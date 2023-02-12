<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubGroup extends Model
{
    use HasFactory;

    protected $table = 'sub_groups';

    protected $fillable = ['category_id', 'sub_category_id', 'name'];
}
