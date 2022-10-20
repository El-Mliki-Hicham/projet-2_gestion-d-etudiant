<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
   protected $table='promotion';
   protected $cul = ['Name_promotion'];
   public $timestamps = false;
}

