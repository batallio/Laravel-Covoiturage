<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>NbVoiture</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employes as $employe)
        <tr>
            <td>{{ $employe->nom }}</td>
            <td>{{ $employe->prenom }}</td>
            <td>{{ $employe->email }}</td>
            <td>{{ $employe->compterVoitures() }}</td>
        </tr>
        @endforeach
    </tbody>
</table>