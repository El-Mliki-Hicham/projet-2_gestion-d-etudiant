<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Http\Controllers\StudentsController;
use App\Models\Student;

class PromotionController extends Controller
{
//index : get data
    public function index(){
        $promotion = Promotion::all();
        return view('promotion.index',compact("promotion"));
    }

//create :go to page create
    public function create(){
        return view('promotion.create');
    }

// store : add data to db
    public function store(Request $request){
        $request->validate([
            'name'=>['required',"regex:/^[a-zA-Z0-9\s]+$/", 'string', 'max:255', 'unique:promotion,Name_promotion']
        ]);
        $promotion =new Promotion;
        $promotion->Name_promotion = $request->name;
        $promotion->save();
        if($promotion->save()){
            return redirect("index")->with('status','Promotion has been saved');
        }

    }

//edit : go to page edit
    public function edit($id){
        $Student = Student::where('PromotionID',$id)
        ->join("promotion","students.PromotionID","=","promotion.Id_promotion")
        ->get();
        $promotion = Promotion::where('Id_promotion',$id)->get();
        return view("promotion.edit",compact('promotion','Student'));
    }
//delete : delete data from db
    public function delete($id){
       $promotion =  Promotion::where("Id_promotion",$id)->delete();
        if($promotion){
            return redirect('index')->with("status","Promotion has been deleted");
        }
    }

//update : update data from db
    public function update(Request $request, $id){

         Promotion::where("Id_promotion",$id)->update([
                    "Name_promotion" => $request->input('name'),

                ]);
            $url="Edit/".$id;
                return redirect($url)->with("status","Promotion has been updated");
        }


// search : live search in db
    public function search(Request $request){
        if($request->ajax()){
            $input = $request->key;
        $output="";
        $Promotion=Promotion::where('Name_promotion','like','%'.$input."%")
            ->orWhere('Id_promotion','like','%'.$input."%")
        ->get();
        if($Promotion)
        {
        foreach ($Promotion as $promotion) {
        $output.='<tr>
        <td>'.$promotion->Id_promotion.'</td>
        <td>'.$promotion->Name_promotion.'</td>
        <td>
        <a href="Edit/'.$promotion->Id_promotion.'" class="settings" title="Edit" data-toggle="tooltip"><i class="fa-regular fa-pen-to-square"></i></a>
        <a href="Delete/'.$promotion->Id_promotion.'" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>
        <td>

        </tr>';
        }
        return Response($output);
           }
           }
        }

//sessionDelete : delete session key
    public function sessionDelete(Request $request){
         if($request->post()){
        $request->session()->forget("status");
         return back();
        }
    }
}


