@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Eventos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
  @if (count($events) > 0)
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Participantes</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($events as $event)
        <tr>
          <td scropt="row">{{ $loop->index + 1 }}</td>
          <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
          <td>{{ count($event->users) }}</td>
          <td>
            <a href="/events/edit/{{ $event->id }}" 
              id="btnMyEvents" class="btn btn-info edit-btn">
              <ion-icon id="iconMyEvents" name="create-outline"></ion-icon>
              Editar
            </a> 
            <form action="/events/{{ $event->id }}" method="POST">
              @csrf
              @method('DELETE')
                <button type="submit" 
                  id="btnMyEvents" 
                  class="btn btn-danger delete-btn">
                  <ion-icon id="iconMyEvents" name="trash-outline"></ion-icon>
                  Deletar
              </button>
            </form>            
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <h4 id="noEvents">Você ainda não criou nenhum Evento! <a href="/events/create" id="backHome" class="btn btn-primary btn-lg">Criar Evento</a></h4>        
  @endif 
</div>

<div class="col-md-10 offset-md-1 dashboard-title-container">
  <h1>Eventos que estou participando:</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
  @if (count($eventsasparticipant) > 0)
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Participantes</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($eventsasparticipant as $event)
        <tr>
          <td scropt="row">{{ $loop->index + 1 }}</td>
          <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
          <td>{{ count($event->users) }}</td>
          <td>
            <form action="/events/leave/{{ $event->id }}" method="POST">
              @csrf
              @method('DELETE')
                <button type="submit" 
                  id="btnOutEvents" 
                  class="btn btn-danger delete-btn">
                  <ion-icon id="iconMyEvents" name="log-out-outline"></ion-icon>
                  Sair do Evento
              </button>
            </form>            
         
            {{-- <a href="#">Sair do Evento</a>           --}}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <h4 id="noEvents">Você ainda não está participando de nenhum Evento!
    <a href="/" id="backHome" class="btn btn-primary btn-lg">
      Veja Todos os Eventos
    </a>
  </h4>
    
  @endif
</div>

@endsection
