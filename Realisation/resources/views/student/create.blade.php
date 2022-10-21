{{$id}} 
<form method="POST" action="store">
@csrf
@error('name')   
{{$message}}
@enderror
<input type="text"  name="first_name">
<input type="text"  name="last_name">
<input type="text"  name="email">
<input type="hden" value=""  name="promotion">
<button>click</button>
</form>