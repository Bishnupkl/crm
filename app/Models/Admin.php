<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = ['role_id'];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
