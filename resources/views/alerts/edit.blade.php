@extends('layouts.app')

@section('title')
Modifier l'alerte
@endsection


@section('content')

@if($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger w-100" role="alert">
    {{ $error }}
</div>
@endforeach
@endif

<div class="row ">
    <h3>Modification de "{{ $alert->name }}"</h3>

    <form class="w-100" method="POST" action="{{ route('alerts.update', ['alert' => $alert]) }}">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="name">Nom de l'alerte</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $alert->name }}">
            </div>
            <div class="form-group col-md-6">
                <label for="aqius">Aqius</label>
                <input type="number" class="form-control" name="aqius" id="aqius" value="{{ $alert->aqius }}">
            </div>
            <div class="form-group col-md-6">
                <label for="movement">Mouvement</label>
                <select id="movement" class="form-control" name="movement">
                    <option value="-" @if($alert->movement === '-') selected @endif>-</option>
                    <option value="+" @if($alert->movement === '+') selected @endif>+</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">Modifier</button>
    </form>
</div>
@endsection