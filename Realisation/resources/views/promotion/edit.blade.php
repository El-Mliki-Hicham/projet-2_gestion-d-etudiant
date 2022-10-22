@include("layouts.head")

@if (session('status'))
<h4 class="alert alert-success message-session">{{ session('status')}}
<form action="{{url("sessionDelete")}}" method="POST">
    @csrf
<button class="btn-x" type="submit">X</button>
</form>
</h4>

@endif


    <div class="container">

            <div class="card cadre-search">
                <div class="card-body">
                    @foreach ($promotion as $item)

                    <form  method="POST" class="formUpdate" action="{{url("update")}}/{{$item->Id_promotion}}">
                        @csrf
                        <h1 class="text" onclick="change()">Promotion : {{$item->Name_promotion}}</h1>
                        {{-- <input type="text"  class="input" name="name" value="{{$item->Name_promotion}}"> --}}
                        <div style="display: none" class="search-box">
                            <input type="text" class="form-control searchInput input" name="name" value="{{$item->Name_promotion}}">
                        </div>
                        <input type="submit" class="btn_update" value="update">
                    </form>
                    @endforeach
                </div>
            </div>
        <div class="card cadre-search">
            <div class="card-body">
                <div class="col-sm-4">
                    <div class="search-box">
                        <i class="material-icons">&#xE8B6;</i>
                        <input type="hidden" value="{{$item->Id_promotion}}" id="searchID">
                        <input type="text" id="search" class="form-control searchInput" placeholder="Search&hellip;">
                    </div>
                </div>
                <div class="col-sm-8 divAdd" >
                <a href="{{url("student/create")}}/{{$item->Id_promotion}}"><button type="button"  class="btn btn-info add-new"><i class="fa fa-plus"></i> Ajouter etudiant</button>
                </a>
                </div>
            </div>
          </div>
        <div class="table-responsive">
            <div class="table-wrapper">

                <table class="table table-striped table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="tbody">
                        @foreach ($Student as $item)
                        <tr>
                            <td>{{$item->Id_student}}</td>
                            <td>{{$item->First_name}}</td>
                            <td>{{$item->Last_name}}</td>
                            <td>{{$item->Email}}</td>
                            <td>
                                <a href="{{url('student/Edit')}}/{{$item->Id_student}}" class="settings" title="Edit" data-toggle="tooltip"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="{{url('/student/Delete/')}}/{{$item->Id_student}}/{{$item->PromotionID}}" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <script src="{{asset('js/formEdit.js')}}"></script>
                <script src="{{asset('js/searchStudent.js')}}"></script>
                <a href="{{url('index')}}"><button class="btn btn-info return-btn">Return</button></a>
            </div>
        </div>
    </div>
    </body>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
        </script>
