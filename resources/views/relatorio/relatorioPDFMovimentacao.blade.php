<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
p,tr,h2,h3,h4{
    font-family: sans-serif;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body>


<div style="overflow-x:auto;"> 

  <center><img  class="navbar-brand" src="./img/brasao_acre.svg" style="width: 10%"></center>
  <h4>Relatório de Movimentação - SEASDHM</h4>

  <table class="table table-bordered" id="dataTable" cellspacing="0">
    <thead>
        <tr>
            <th scope="col" style="width: 15%">N° patrimônio</th>
            <th scope="col" style="width: 15%">Descrição</th>
            <th scope="col" style="width: 15%">Movido de</th>
            <th scope="col" style="width: 15%">para</th>
            <th scope="col">Usuário</th>
            <th scope="col" style="width: 16%"><center>Data</center></th>
        </tr>
    </thead>
    <tbody> 
      @if(isset($listMovimentacao)) 
        @foreach ($listMovimentacao as $lista)
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
        @if(count($listMovimentacao) == 0)
            <p style="color: red">Não foi encontrado movimentações desse patrimônio.</p>
        @endif
      @endif
</div>

</body>
</html>
