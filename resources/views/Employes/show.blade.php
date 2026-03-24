@extends('layouts.main')
@section('title', 'Employe')
@section('content')
<h1>Profil employe</h1>
@include('partials.table-employe', ['employes' => [$employe]])
<h2>Activite</h2>
<p>Status: {{ $employe->statutConducteur()->value }}</p>
<h2>Voiture</h2>
<form action="{{ route('employes.verifier', $employe->id) }}" method="POST"><input id="modele" name="modele" type="text" placeholder="Modele a chercher"> <button type="submit">Valider</button>
    @csrf
    @if(session('resultat'))
    <strong>
        {{ session('resultat') }}
    </strong>
    @endif
</form>
@foreach($employe->voitures as $voiture)
@include('partials.employe-voiture-cell', ['voiture' => $voiture,'iteration'=>$loop->iteration])
@endforeach
@endsection