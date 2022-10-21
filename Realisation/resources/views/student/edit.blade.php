{{$Student}}


@foreach ($Student as $item)
    
<form  method="POST" action="{{url("update")}}/{{$item->student}}">
    @csrf
    <input type="text" name="name" value="{{$item->Name_student}}">
    <button>update</button>
</form>
@endforeach



