@extends('layouts.main')
@section('title', 'Ajouter voiture')
@section('content')
<h1>Ajouter une voiture</h1>
<form action="{{ route('vehicules.store') }}" method="POST">
    <div>
        <label for="marque">Marque:</label>
        <input type="text" id="marque" name="marque" required>
    </div>
    <div>
        <label for="modele">Modele:</label>
        <input type="text" id="modele" name="modele" required>
    </div>
    <div>
        <label for="annee">Annee:</label>
        <input type="number" id="annee" name="annee" min="1900" max="2100" required>
    </div>
    <div>
        <label for="employe_id">Employé:</label>
        <input type="number" id="employe_id" name="employe_id" value="{{ request()->route('employe') ?? '' }}" readonly>
    </div>
    <button type="submit">Ajouter la voiture</button>
</form>
@endsection