@extends('layouts.main')

@section('title', 'Editando: ' . $event->title)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  
    <h1>Editando o Evento: {{ $event->title }}</h1>
    <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="form-group  mb-4">
        <label id="titleInput" for="title">Evento:</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" value="{{ $event->title }}">
      </div>

      <div class="form-group  mb-4">
        <label id="titleInput" for="date">Data do Evento:</label>
        <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}">
      </div>

      <div class="form-group  mb-4">
        <label id="titleInput" for="title">Cidade:</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento" value="{{ $event->city }}">
      </div>

      <div class="form-group mb-4">
        <label id="titleInput" for="title">O evento é Público ou Privado?</label>
        <select name="private" id="private" class="form-control">
            <option value="0">Público</option>
            <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Privado</option>
        </select>
      </div>

      <div class="form-group  mb-4">
        <label id="titleInput" for="title">Descrição:</label>
        <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer neste evento?">{{ $event->description }}</textarea>
      </div>

      <div class="form-group  mb-4">
        <label id="titleInput" for="title">Adicione os itens de infraestrutura que seu evento terá:</label>
        <div class="form-group mt-2 mb-4">
          <input id="check" type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
        </div>
        <div class="form-group  mb-4">
          <input id="check" type="checkbox" name="items[]" value="Palco"> Palco
        </div>
        <div class="form-group  mb-4">
          <input id="check" type="checkbox" name="items[]" value="Brindes"> Brindes
        </div>
        <div class="form-group  mb-4">
          <input id="check" type="checkbox" name="items[]" value="Buffet"> Buffet
        </div>
        <div class="form-group  mb-4">
          <input id="check" type="checkbox" name="items[]" value="Stands"> Stands
        </div>
      </div>

      <div id="addImage" class="form-group  mb-4">
        <label for="image">Banner do Evento:</label>
        <input type="file" id="image" name="image" class="form-control-file">
        <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
      </div>

      <input type="submit" class="btn btn-primary mt-2 mb-4" value="Editar Evento">
    </form>
    <div class="col-md-12 offset-md-5 mt-4">
      <a href="/" id="backHome" class="btn btn-primary btn-lg">Voltar para Página Inicial</a>
    </div>
</div>   
@endsection

        
        
