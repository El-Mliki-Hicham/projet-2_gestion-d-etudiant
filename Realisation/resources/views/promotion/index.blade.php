{{-- {{$promotion}} --}}
<a href="create"><button>ajouter</button></a>
<table>

    <thead>
        <tr>
            <th>Id</th>
            <th>Nom promotion</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach ($promotion as $item)
    <tbody>
        <tr>
            <td>{{$item->Id_promotion}}</td>
            <td>{{$item->Name_promotion}}</td>
            <td>
                <a href="Edit/{{$item->Id_promotion}}">Edit</a>
                <a href="Delete/{{$item->Id_promotion}}">Delete</a>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>