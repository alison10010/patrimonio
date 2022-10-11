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
  <h4>Relatório de Patrimônio - SEASDHM</h4>

    <table>
        <tr>
            <th scope="col" style="width: 15%">Tipo</th>
            <th scope="col" style="width: 21%">N° Patrimônio</th>
            <th scope="col">Descrição</th>
            <th scope="col">Setor Atual</th>
            <th scope="col"><center>Dat. cadastrado</center></th>
            <th scope="col"><center>Ult. movimento</center></th>
        </tr>

        @foreach ($listPatrimonio as $patrimonio)
        <tr>                        
            <td>{{ $patrimonio->tipo_patrimonio }}</td>
            <td>{{ $patrimonio->num_patrimonio }}</td>
            <td>{{ $patrimonio->descricao }}</td>
            <td>{{ $patrimonio->setor_atual }}</td>
            <td><center>{{ date('d-m-y H:i', strtotime($patrimonio->date_adicionado)) }}</center></td>
            <td><center>{{ date('d-m-y H:i', strtotime($patrimonio->updated_at)) }}</center></td>
        </tr>
        @endforeach

    </table> 
    @if(count($listPatrimonio) == 0)
        <p style="color: red">Não foi encontrado nenhum patrimônio.</p>
    @endif

</div>

</body>
</html>
