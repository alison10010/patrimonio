@extends('layouts.template')  {{-- USA O LAYOUT PADRÃO --}}
@section('title', 'Adicionar patrimônio') {{-- TITULO DA PAGE --}}

@section('content') {{-- CONTEUDO DA PAGE - INICIO --}}

<center>

<div class="card linha" style="margin-top: 8rem;">
  <h4>Adicionar Funcionário</h4>
  <br />
  <form action="{{route('register')}}" method="POST" autocomplete="off" style="width: 100%;margin-top:-17px">
    @csrf {{-- NECESSARIO PARA REALIZAR O SALVAMENTO DO FORM NO BD --}}

    <div class="card-body">
        <div class="form-group"> 
            <input type="txt" name="name" class="form-control" id="Nome" minlength="3" placeholder="Digite o nome completo" required value="{{ old('name') }}"> {{-- VALUE 'OLD' MANTEM O VALOR DIGITADO CASO OCORRA UM ERRO --}}
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control" id="Email" placeholder="Digite o email de acesso" required value="{{ old('Email') }}">
        </div>

        <!-- Password -->
        <div class="form-group">
            <input type="password" name="password" class="form-control" id="Senha" placeholder="Digite senha de acesso" required>
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirme a senha" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
  </form>
</div>

</center>

@endsection  {{-- CONTEUDO DA PAGE - FIM --}}

