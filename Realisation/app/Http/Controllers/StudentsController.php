<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $Student = Student::select("*")->get();
            return $Student;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view("Student.create",compact("id"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect("Edit/".$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Student = Student::where('Id_student',$id)->get();
        return view("student.edit",compact('Student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return redirect($url)->with("edit","promotion has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$iid)
    {
        $promotion =  Student::where("Id_student",$id)->delete();
        if($promotion){
            $url="Edit/".$iid;
            return redirect($url)->with("delete","promotion has been deleted");
        }
    }

    public function searchStudent(Request $request,$id){
        // dd($id);
        if($request->ajax()){

            $input = $request->key;
            $output="";
            $Student=Student::
            where([
                ['Id_student', '=', $input],
                ["PromotionID", '=', 18],
            ])
        ->orWhere([
            ['First_name','like','%'.$input."%"],
            ["PromotionID", '=', 18]
            ])
        ->orWhere([
            ['Last_name','like','%'.$input."%"],
            ["PromotionID", '=', 18]
            ])
        ->orWhere([
            ['Email','like','%'.$input."%"],
            ["PromotionID", '=', 18]
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
