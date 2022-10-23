<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // search : live search promotion
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


// search : live search students
    public function searchStudent(Request $request,$id){
        // dd($id);
        if($request->ajax()){

            $input = $request->key;
            $output="";
            $Student=Student::
            where([
                ["PromotionID", '=', $id],
                ['Id_student', '=', $input],
            ])
        ->orWhere([
            ["PromotionID", '=', $id],
            ['First_name','like','%'.$input."%"]
            ])
        ->orWhere([
            ["PromotionID", '=', $id],
            ['Last_name','like','%'.$input."%"]
            ])
        ->orWhere([
            ["PromotionID", '=', $id],
            ['Email','like','%'.$input."%"]
            ])


        ->join("promotion","students.PromotionID","=","promotion.Id_promotion")
        ->get();
        if($Student)
        {

            foreach ($Student as $student) {
            $editURL = "../student/Edit/$student->Id_student";
            $deleteURL = "../student/Delete/$student->Id_student/$student->PromotionID";
        $output.='<tr>
        <td>'.$student->Id_student.'</td>
        <td>'.$student->First_name.'</td>
        <td>'.$student->Last_name.'</td>
        <td>'.$student->Email.'</td>
        <td>
        <a href="'.$editURL.'" class="settings" title="Edit" data-toggle="tooltip"><i class="fa-regular fa-pen-to-square"></i></a>
        <a href="'.$deleteURL.'" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>
        <td>

        </tr>';
        }
        return Response($output);
           }
           }
    }
}
