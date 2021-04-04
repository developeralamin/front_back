<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectAssign extends Model
{
    use HasFactory;

    public function student_class(){
    	return $this->belongsTo(StudentSetup::class,'class_id','id');
    }

public function subject_name(){
    	return $this->belongsTo(SubjectAll::class,'subject_id','id');
    }

}
