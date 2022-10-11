@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Movimentar patrimônio') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<main>

<br /><br /><br />
    <div class="card linha" style="margin: auto;">
        <center><h4>Movimentação de patrimônio</h4></center>
        <br />
        <form action="{{route('patrimonio.storeMovimentacao')}}" method="POST" autocomplete="off" style="margin-left: 12px;">
          @csrf     

          <div class="form-inline">
            <label for="patrimonio">N° do patrimônio: </label>
            <label for="patrimonio">{{$patrimonio->num_patrimonio}}</label>
          </div>

          <div class="form-inline">
            <label for="setor">Descrição: </label>
            <label for="setor">{{$patrimonio->descricao}}</label>
          </div>

          <div class="form-inline">
            <label for="setor">Setor atual: </label>
            <label for="setor">{{$patrimonio->setor_atual}}</label>
          </div>
      
          <br />
          <div class="form-group">
              <input type="text" name="to" placeholder="Novo setor" class="form-control" id="Setor">
          </div>
          
          <input type="hidden" name="patrimonio_id" value="{{$patrimonio->id}}">
          <input type="hidden" name="from" value="{{$patrimonio->setor_atual}}">
          <button type="submit" class="btn btn-primary" style="width: 100%">Mover</button>
      
        </form>
      </div>


<br />

</main>


@endsection  {{-- CONTEUDO DA PAGE - FIM --}}

