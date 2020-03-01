<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskPartner extends Model
{
    protected $fillable = ['partner_id'];

    public function task()
    {
        return $this->morphOne(Task::class,'morph');
    }
}
