<?php

namespace App\Http\Controllers;
use  App\Http\Controllers\PromotionsController;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(){
        $Student= Students::select("*")
        ->join("promotions","students.Id","=","promotions.Id")
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
    $Student->Name_student = $request->input('Name');
    $Student->save();
    if($Student->save()){
    return redirect('index')
        ->with('status','Student Added Successfully');
    }

}
}
