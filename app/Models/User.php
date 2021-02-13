<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullName',
        'img',
        'mobile',
        'email',
        'gender',
        'birthDate',
        'grade_id',
        'field_id',
        'unit_id',
        'typeSchool',
        'country',
        'state',
        'city',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function onlineReserved()
    {
        return $this->hasMany(Online::class)->where('date', '>', Carbon::now()->format('Y-m-d'));
    }

    public function onlineHeld()
    {
        return $this->hasMany(Online::class)->where('date', '<', Carbon::now()->format('Y-m-d'));
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class)->OrderByDesc('updated_at');
    }

}
