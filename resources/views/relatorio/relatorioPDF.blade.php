@extends('relatorio.modeloRelatorio')  {{-- USA O LAYOUT PADRÃO --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<div class="head">
    <p style="font-size: 12px"><b>Relatório de Patrimônio - SEASDHM</b></p>
    <p style="font-size: 12px">
        @php
            echo date('d/m/Y H:i');
        @endphp
    </p>
  </div>

    <table>
        <tr>
            <th scope="col" class="texto" style="width: 15%">Tipo</th>
            <th scope="col" class="texto" style="width: 21%">N° Patrimônio</th>
            <th scope="col" class="texto">Descrição</th>
            <th scope="col" class="texto">Setor Atual</th>
            <th scope="col" class="texto"><center>Dat. cadastrado</center></th>
            <th scope="col" class="texto"><center>Ult. movimento</center></th>
        </tr>

        @foreach ($listPatrimonio as $patrimonio)
        <tr>                        
            <td class="texto">{{ $patrimonio->tipo_patrimonio }}</td>
            <td class="texto">{{ $patrimonio->num_patrimonio }}</td>
            <td class="texto">{{ $patrimonio->descricao }}</td>
            <td class="texto">{{ $patrimonio->setor_atual }}</td>
            <td class="texto"><center>{{ date('d-m-y H:i', strtotime($patrimonio->date_adicionado)) }}</center></td>
            <td class="texto"><center>{{ date('d-m-y H:i', strtotime($patrimonio->updated_at)) }}</center></td>
        </tr>
        @endforeach

    </table> 
    @if(count($listPatrimonio) == 0)
        <p style="color: red">Não foi encontrado nenhum patrimônio.</p>
    @endif

</div>

@endsection  {{-- CONTEUDO DA PAGE - FIM --}}