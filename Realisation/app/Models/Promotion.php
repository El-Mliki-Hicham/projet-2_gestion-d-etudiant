<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
   protected $table = "promotion";
   protected $fulible=[
      'name_promotion'
   ];
  public $timestamps = false;
}
