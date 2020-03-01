<?php

namespace App\Models;

use App\Notifications\InquiryAssignNotification;
use Illuminate\Database\Eloquent\Model;

class InquiryCounselor extends Model
{
    protected $fillable = ['inquiry_token', 'user_id','counselor_status','remarks'];

    public static function boot()
    {
        parent::boot();
        static::created(
            function ($inquiryCounselor){
                $inquiryCounselor->counselor->notify(new InquiryAssignNotification($inquiryCounselor));
            }
        );
    }

    public function counselor()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class,'inquiry_token');
    }
}
