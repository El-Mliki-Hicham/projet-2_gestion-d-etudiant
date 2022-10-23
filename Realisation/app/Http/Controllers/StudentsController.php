<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
//index : get data
    public function index()
    {
            $Student = Student::select("*")->get();
            return $Student;
    }


//create :go to page create
    public function create($id)
    {
        return view("Student.create",compact("id"));
    }

// store : add data to db
    public function store(Request $request)
    {
      $id =  $request->id;
        $request->validate([
            'firt_name'=>[ 'string', 'max:255'],
            'last_name'=>['string', 'max:255'],
            'email'=>['email']
        ]);

        $Student=new Student();
        $Student->First_name = $request->first_name;
        $Student->Last_name = $request->last_name;
        $Student->Email = $request->email;
        $Student->PromotionID = $id;
        $Student->save();
        return redirect("Edit/".$id)->with('status','Student has been saved');
    }

//edit : go to page edit
    public function edit($id)
    {
        $Student = Student::where('Id_student',$id)->get();
        return view("student.edit",compact('Student'));
    }

//update : update data from db
    public function update(Request $request, $id)
    {
        $request->validate([
            'firt_name'=>[ 'string', 'max:255'],
            'email'=>['required','email'],
            'last_name'=>['string', 'max:255']
        ]);
        Student::where("Id_student",$id)->update([
            "First_name" => $request->first_name,
            'Last_name' => $request->last_name,
            'Email' => $request->email,

        ]);
    $url="Edit/".$request->id;
        return redirect($url)->with("status","promotion has been updated");
    }

    
//delete : delete data from db
    public function destroy($id,$iid)
    {
        $promotion =  Student::where("Id_student",$id)->delete();
        if($promotion){
            $url="Edit/".$iid;
            return redirect($url)->with("status","promotion has been deleted");
        }
    }


// search : live search in db
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
