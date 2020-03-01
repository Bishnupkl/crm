<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['slug','name','remarks'];

    public function coursePartner()
    {
        return $this->hasMany(CoursePartner::class,'course_id');
    }
}
