 @include("layouts.head")


 <style>
     .login-form {
         width: 340px;
         margin: 50px auto;
     }
     .login-form form {
         margin-bottom: 15px;
         background: #f7f7f7;
         box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
         padding: 30px;
     }
     .login-form h2 {
         margin: 0 0 15px;
     }
     .form-control, .btn {
         min-height: 38px;
         border-radius: 2px;
     }

 </style>
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
             <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
            </div>

        </form>
        <button type="button" class="btn btn-info return-btn">Return</button>
    </div>
 </body>
 </html>
 <link rel="stylesheet" href="{{ asset('css/formAddStudent.css') }}">
