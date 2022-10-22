@include('layouts.head')
<link rel="stylesheet" href="css/formAdd.css">

<body>
    <div class="login-form">
        <form action="/store" method="post">
            @csrf
            <h2 class="text-center text">Ajouter promotion</h2>
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Ajouter.." >
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info add-new">Ajouter</button>
            </div>
            
        </form>
    </div>
    <div class="error">
    @error('name')
    {{$message}}
    @enderror
    </div>
    <div class="return-div">
        <a href="/index"><button type="submit" class="btn btn-info return-btn">Return</button></a>
    </div>

</body>
