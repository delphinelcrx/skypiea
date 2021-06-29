@extends('layouts.app')

@section('title')
Nouvelle alerte pour {{ $pollution['data']['city'] }}
@endsection

@section('content')

<h3>Création d'une alerte pour {{ $pollution['data']['city'] }}</h3>

@if($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger w-100" role="alert">
    {{ $error }}
</div>
@endforeach
@endif

<form class="w-100" method="POST" action="{{ route('alerts.store') }}">
    @csrf
    <input type="hidden" name="city" value="{{ $pollution['data']['city'] }}">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="name">Nom de l'alerte</label>
            <input type="text" class="form-control" name="name" id="name" value="Indicateur de pollution de {{ $pollution['data']['city'] }}" />
        </div>
        <div class="form-group col-md-6">
            <label for="aqius">Aqius</label>
            <input type="number" class="form-control" name="aqius" id="aqius" value="{{ $pollution['data']['current']['pollution']['aqius'] }}"/>
        </div>
        <div class="form-group col-md-6">
            <label for="movement">Mouvement</label>
            <select id="movement" class="form-control" name="movement">
                <option value="+" selected="">+</option>
                <option value="-">-</option>
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100">Créer</button>
</form>
@endsection