<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

class PromotionController extends Controller
{
    public function index(){
        $promotion = Promotion::all();
        return view('index',compact("promotion"));
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){

        $request->validate([
            'name'=>['required', 'string', 'max:255', 'unique:promotion,Name_promotion']
        ]);
        $promotion =new Promotion;
        $promotion->Name_promotion = $request->name;
        $promotion->save();
        if($promotion->save()){
            return redirect("index")->with('save','Promotion has been saved');
        }

    }
    public function edit($id){

        $promotion = Promotion::where('Id_promotion',$id)->get();
        return view("edit",compact('promotion'));
    }

    public function delete($id){
       $promotion =  Promotion::where("Id_promotion",$id)->delete();
        if($promotion){
            return redirect('index')->with("delete","promotion has been deleted");
        }
    }
}
