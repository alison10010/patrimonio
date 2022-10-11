@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Localizar patrimônio') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<main>

<form action="{{route('patrimonio.show')}}" method="POST" autocomplete="off" style="max-width: 25rem;margin-top: 2rem">
    @csrf
    <div class="form-row">
      <div class="form-group">
        <label for="patrimonio">N° do patrimônio</label>
        <input type="number" name="num_patrimonio" placeholder="0" class="form-control" id="Patrimonio" required value="{{ old('Patrimonio') }}">
      </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>

<br />

</main>

@if(isset($lista))

@foreach ($lista as $listas)

  <a type="button" href="{{route('patrimonio.localizar')}}/{{ $listas->id }}" style="float: right;" class="btn btn-danger">Mover patrimônio</a>

@endforeach
<br /><br />

<table class="table table-bordered" id="dataTable" cellspacing="0">
  <thead>
      <tr>
          <th scope="col" style="width: 15%">Tipo patrimônio</th>
          <th scope="col" style="width: 14%">N° do patrimônio</th>
          <th scope="col">Descrição</th>
          <th scope="col">Setor atual</th>
          <th scope="col" style="width: 15%">Data de cadastro</th>
          <th scope="col">Usuário</th>
      </tr>
  </thead>
  <tbody>  
      @foreach ($lista as $listas)
        <tr>                  
            <td>{{ $listas->tipo_patrimonio }}</td>
            <td>{{ $listas->num_patrimonio }}</td>
            <td>{{ $listas->descricao }}</td>
            <td>{{ $listas->setor_atual }}</td>
            <td>{{ date('d-m-y H:i', strtotime($listas->date_adicionado)) }}</td>  
            <td>{{ $listas->user->name }}</td>
        </tr>
      @endforeach
  </tbody>

</table>
  @if(count($lista) == 0)
      <p style="color: red">Não foi encontrado o número do patrimônio.</p>
  @endif

  <br />
  <h4>Histórico de movimentações</h4>

  <table class="table table-bordered" id="dataTable" cellspacing="0">
    <thead>
        <tr>
          <th scope="col" style="width: 15%">N° do patrimônio</th>
          <th scope="col" style="width: 15%">Descrição</th>
          <th scope="col" style="width: 15%">Movido de</th>
          <th scope="col" style="width: 15%">para</th>
          <th scope="col" style="width: 15%">Usuário</th>
          <th scope="col" style="width: 12%"></th>
        </tr>
    </thead>
    <tbody> 
        @foreach ($historico['historico'] as $lista)
          <tr>                  
            <td>{{ $lista->patrimonio->num_patrimonio }}</td>
            <td class="capitalize">{{ $lista->patrimonio->descricao }}</td>
            <td class="capitalize">{{ $lista->from }}</td> 
            <td class="capitalize">{{ $lista->to }}</td>
            <td class="capitalize">{{ $lista->user->name }}</td>
            <td><center>{{ date('d-m-y H:i', strtotime($lista->created_at)) }}</center></td> 
          </tr>
        @endforeach
    </tbody>
  
  </table>
  @if(count($historico['historico']) == 0)
      <p style="color: red">Não houve movimentações.</p>
  @endif
  
@endif


@endsection  {{-- CONTEUDO DA PAGE - FIM --}}

