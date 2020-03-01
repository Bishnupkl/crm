<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment','office_check_in_id','user_id','remarks'];

    public function officeCheckIn()
    {
        return $this->belongsTo(OfficeCheckIn::class,'office_check_in_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
