<?php

namespace App\Models;

use App\Models\Partner;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title','description','related_to','assignee','created_by','due_date','files','is_completed'
    ];

//    public function partner()
//    {
//        return $this->belongsTo(Partner::class,'')
//    }

    public function assigneeBy()
    {
        return $this->belongsTo(User::class,'assignee');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class,'created_by');
    }
}
