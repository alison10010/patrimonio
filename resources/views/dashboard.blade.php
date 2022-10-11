@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Painel') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<main>

    <br />
    <h4>Ultimas movimentações</h4>
    <br />
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
            @foreach ($listMivimentacao['listMivimentacao'] as $lista)
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
    @if(count($listMivimentacao) == 0)
        <p style="color: red">Não foi encontrado o número do patrimônio.</p>
    @endif

</main>


@endsection  {{-- CONTEUDO DA PAGE - FIM --}}

