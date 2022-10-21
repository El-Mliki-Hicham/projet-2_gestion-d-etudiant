@include('layouts.head')
{{$Student}}


@foreach ($promotion as $item)
    
<form  method="POST" action="{{url("update")}}/{{$item->Id_promotion}}">
    @csrf
    <p class="text" onclick="change()">{{$item->Name_promotion}}</p>
    <input type="text" class="input" name="name" value="{{$item->Name_promotion}}">
    <button class="btn">update</button>
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
                    <a href="{{url('student/Edit')}}/{{$item->Id_student}}">Edit</a>
                    <a href="{{url('/student/Delete/')}}/{{$item->Id_student}}/{{$item->PromotionID}}">Delete</a>
               
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script src="{{asset('js/formEdit.js')}}"></script>
<a href="{{url('index')}}"><button>return</button></a>