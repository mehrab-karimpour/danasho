<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonProfessor extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'professor_id'
    ];

}
