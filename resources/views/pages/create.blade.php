@include('layouts.header')

<div style="width: 500px">


      {{-- @foreach ($errors->all() as $error)
      <li style="color: red">{{$error}} </li> --}}
      
       
    
    
<form action="{{url('AddStudent')}}" method="POST" > 
    @csrf
  <div class="mb-3">
    
    <label for="exampleFormControlInput1" class="form-label">Student</label>
    <input type="text" class="form-control" name="Name" id="exampleFormControlInput1" placeholder="Student name">
    @error('Name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    
  
  
    <label for="exampleFormControlInput1" class="form-label">Age</label>
    <input type="number" name="Age" class="form-control" id="exampleFormControlInput1" placeholder="Age ">    
    <label for="exampleFormControlInput1" class="form-label">Promotion</label>
    <select class="form-control" list="datalistOptions" id="exampleDataList" name="Promotion" placeholder="--Please choose an option--">

        <option  selected="true" disabled="disabled">--Please choose an option--</option>
    @foreach ($promotion as $item)
        
  
  <option value="{{$item->Id_promotion}}">{{$item->Name_Promotion}}</option>
    @endforeach
</select>
  
    <input type="submit" value="Ajouter">
</div>
  </form>
  {{-- @endforeach --}}



</div>