<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';

    protected $fillable = [
        // 'employee_id',
        // 'amount',
        // 'given_at',
        // 'status',
        // 'advance_salary',
    ];
}
