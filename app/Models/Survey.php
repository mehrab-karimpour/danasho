<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'score_id',
        'type',
        'title'
    ];

    public function score()
    {
        return $this->hasOne(Score::class);
    }


}
