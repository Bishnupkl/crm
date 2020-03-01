<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['course_id','partner_id','intake_id','duration','description'];

    public function productFee()
    {
        return $this->hasMany(ProductFee::class,'product_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
    public function intake()
    {
        return $this->belongsTo(Intake::class);
    }
}
