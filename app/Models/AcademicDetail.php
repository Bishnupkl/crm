<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicDetail extends Model
{
    protected $fillable = ['name_of_qualification','faculty','name_of_institution','start_date','end_date','percentage','inquiry_token','remarks'];
}
