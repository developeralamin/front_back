<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectAll extends Model
{
    use HasFactory;
    protected $fillable = ['subject'];

  // public function assign_subject()
  // {
  //   return $this->hasMany(AssignSubject::class);
  // }



    //Getting Select StudentClass
     public static function arrayforSelectSubject(){
      	$arr = [];
      	$subject = SubjectAll::all();
        foreach ($subject as $subject) {
           $arr[$subject->id] = $subject->subject;
        }

        return $arr;
      }


}
