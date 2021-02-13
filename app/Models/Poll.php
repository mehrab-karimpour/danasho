<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    protected $fillable=[
        'poll_subject_id',
        'survey_id',
        'score_id',
        'student_id',
        'professor_id',
    ];
}
