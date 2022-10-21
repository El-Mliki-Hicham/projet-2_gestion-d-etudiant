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
        // $request->validate([
        //     'firt_name'=>['required', 'string', 'max:255'],
        //     'email'=>['required', 'email'],
        //     'last_name'=>['required', 'string', 'max:255']
        // ]);

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
    public function destroy(Request $request, $id)
    {
        $promotion =  Student::where("Id_student",$id)->delete();
        if($promotion){
            $url="Edit/".$request->id;
            return redirect($url)->with("delete","promotion has been deleted");
        }
    }
}
