<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    public function student_class(){

    	return $this->belongsTo(StudentClass::class,'class_id','id');
    }
}
