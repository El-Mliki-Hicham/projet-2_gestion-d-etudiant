@include('layouts.header')

@if (session('status'))
<h6 class="alert alert-success">{{ session('status') }}</h6>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Student</th>
            <th scope="col">Age</th>
            <th scope="col">Promotion</th>
        </tr>
    </thead>
    <tbody>

        @forelse ($Student as $item)
        <tr>
            <th scope="row">{{$item->Id}}</th>
            <td> {{$item->Name_student}}</td>
            <td> {{$item->Age}}</td>
            <td> {{$item->Name_Promotion}}</td>
            <td>
               <a href="Edit/{{$item->Id}}"> <button type="button"  class="btn  btn-warning">Edit</button></a>
                {{-- <button type="button" class="btn btn-danger">Middle</button>    --}}
                 
                </td>

        </tr>
        @empty

        @endforelse
    </tbody>
</table>
<a href="/Add">
    <button type="button" class="btn btn-primary">Ajouter</button>
</a>


  
