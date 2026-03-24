@extends('layouts.main')
@section('title', 'Voiture')
@section('content')
<h1>Voiture</h1>
@include('partials.little-table', ['theadContent' => 'Modele','tbodyContent'=>$voiture->modele])
@include('partials.little-table', ['theadContent' => 'Nb Places','tbodyContent'=>$voiture->nb_places])
<h2>Propieters</h2>
@include('partials.table-employe', ['employes' => [$voiture->employe]])
@endsection