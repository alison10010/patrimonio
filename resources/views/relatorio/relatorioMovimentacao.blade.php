@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Relatório') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<main>

    <br />    
    <form  id="signup-form">
        <div>
            <div class="custom-control custom-checkbox custom-control-inline">
                <h3>Movimentações de patrimônio</h3><br />

                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="radio" class="custom-control-input" id="movimentacaoA" name="movimentacao" value="todos" onclick="relatorioOpcao('todos')" checked>
                    <label class="custom-control-label" for="movimentacaoA">Todos</label>
                </div>

                <div class="custom-control custom-checkbox custom-control-inline">
                    <input type="radio" class="custom-control-input" id="movimentacaoB" name="movimentacao" value="especifico" onclick="relatorioOpcao('especifico')">
                    <label class="custom-control-label" for="movimentacaoB">Patrimônio especifico</label>
                    <input type="number" name="num_patrimonio" placeholder="0" class="form-control" id="num_patrimonio" required value="{{ old('Patrimonio') }}" style="max-width: 200px;display: none">
                </div>
                
                <br />

                <label>Caso queira todo o histórico de movimentação, não informe a data.</label>
            </div>
        </div>
        <br />
        <div class="form-inline">           
            <label class="label-text">Informe o período para gerar o relatório:</label>
            <input type="date" class="form-control" style="margin-left: 10px" name="dataOne" />
            <label style="padding: 0px 12px 0px 12px;"> até </label>
            <input type="date" class="form-control" name="dataTwo" /> 
            <button type="button" class="btn btn-primary" style="margin-left: 10px" onclick="frameMovimentacao()">Gerar</button>
        </div>
    </form>

    <hr class="sidebar-divider"> 

    <iframe src="" style="width: 100%; min-height: 100vh;" id="frame" class="frame">Your browser isn't compatible</iframe>

</main> 

@endsection  {{-- CONTEUDO DA PAGE - FIM --}}