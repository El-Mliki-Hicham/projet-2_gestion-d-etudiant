@include("layouts.head")



</head>
<body>
<div class="login-form">
    @foreach ($Student as $item)
    <form  method="POST" action="{{url("student/update")}}/{{$item->Id_student}}">
        @csrf
        <h2 class="text-center">Modifier etudiant</h2>
        <div class="form-group">
            <input type="text" value="{{$item->First_name}}" class="form-control" name="first_name" placeholder="Prenom">
       </div>
       <div class="errorAddStudent">
        @error('last_name')
        {{$message}}
        @enderror
        </div>
        <div class="form-group">
            <input type="text" value="{{$item->Last_name}}"  class="form-control" name="last_name" placeholder="Nom" >
        </div>
        <div class="errorAddStudent">
         @error('last_name')
         {{$message}}
         @enderror
         </div>
         <div class="form-group">
             <input type="text"value="{{$item->Email}}" class="form-control" name="email" placeholder="Email" >
            </div>
            <div class="errorAddStudent">
             @error('email')
             {{$message}}
             @enderror
             </div>
<input type="hidden" name="idPromotion" value="{{$item->PromotionID}}">
        <div class="form-group">
            <button type="submit" class="btn btn-info btn-block">Ajouter</button>
           </div>
       </form>


       <a href="{{url('/Edit')}}/{{$item->PromotionID}}"><button type="button" class="btn btn-info return-btn">Return</button></a>
   </div>
</body>
@endforeach
</html>
<link rel="stylesheet" href="{{ asset('css/formAddStudent.css') }}">

