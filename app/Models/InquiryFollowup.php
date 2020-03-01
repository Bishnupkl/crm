<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InquiryFollowup extends Model
{
    protected $fillable = ['inquiry_token','date','reasons','results','remarks','status'];

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class,'inquiry_token');
    }
}
