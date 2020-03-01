<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeCheckIn extends Model
{
    protected $fillable = ['inquiry_token','date','reasons','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class,'inquiry_token');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class,'office_check_in_id');
    }
}
