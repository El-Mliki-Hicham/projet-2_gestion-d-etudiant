@include('layouts.head')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
@endif


<script type="text/javascript" src="{{ URL::asset('js/search.js') }}"></script>


<!doctype html>
<html lang="en">
 
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
                        <th scope="col">#</th>
                        <th scope="col">Name promotion </th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse  ($promotion as $item)
                    <tr>
                        <td scope="row">{{$item->Id_promotion}}</td>
                        <td>{{$item->Name_promotion}}</td>
                        <td>
    
                    <a href="Edit/{{$item->Id_promotion}}" class="settings" title="Edit" data-toggle="tooltip"><i class="fa-regular fa-pen-to-square"></i></a>
                    <a href="Delete/{{$item->Id_promotion}}" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>
                        </td>
                @empty
        
                @endforelse
                   </tr>                                     
                </tbody>
            </table>
           
        </div>
    </div>        
</div>     
</body>
