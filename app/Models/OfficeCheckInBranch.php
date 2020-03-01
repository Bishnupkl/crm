<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeCheckInBranch extends Model
{
    protected $fillable = ['office_check_in_id','office_id','remarks'];

    public function officeCheckIn()
    {
        return $this->belongsTo(OfficeCheckIn::class,'office_check_in_id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class,'office_id');
    }
}
