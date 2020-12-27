<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }


}
