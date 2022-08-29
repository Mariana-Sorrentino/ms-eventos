@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div id="myEvents" class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>

<div class="col-md-10 offset-md1 dashboard-events-container">
    @if (count($events) > 0)
    <p>seu evento</p>
    @else
    <p>Você ainda não tem eventos, <a href="/events/create" id="backHome" class="btn btn-primary btn-lg">Criar Evento</a></p>
        
    @endif
</div>

@endsection
