@extends('layouts.main')

@section('title', 'MS Larevel Events (Laravel)')

@section('content')

<div id="search-container" class="col-md-12">
  <h1>Produza eventos e conteúdos digitais <br/>
    e nós Divulgamos na maior plataforma do Brasil</h1>
  <form action="/" method="GET">
    <input type="text" id="search" name="search" class="form-control" placeholder="Busque por um evento...">
  </form>
  <div class="col-m-12 mt-5 text-center">
    <h2>Soluções completas para produtores de eventos e empreendedores digitais <br/>
      Divulgamos eventos em todo o Brasil!</h2>
      <a href="/events/create" id="budget" class="btn btn-primary btn-lg">CRIE AGORA SEU AVENTO!</a>
  </div>
</div>
<div id="EventsTipe" class="wp-block-kadence-column inner-column-1 kadence-column_00b929-83 kb-section-dir-horizontal">
  <div class="kt-inside-inner-col">
    <p style="font-size:18px">
      <a href="#"> Eventos Virtuais |</a> 
      <a href="#"> Eventos Híbridos | </a> 
      <a href="#"> Webinars | </a>
      <a href="#"> Filmagens | </a>
      <a href="#"> Casting | </a>
      <a href="#"> Sistemas </a>
    </p>
  </div>
</div>


<div id="events-container" class="col-md-11 offset-md-1">
    @if ($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias:</p>  

    @endif
    
  <div id="cards-container" class="row"> 
    @foreach ($events as $event)   
      <div class="card col-md-3">
        <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
        <div class="card-body">
          <p class="card-dade">{{ date('d/m/Y', strtotime($event->date)) }}</p>
          <h5 class="card-title">{{ $event->title }}</h5>
          <p class="card-participants">{{ count($event->users) }} Participantes</p>
          <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber Mais</a>
        </div>
      </div>
    @endforeach
    @if (count($events) == 0 && $search)
      <h4 id="noEvents">
        Não Foi Possível Encontrar Nenhum Evento com: {{ $search }} <a href="/" class="btn btn-primary ms-5">Ver Todos Eventos Disponíveis</a>
      </h4>
    @elseif (count($events) == 0) 
      <h4 id="noEvents">Não Há Eventos Disponíveis no Momento</h4>     
    @endif
  </div>
</div>

@endsection
        
