<?php

namespace App\Models;

use App\Notifications\NewInquiryNotification;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $primaryKey = 'token';
    public $incrementing = false;

    protected $fillable = ['token','name','email','gender','dob','bloodgroup','landline','mobile','temporary_address','permanent_address','nationality','marital_status','marriage_date','how_did_you_know_about_us'];

    public static function boot()
    {
        parent::boot();
        static::created(
            function($inquiry) {
                $receptions = User::where('morph_type', 'reception')->get();
                foreach ($receptions as $key => $reception) {
                    $reception->notify(new NewInquiryNotification($inquiry));
                }
            }
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inquiryFollowups()
    {
        return $this->hasMany(InquiryFollowup::class,'inquiry_token');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function emergencyContact()
    {
        return $this->hasOne(EmergencyContact::class,'inquiry_token');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function academicDetails()
    {
        return $this->hasMany(AcademicDetail::class,'inquiry_token');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experience()
    {
        return $this->hasMany(Experience::class,'inquiry_token');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function englishTest()
    {
        return $this->hasOne(EnglishProficiencyTest::class,'inquiry_token');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function interest()
    {
        return $this->hasOne(Interest::class,'inquiry_token');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function history()
    {
        return $this->hasOne(History::class,'inquiry_token');
    }

    public function inquiryCounselor()
    {
        return $this->hasOne(InquiryCounselor::class,'inquiry_token');
    }

    public function officeCheckIn()
    {
        return $this->hasMany(OfficeCheckIn::class,'inquiry_token');
    }
}
