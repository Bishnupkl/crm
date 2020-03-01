<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFee extends Model
{
    protected $fillable = [
        'fee_type','fee_amount','fee_term'
    ];

}
