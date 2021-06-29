@extends('layouts.app')

@section('title')
{{ $param }}
@endsection

@section('content')

{{-- Ici je récupere les données de chaque ville pour les afficher dans une page de détail --}}

<div class="card card text-center">
  <div class="card-body">
  Bonjour aux habitants de {{ $param }}, charmante ville d'{{ $weather['data']['state'] }} en {{ $weather['data']['country'] }}.</br>
<h5>Au moment où vous lisez cette phrase, l'indice de pollution est de  <span style="color: red">{{ $weather['data']['current']['pollution']['aqius'] }}</span> aqius chez vous.</h5>
  </div>
</div>


<a href="{{ route('alerts.create', ['weather' => $weather['data']['city']]) }}" class="mt-3 btn btn-primary w-100">Créer une alerte pour ma ville</a>
    
@endsection

