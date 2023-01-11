
@extends('relatorio.modeloRelatorio')  {{-- USA O LAYOUT PADRÃO --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

  <div class="head">
    <p style="font-size: 12px"><b>Relatório de Movimentações de patrimônio</b></p>
    <p style="font-size: 12px">
        @php
            echo date('d/m/Y H:i'); 
        @endphp
    </p>
  </div>
  <div class="head">    
    @if(isset($listMovimentacao['periodo']))
        <p>{{$listMovimentacao['periodo']}}</p>
    @endif
  </div>
  @if(isset($listMovimentacao['totalGeral']))
      <p style="font-size: 12px">Total geral de entrada: {{$listMovimentacao['totalGeral']}}</p>
  @endif

  <table class="table table-bordered" id="dataTable" cellspacing="0">
    <thead>
        <tr>
            <th class="texto" scope="col" style="width: 15%">N° patrimônio</th>
            <th class="texto" scope="col" style="width: 15%">Descrição</th>
            <th class="texto" scope="col" style="width: 15%">Movido de</th>
            <th class="texto" scope="col" style="width: 15%">para</th>
            <th class="texto" scope="col">Usuário</th>
            <th class="texto" scope="col" style="width: 16%"><center>Data</center></th>
        </tr>
    </thead>
    <tbody> 
      @if(isset($listMovimentacao)) 
        @foreach ($listMovimentacao['listMovimentacao'] as $lista)
            <tr>                   
                <td>{{ $lista->patrimonio->num_patrimonio }}</td>
                <td class="texto capitalize">{{ $lista->patrimonio->descricao }}</td>
                <td class="texto capitalize">{{ $lista->from }}</td> 
                <td class="texto capitalize">{{ $lista->to }}</td>
                <td class="texto capitalize">{{ $lista->user->name }}</td>
                <td><center>{{ date('d-m-y H:i', strtotime($lista->created_at)) }}</center></td> 
            </tr>
        @endforeach
      
    </tbody>
  </table>
        @if(count($listMovimentacao) == 0)
            <p style="color: red">Não foi encontrado movimentações desse patrimônio.</p>
        @endif
      @endif
</div>

@endsection  {{-- CONTEUDO DA PAGE - FIM --}}
