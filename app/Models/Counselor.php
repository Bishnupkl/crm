<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Counselor extends Model
{
    protected $fillable = ['role_id'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function user()
    {
        return $this->morphOne(User::class,'morph');
    }
}
