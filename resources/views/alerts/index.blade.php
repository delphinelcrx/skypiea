@extends('layouts.app')

@section('title')
Mes alertes
@endsection

@section('content')
<div class="row">
    @foreach($alerts as $alert)
    <div class="w-100 shadow-sm mb-4 rounded px-4 py-3 d-flex justify-content-between align-items-center">

        <p class="mb-0">{{ $alert->name }} pour {{ $alert->city }}, quand l'indice de pollution est à {{ $alert->movement }} de {{ $alert->aqius }} aqius.</p>
        <div>
            <a href="{{ route('alerts.edit', ['alert' => $alert]) }}" style="color: green">Modifier</a>
            <form class="w-100" method="POST" action="{{ route('alerts.delete', ['alert' => $alert]) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Supprimer</button>
            </form>

        </div>

    </div>
    @endforeach
</div>
@endsection