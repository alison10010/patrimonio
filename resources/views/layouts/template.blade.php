
<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/css/style.css" rel="stylesheet">
  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>

  <link href="/css/estiloManual.css" rel="stylesheet">

</head>
<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <img  class="navbar-brand" src="/img/organizacao.svg" style="margin-left: 10px;padding: 0px 10px;">
      </div>
      <ul class="nav navbar-nav">
        <li ><a href="{{route('dashboard')}}">Inicio</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Patrimônio <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{route('patrimonio.create')}}">Adicionar</a></li>
            <li><a href="{{route('patrimonio.localizar')}}">Localizar</a></li>
          </ul>
        </li>
  
        @if(auth()->user()->nivel_acesso == '2')
            
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Funcionário <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="{{route('register')}}">Gerenciar</a></li>
            </ul>
          </li>
        @endif

        <li><a href="{{route('relatorio.dashboard')}}">Relatorio</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">
            @auth
              {{ auth()->user()->name }}
            @endauth</a></li>
        <li><a>|</a></li>
        <li>
            <form action="{{route('logout')}}" method="POST" style="margin-top: 15px;padding-right: 30px;">
              @csrf
              <a href="/logout" onclick="event.preventDefault(); this.closest('form').submit();" style="color: #FFF;text-decoration: none">Sair</a>
            </form>    
        </li>
      </ul>
    </div>
  </nav>
  
<main> 
  <div class="container">
    @include('include/msgError')  {{-- MGS DE ERROR NOS FORMULARIOS DE VALIDACAO --}}
    @if(session('msg'))  {{-- VERIFICA SE EXISTE MSG NA SESSÃO --}}
        <div class="alert alert-success" id="alert" role="alert">
            <button type="button" class="close" data-dismiss="alert" onclick="fechaModal()">x</button>
            {{ session('msg') }}
        </div>
    @endif
    @if(session('error'))  {{-- VERIFICA SE EXISTE MSG NA DE ERRO NA SESSÃO --}}
        <div class="alert alert-danger" id="alert" role="alert">
            <button type="button" class="close" data-dismiss="alert" onclick="fechaModal()">x</button>
            {{ session('error') }}
        </div>
    @endif                     
   
    @yield('content') {{-- CONTEUDO DAS PAGINAS --}}

  </div>
</main>

<script src="/js/scriptManual.js"></script>

</body>
</html>