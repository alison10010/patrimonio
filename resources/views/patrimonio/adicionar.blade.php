@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Adicionar patrimônio') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<center>

<div class="card linha" style="margin-top: 8rem;">
  <h4>Adicionar patrimônio</h4>
  <br />
  <form action="{{route('patrimonio.store')}}" method="POST" autocomplete="off" style="margin-left: 12px;">
    @csrf

    <div class="form-row">      
      <div class="form-group">
        <select id="Tipo" name="tipo_patrimonio" class="form-control" required value="{{ old('Tipo') }}">
            <option value="">Tipo de patrimônio</option>
            <option value="Eletrônico">Eletrônico</option>
            <option value="Moveis">Moveis</option>
            <option value="Outros">Outros</option>
        </select>
      </div>

      <div class="form-group">
        <input type="number" name="num_patrimonio" placeholder="N° do patrimônio" class="form-control" id="num_patrimonio" required value="{{ old('num_patrimonio') }}">
      </div>

    </div>


    <div class="form-group">
      <input type="text" name="descricao" class="form-control" id="Detalhes" placeholder="Detalhe: computador, monitor, mesa, tv, impressora..." required value="{{ old('Detalhes') }}">
    </div>
    <div class="form-group">
        <input type="text" name="setor_atual" placeholder="Setor pertencente (opcional)" class="form-control" id="Setor">
    </div>

    <br />
    
    <button type="submit" class="btn btn-primary">Adicionar</button>

    <button type="reset" class="btn btn-danger">Cancelar</button>

  </form>
</div>

</center>

@endsection  {{-- CONTEUDO DA PAGE - FIM --}}

