<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'grade_id',
        'type'
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
