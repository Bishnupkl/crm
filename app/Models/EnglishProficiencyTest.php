<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnglishProficiencyTest extends Model
{
    protected $fillable = ['is_taken','test_type','test_date','listening','reading','speaking','writing','overall','other_test_attain','preparation_classes','study_centre','remarks'];
}
