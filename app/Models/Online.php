<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
    use HasFactory;

    protected $fillable = [
        'pay-status',
        'user_id',
        'period',
        'period_id',
        'price',
        'grade',
        'unit',
        'lesson',
        'time',
        'day',
        'date',
        'level',
        'description',
        'name',
        'mobile',
        'poll-status'
    ];


}
