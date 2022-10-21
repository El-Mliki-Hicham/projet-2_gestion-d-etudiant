{{$Student}}


@foreach ($Student as $item)
    
<form  method="POST" action="{{url("student/update")}}/{{$item->Id_student}}">
    @csrf
    <input type="text" name="first_name" value="{{$item->First_name}}"><br>
    <input type="text" name="last_name" value="{{$item->Last_name}}"><br>
    <input type="text" name="email" value="{{$item->Email}}"><br>
    <input type="hidden" name="id" value="{{$item->PromotionID}}"><br>
    <button>update</button>
</form>
@endforeach



