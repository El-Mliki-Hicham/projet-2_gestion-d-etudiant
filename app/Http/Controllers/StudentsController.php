<?php

namespace App\Http\Controllers;
use  App\Http\Controllers\PromotionsController;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    private $promotionController= null;

    public function __construct(){
        $promotionController= $this->promotionController = new PromotionsController;
        return $promotionController;    
    
        
    }
    public function index(){
        $Student= Students::select("*")
        ->join("promotions","students.Promotion","=","promotions.Id_promotion")
        ->get();
        return view('pages.index',compact('Student'));

    }

    public function create(){
        $promotionController = new PromotionsController;
        $promotion = $promotionController->index();
    return view("pages.create",compact("promotion"));
    }

    public function AddStudent(Request $request){

    $Student = new Students();
    $Student->Name_student = $request->Name;
    $Student->Age = $request->Age;
    $Student->Promotion = $request->input('Promotion');
    $Student->save();
    if($Student->save()){
    return redirect('index')
    ->with('status','Student Added Successfully');
    }

}

public function EditStudent($id){
    
    $promotion = $this->promotionController->index();
    $Student= Students::select("*")
    ->join("promotions","students.Promotion","=","promotions.Id_promotion")
    ->where('students.Id',$id)
    ->get();
        return view('pages.Edit',compact('Student',"promotion"));
}
public function UpdateStudent(Request $request,$id){

    $Student = Students::where('Id',$id)
    ->update(
        [
        'Name_student' => $request->Name,
        'Promotion' => $request->Promotion,
        'Age' => $request->Age
        
        ]
    );
    return redirect('index')->with("status","Student Update Successfully");
    

}
public function DeleteStudent($id){
    
    $DeleteStudent = Students::where("Id",$id);
    $DeleteStudent->delete();
    if($DeleteStudent){
        return redirect('index')->with("status","Student Deleted successfully");
    }
}

}
