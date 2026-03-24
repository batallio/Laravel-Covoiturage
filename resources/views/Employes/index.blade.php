@extends('layouts.main')
@section('title', 'Liste employes')
@section('content')
<h1>Liste des employes</h1>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employes as $employe)
        <tr>
            <th>{{$employe->nom}}</th>
            <th>{{$employe->prenom}}</th>
            <th>{{$employe->email}}</th>
            <th>{{$employe->id}}</th>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection