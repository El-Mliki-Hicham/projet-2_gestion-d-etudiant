 @include("layouts.head")
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
    
    @foreach ($promotion as $item)
    
<form  method="POST" action="{{url("update")}}/{{$item->Id_promotion}}">
    @csrf
    <p class="text" onclick="change()">{{$item->Name_promotion}}</p>
    <input type="text" class="input" name="name" value="{{$item->Name_promotion}}">
    <button class="btn">update</button>
</form>
@endforeach
    
    <div class="container">
      
        <div class="card cadre-search">
            <div class="card-body">
                <div class="col-sm-4">
                    <div class="search-box">
                        <i class="material-icons">&#xE8B6;</i>
                        <input type="text" class="form-control searchInput" placeholder="Search&hellip;">
                    </div>
                </div>
                <div class="col-sm-8 divAdd" >
                <a href="{{url("student/create")}}/{{$item->Id_promotion}}"><button type="button"  class="btn btn-info add-new"><i class="fa fa-plus"></i> Ajouter Etudient</button>
                </a>
                </div>
            </div>
          </div>
        <div class="table-responsive">
            <div class="table-wrapper">
               
                <table class="table table-striped table-hover">
                    <thead>
                        <th>Id</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($Student as $item)
                        <tr>
                            <td>{{$item->Id_student}}</td>
                            <td>{{$item->First_name}}</td>
                            <td>{{$item->Last_name}}</td>
                            <td>{{$item->Email}}</td>
                            <td>
                                <a href="{{url('student/Edit')}}/{{$item->Id_student}}">Edit</a>
                                <a href="{{url('/student/Delete/')}}/{{$item->Id_student}}/{{$item->PromotionID}}">Delete</a>
                           
                            </td>
                        </tr>
                    @endforeach                                    
                    </tbody>
                </table>
                <script src="{{asset('js/formEdit.js')}}"></script>
                <a href="{{url('index')}}"><button>return</button></a>
            </div>
        </div>        
    </div>     
    </body>
    