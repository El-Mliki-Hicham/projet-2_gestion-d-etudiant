<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Http\Controllers\StudentsController;
use App\Models\Student;

class PromotionController extends Controller
{


//     private $index ; 
//     private  $Student = null;


// public function __construct()
// {
// $this->Student = new StudentsController();
//  $this->index = $this->Student->index();

//  return $this->index;
// }

    public function index(){
        $promotion = Promotion::all();
        return view('promotion.index',compact("promotion"));
    }
    public function create(){
        return view('promotion.create');
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
        // $Student =$this->index;

        $Student = Student::where('PromotionID',$id)
        ->join("promotion","students.PromotionID","=","promotion.Id_promotion")
        ->get();
        $promotion = Promotion::where('Id_promotion',$id)->get();
        return view("promotion.edit",compact('promotion','Student'));
    }

    public function delete($id){
       $promotion =  Promotion::where("Id_promotion",$id)->delete();
        if($promotion){
            return redirect('index')->with("delete","promotion has been deleted");
        }
    }

    public function update(Request $request, $id){

         Promotion::where("Id_promotion",$id)->update([
                    "Name_promotion" => $request->input('name'),

                ]);
            $url="Edit/".$id;
                return redirect($url)->with("edit","promotion has been updated");
        }
}
