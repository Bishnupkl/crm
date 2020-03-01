<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    protected $fillable = ['name','relation','number','inquiry_token'];

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class,'inquiry_token');
    }
}