@if (session('status'))
<h1 style="color: rgb(121, 234, 121)">{{ session('status') }}</h1>
@endif

search <input type="text" id="search">
<br>

<a href="/create"><button>Ajouter</button></a>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name_promotion</th>
        </tr>
    </thead>
    <tbody id="tbody"> 
        @foreach ($promotion as $value)
            
        <tr>
            <th>{{$value->Id_promotion}}</th>
            <td>{{$value->Name_promotion}}</td>
            <td>
                <a href="Edit/{{$value->Id_promotion}}"><button>Edit</button></a>
                <a href="Delete/{{$value->Id_promotion}}"><button>Delete</button></a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/search.js"></script>