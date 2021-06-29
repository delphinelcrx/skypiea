@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('content')
<div class="row">

    @foreach ($cities['data'] as $city)

    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 mb-4">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $city['city'] }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Auvergne Rhône-Alpes - France</h6>
                <a href="/dashboard/{{ $city['city'] }} " style="color: green" class="card-link">Indice de pollution</a>
            </div>
        </div>
        
    </div>


    @endforeach


</div>
@endsection