<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = ['slug','name','category','street','city','state','country_id','phone','email','fax','website','remarks'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function coursePartner()
    {
        return $this->hasMany(CoursePartner::class,'partner_id');
    }
}
