<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = ['name_of_employer','duties','start_date','end_date','remarks'];
}
