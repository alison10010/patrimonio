@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Relatório') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<main>

    <br /><br />
    
    <form  id="signup-form">
        <div>
            <div class="custom-control custom-checkbox custom-control-inline">
                <h3>Patrimônios cadastrados</h3><br />
                <label>Caso queira todos os patrimônios, não informe a data.</label>
            </div>
        </div>
        <br />
        <div class="form-inline">
            <label class="label-text">Informe o período para gerar o relatório:</label>
            <input type="date" class="form-control" style="margin-left: 10px" name="dataOne" />
            <label style="padding: 0px 12px 0px 12px;"> até </label>
            <input type="date" class="form-control" name="dataTwo" /> 
            <button type="button" class="btn btn-primary" style="margin-left: 10px" onclick="framePatrimonio()">Gerar</button>
        </div>
    </form>

    <hr class="sidebar-divider"> 

    <iframe src="" style="width: 100%; min-height: 100vh;" id="frame" class="frame">Your browser isn't compatible</iframe>

</main>




@endsection  {{-- CONTEUDO DA PAGE - FIM --}}

