<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSetup extends Model
{
    use HasFactory;

    protected $fillable =['name'];

  // public function assign_subject()
  // {
  //   return $this->hasMany(AssignSubject::class);
  // }



//Getting Select StudentClass
     public static function arrayforSelectClass(){
      	$arr = [];
      	$student_classs = StudentSetup::all();
        foreach ($student_classs as $student_class) {
           $arr[$student_class->id] = $student_class->name;
        }

        return $arr;
      }


}
