@include('layouts.header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
@endif
<input type="text" id="search">search
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name promotion </th>
            <th scope="col">Last name</th>
            <th scope="col">Promotion</th>
        </tr>
    </thead>
    <tbody id="tbody">

        @forelse ($Student as $item)
        <tr>
            <th scope="row">{{$item->Id}}</th>
            <td> {{$item->Name_student}}</td>
            <td> {{$item->Age}}</td>
            <td> {{$item->Name_Promotion}}</td>
            <td>
                <a href="Edit/{{$item->Id}}"> <button type="button" class="btn  btn-warning">Edit</button></a>
                <a href="Delete/{{$item->Id}}"> <button type="button" class="btn  btn-danger">Delete</button></a>
            </td>

        </tr>
        @empty

        @endforelse
    </tbody>
</table>
<a href="/Add">
    <button type="button" class="btn btn-primary">Ajouter</button>
</a>
<script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>


<!doctype html>
<html lang="en">
 
@include('layouts/Nav-bar')
@include('layouts/head')
<body>
   
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>



<div class="container">
    <div class="titleDiv">
    <p><i class="fa-solid fa-user-graduate iconStudent"> </i></p>
    <h1 class="titleGestion"> Gestion d'etudiant</h1>
    
    </div>
    <div class="card cadre-search">
        <div class="card-body">
            <div class="col-sm-4">
                <div class="search-box">
                    <i class="material-icons">&#xE8B6;</i>
                    <input type="text" class="form-control searchInput" placeholder="Search&hellip;">
                </div>
            </div>
            <div class="col-sm-8 divAdd" >
                <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
            </div>
        </div>
      </div>
    <div class="table-responsive">
        <div class="table-wrapper">
           
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Etudent</th>						
                        <th>Age</th>
                        <th>Promotion</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><a href="#"><img src="/examples/images/avatar/1.jpg" class="avatar" alt="Avatar"> Michael Holz</a></td>
                        <td>04/10/2013</td>                        
                        <td>Admin</td>
                        <td>
                            <a href="#" class="settings" title="Edit" data-toggle="tooltip"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>
                        </td>
                   </tr>                                     
                </tbody>
            </table>
           
        </div>
    </div>        
</div>     
</body>
