<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'city',
        'address',
        'nid',
        'experience',
        'salary',
        'vacation',
        'user_id',
        'level_id',
    ];
}
