<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiledUniversity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

}
