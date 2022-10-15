<?php

namespace App\Http\Controllers;

use App\Models\Promotions;
use Illuminate\Http\Request;

class PromotionsController extends Controller
{

  public function  index(){
        $promotion = Promotions::all();
        return $promotion;
    }



}
