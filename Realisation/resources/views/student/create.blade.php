
 
<form method="POST" action="{{url("student/store")}}">
@csrf
@error('first_name')   
{{$message}}
@enderror
<input type="text"  name="first_name"><br>
<input type="text"  name="last_name"><br>
<input type="text"  name="email"><br>
<input type="hidden" value="{{$id}}"  name="id">
<button>click</button>
</form>

<a href="index"><button>return</button></a>