<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeachingDates extends Model
{
    use HasFactory;

    protected $fillable = [
        'index',
        'user_id',
        'date_period_id',
        'key',
        'datePersian',
        'date'
    ];

    public function datePeriods(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\DatePeriod','id','date_period_id');
    }

}
