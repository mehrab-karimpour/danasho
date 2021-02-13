<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'poll_subject_id',
        'title'
    ];

    public function pollSubject()
    {
        return $this->belongsTo(PollSubject::class);
    }



}
