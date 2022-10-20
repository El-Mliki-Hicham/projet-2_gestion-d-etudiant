<form method="POST" action="store">
    @csrf
    @error('name')   
    {{$message}}
    @enderror
    <input type="text"  name="name">
    <button>click</button>
    </form>