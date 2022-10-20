<?php

namespace App\Http\Controllers;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index(){
    $promotion = Promotion::all();   
        return view('index',compact('promotion'));
}
    public function create(){
     
        return view('Add');
}
public function store(Request $request){

    $promotion = new Promotion();
    $promotion->Name_promotion = $request->Name ;
    $promotion->save();
    if( $promotion->save()){
    return redirect('index')->with("status","data has ben add");
    }

}

public function Edit($id){

    $promotion = Promotion::where('Id_promotion',$id)->get();
    return view('Edit',compact('promotion'));
}

public function Update(Request $request,$id){

    $promotion = Promotion::where('Id_promotion',$id)
    ->Update([
        "Name_promotion"=>$request->Name
    ]);
    return
     redirect('index')->with("status","Update Successfully");
}

public function Delete($id){

    Promotion::where('Id_promotion',$id)->Delete();
    return redirect('index')->with('status',"Delete Successfully");
}


public function search(Request $request)
{
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
<a href="Edit/'.$promotion->Id_promotion.'"><button>Edit</button></a>
<a href="Delete/'.$promotion->Id_promotion.'"><button>Delete</button></a>
<td>

</tr>';
}
return Response($output);
   }
   }
}
}
