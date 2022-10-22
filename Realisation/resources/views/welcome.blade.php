
@include('layouts.head')
<link rel="stylesheet" href="css/formAdd.css">

<body>
<div class="login-form">
    <form action="/store" method="post">
        <h2 class="text-center">Ajouter promotion</h2>       
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Ajouter.." required="required">
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-info add-new">Ajouter</button>
        </div>
           
    </form>
</div>

</body>
                             		