<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link href="https://fonts.googleapis.com/css2?family=Chilanka&family=Dancing+Script&family=Roboto" rel="stylesheet">
        
        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

         <!-- Icons Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- CSS da Aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>      
    </head>

    <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-ligth">
          <div class="collapse navbar-collapse" id="navbar">
            <a href="/" class="navbar-brand">
              <img src="/img/logo3.png" alt="MS Events (Laravel)">
            </a>             
            <p id="hi" class="event-owner"><ion-icon id="iconHi" name="happy-outline"></ion-icon>  
              @if (auth()->user() !== null)
              Olá, {{ auth()->user()->name }}!
              @else
                <span>Olá, Faça o login!</span>         
              @endif
            </p>           
            <ul class="navbar-nav"> 
              <li class="nav-item" id="itens">
                <a href="/" class="nav-link">Eventos</a>
              </li>
              <li class="nav-item"  id="itens">
                <a href="/events/create" class="nav-link">Criar Eventos</a>
              </li>
              <li class="nav-item" id="itens">
                <a href="/contact" class="nav-link">Contato</a>
              </li>
              @auth
              <li class="nav-item" id="itens">
                <a href="/dashboard" class="nav-link">Meus Eventos</a>
              </li>
              <li class="nav-item" id="itens">
                <form method="POST" name="logout" action="{{ route('logout') }}">
                  @csrf
                  <a href="javascript:document.logout.submit()" class="nav-link">Sair</a>
                </form>
                {{-- <form action="/logout" method="POST">
                  @csrf
                  <a href="/logout" 
                    class="nav-link" 
                    onclick="event.preventDefaut();
                    this.closest('form').submit();">
                    Sair
                  </a>
                </form> --}}
              </li>
              @endauth
              @guest
              <li class="nav-item" id="itens">
                <a href="/login" class="nav-link">Entrar</a>
              </li>
              <li class="nav-item" id="itens">
                <a href="/register" class="nav-link">Cadastrar</a>
              </li>
              @endguest
            </ul>
          </div>
        </nav>
      </header>

      <main>
        <div class="container-fluid">
          <div class="row">
           
            @if (session('msg'))
              <p class="msg">{{ session('msg') }}</p>
            @endif  
            @yield('content')         
          </div>
        </div>
      </main>

      <footer id="rodape">
        <p>MS Eventos (Laravel) &copy; 2022</p>      
      </footer> 
      
      <script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script> 
      <script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
