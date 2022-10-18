@foreach ($promotion as $value)
    
<form action="{{url('Update')}}/{{$value->Id_promotion}}" method="post">
    @csrf
    Name_promotion<input type="text" value="{{$value->Name_promotion}}" name="Name">
    <button>Update</button>
</form>
@endforeach
