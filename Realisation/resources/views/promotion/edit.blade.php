{{$Student}}


@foreach ($promotion as $item)
    
<form  method="POST" action="{{url("update")}}/{{$item->Id_promotion}}">
    @csrf
    <input type="text" name="name" value="{{$item->Name_promotion}}">
    <button>update</button>
</form>
@endforeach

<a href="{{url("student/create")}}/{{$item->Id_promotion}}">Add Student</a>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Student as $item)
            <tr>
                <td>{{$item->Id_student}}</td>
                <td>{{$item->First_name}}</td>
                <td>{{$item->Last_name}}</td>
                <td>{{$item->Email}}</td>
                <td>
                    <a href="student/Edit/{{$item->Id_promotion}}">Edit</a>
                    <a href="Delete/{{$item->Id_student}}">Delete</a>
               
                </td>
            </tr>
        @endforeach
    </tbody>
</table>