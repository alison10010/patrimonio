@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Painel') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<main>

    <br />
    
    <div class="form-group" style="margin-left: 8%;margin-top: 8rem;">
        <center>
        <div class="card linha animemation" onclick="location.href = 'relatorioPatrimonio';">
            <h4>Patrimônio</h4>
            <img  src="/img/code.svg" width="150px" >
            <br />        
        </div> 
    
        <div class="card linha animemation" onclick="location.href = 'relatorioMovimentacao';">
            <h4>Movimentações</h4>
            <img  src="/img/seta.svg" width="150px">
            <br />        
        </div> 
    </center>
    </div>  

</main>




@endsection  {{-- CONTEUDO DA PAGE - FIM --}}

