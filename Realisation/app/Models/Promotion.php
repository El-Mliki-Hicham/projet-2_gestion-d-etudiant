<?php

namespace App\Models;
use  App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
   protected $table = "promotion";
   protected $fulible=[
      'name_promotion'
   ];
  public $timestamps = false;


//  function getStudents(){
//     return $this->hasMany(Student::class);
//  }
}
