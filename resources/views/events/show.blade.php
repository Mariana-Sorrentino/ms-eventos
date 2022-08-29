@extends('layouts.main')

@section('title', $event->title)

@section('content')

<div id="containerShow" class="col-md-10 offset-md-1">
  <div class="row">
    <div id="image-container" class="col-md-6">
      <img src="/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
    </div>
    <div id="info-container" class="col-md-6">
      <h1>{{ $event->title }}</h1>
      <p class="card-dade"><ion-icon name="calendar-outline"></ion-icon> {{ date('d/m/Y', strtotime($event->date)) }}</p>
      <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event->city }} </p>
      <p class="event-participants"><ion-icon name="people-outline"></ion-icon> {{ count($event->users) }} Participantes </p>
      <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $eventOwner['name'] }}</p>
      <h3 class="mt-4">O Evento conta com:</h3>
      <ul id="items-list">
        @foreach ($event->items as $item)
          <li><ion-icon name="checkmark-outline"></ion-icon> <span>{{ $item }}</span> </li>
        @endforeach
      </ul>
    </div>
    <div class="com-md-12" id="description-container">
      <h3>Sobre o Evento</h3>
      <p class="event-description mb-4">{{ $event->description }}</p>
      @if (!$hasUserJoined)
        <form action="/events/join/{{ $event->id }}" method="POST">
          @csrf
          <a href="/events/join/{{ $event->id }}" 
            class="btn btn-primary  mb-5" 
            id="event-submit"
            onclick="event.preventDefaul();
            this.closest('form').submit();"
            >
            Confirmar Presença
          </a>
        </form>
      @else
      <h4 id="noEvents" class="already-joined-msg mb-5">Você já está participando deste Evento! <a href="/dashboard" id="backHome" class="btn btn-primary btn-lg">Ir para "Meus Eventos"</a></h4>
      @endif
    </div>
  </div>
  <div class="ccol-md-1 offset-md-5 mt-4" style="margin-top: 80px">
    <a href="/" id="backHome" class="btn btn-primary btn-lg">Voltar para Página Inicial</a>
  </div>
</div>


@endsection