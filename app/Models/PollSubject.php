<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollSubject extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'protected'
    ];


    public function surveys()
    {
        return $this->hasMany(Survey::class);
    }

}

