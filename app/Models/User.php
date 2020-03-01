<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username','email', 'password','phone','branch','position','morph_type','morph_id','thumbnail','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function morph()
    {
        return $this->morphTo('morph');
    }

    public function reception()
    {
        return $this->hasOne(Reception::class);
    }

    public function counselor()
    {
        return $this->hasMany(Counselor::class);
    }
}
