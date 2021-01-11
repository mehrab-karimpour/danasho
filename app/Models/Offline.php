<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offline extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'grade',
        'unit',
        'lesson',
        'count-question',
        'get-answer-date',
        'price',
        'day',
        'get-answer-period',
    ];
}
