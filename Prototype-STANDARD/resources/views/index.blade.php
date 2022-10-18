@if (session('status'))
<h1 style="color: rgb(121, 234, 121)">{{ session('status') }}</h1>
@endif
<a href="/create"><button>Ajouter</button></a>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name_promotion</th>
        </tr>
    </thead>
    <tbody>
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

