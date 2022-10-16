<?php

namespace App\Http\Controllers;
use  App\Http\Controllers\PromotionsController;
use App\Models\Students;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\DB;

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
     
        $promotion = $this->promotionController->index();
    return view("pages.create",compact("promotion"));
    }




public function AddStudent(Request $request){
  $request->validate([
             'Name' =>  ['required', 'string', 'max:255', 'unique:students,Name_student'],
            'Age' => ['required','numeric','max:60'],
            'Promotion' => ['required','string']
             ]);
    $Student = new Students();
    $Student->Name_student = $request->Name;
    $Student->Age = $request->Age;
    $Student->Promotion = $request->input('Promotion');
    $Student->save();
    if($Student->save()){
    return redirect('index')
    ->with('status','Form is successfully validated and data has been saved');
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
    $request->validate([
        'Name' =>  ['required', 'string', 'max:255', ],
        'Age' => ['required','numeric','max:60'],
        'Promotion' => ['string']
         ]);

     Students::where('Id',$id)
    ->update(
        [
        'Name_student' => $request->Name,
        'Promotion' => $request->Promotion,
        'Age' => $request->Age
        
        ]
    );
    return redirect('index')->with("status","Student Update Successfully");
    

}



public function DeleteStudent(Request $response, $id){
    
    $DeleteStudent = Students::where("Id",$id);
    $DeleteStudent->delete();
    if($DeleteStudent){
        $response->session("status","Student Deleted successfully");
        return redirect('index');
    }
}


public function Psearch(){
    return view("pages.search");
}


public function search(Request $request)
{
if($request->ajax()){
    $input = $request->key;
$output="";
$Students=Students::where('Name_student','LIKE','%'.$input."%")
->join("promotions","students.Promotion","=","promotions.Id_promotion")
->get();
if($Students)
{
foreach ($Students as $student) {
$output.='<tr>'.
'<td>'.$student->Id.'</td>'.
'<td>'.$student->Name_student.'</td>'.
'<td>'.$student->Age.'</td>'.
'<td>'.$student->Name_Promotion.'</td>'.
'<td>'.
    
    '<a href="Edit/{{'.$student->Id.'}}"> <button type="button"  class="btn  btn-warning">Edit</button></a>'.
   '<a href="Delete/{{'.$student->Id.'}}"> <button type="button"  class="btn  btn-danger">Delete</button></a>'
.'</td>'.

'</tr>';
}
return Response($output);
   }
   }
}
}
