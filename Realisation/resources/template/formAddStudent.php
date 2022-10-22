 @include("layouts.head")



 </head>
 <body>
 <div class="login-form">
     <form action="/examples/actions/confirmation.php" method="post">
         <h2 class="text-center">Ajouter Etudient</h2>
         <div class="form-group">
             <input type="text" class="form-control" name="first_name" placeholder="Prenom" required="required">
        </div>
         <div class="form-group">
             <input type="text" class="form-control" name="last_name" placeholder="Nom" required="required">
         </div>
         <div class="form-group">
             <input type="text" class="form-control" name="email" placeholder="Email" required="required">
         </div>

         <div class="form-group">
             <button type="submit" class="btn btn-info btn-block">Ajouter</button>
            </div>

        </form>
        <button type="button" class="btn btn-info return-btn">Return</button>
    </div>
 </body>
 </html>
 <link rel="stylesheet" href="{{ asset('css/formAddStudent.css') }}">
