<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoursePartner extends Model
{
    protected $table = 'course_partner';

    protected $fillable = ['course_id','partner_id','remarks'];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class,'partner_id');
    }
}
