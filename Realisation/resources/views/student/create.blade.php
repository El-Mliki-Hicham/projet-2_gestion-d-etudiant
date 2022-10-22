
@include("layouts.head")



</head>
<body>
<div class="login-form">
    <form method="POST" action="{{url("student/store")}}">
        @csrf
        <h2 class="text-center">Ajouter etudiant</h2>
        <div class="form-group">
            <input type="text" class="form-control" name="first_name" placeholder="Prenom">
       </div>
       <div class="errorAddStudent">
        @error('last_name')
        {{$message}}
        @enderror
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="last_name" placeholder="Nom" >
        </div>
        <div class="errorAddStudent">
         @error('last_name')
         {{$message}}
         @enderror
         </div>
         <div class="form-group">
             <input type="text" class="form-control" name="email" placeholder="Email" >
            </div>
            <div class="errorAddStudent">
             @error('email')
             {{$message}}
             @enderror
             </div>

        <div class="form-group">
            <button type="submit" class="btn btn-info btn-block">Ajouter</button>
           </div>
           <input type="hidden" value="{{$id}}"  name="id">
       </form>
       {{-- <a href="{{url('/Edit')}}/{{$item->PromotionID}}"><button type="button" class="btn btn-info return-btn">Return</button></a> --}}
       @php
           echo "<a href=\"javascript:history.go(-1)\"><button type='button' class='btn btn-info return-btn'>Return</button></a>"
       @endphp

   </div>
</body>
</html>
<link rel="stylesheet" href="{{ asset('css/formAddStudent.css') }}">
