<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    public function Afficher(){
        $promotion = Promotion::all();
        return view('index',compact("promotion"));
    }
}
