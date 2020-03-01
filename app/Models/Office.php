<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['name','street','city','state','country_id','phone','email','fax','website'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
