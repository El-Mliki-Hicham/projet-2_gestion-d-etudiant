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
        </tr>
        @endforeach

    </tbody>
</table>

