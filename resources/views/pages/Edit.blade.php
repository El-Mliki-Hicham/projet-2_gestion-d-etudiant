@include('layouts.header')

<div style="width: 500px">
    @foreach ($Student  as $value)
        
    <form action="{{url('Update')}}/{{$value->Id}}" method="POST" > 
        @csrf
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Student</label>
        <input type="text" class="form-control" value="{{$value->Name_student}}" name="Name" id="exampleFormControlInput1" placeholder="Student name">
      
      
        <label for="exampleFormControlInput1" class="form-label">Age</label>
        <input type="number" name="Age" class="form-control"value="{{$value->Age}}" id="exampleFormControlInput1" placeholder="Age ">    
        <label for="exampleFormControlInput1" class="form-label">Promotion</label>
        <select class="form-control" list="datalistOptions" id="exampleDataList" name="Promotion" placeholder="--Please choose an option--">
   
    
            <option  selected="true" disabled="disabled"value="{{$value->Id}}">{{$value->Name_Promotion}}</option>
            @endforeach   
       
            @foreach ($promotion as $item)
            
      
      <option value="{{$item->Id}}">{{$item->Name_Promotion}}</option>
        @endforeach
    </select>
      
        <input type="submit" value="Ajouter">
    </div>
      </form>
    
    </div>


