<?php

namespace App\Repositories\Eloquent;

use App\Models\HistoricoPatrimonio;

use App\Models\Patrimonio;


class HistoricoPatrimonioRepository extends AbstractRepository{

    protected $model = HistoricoPatrimonio::class;  // PASSA A VARIAVEL $model PARA AbstractRepository

    public function listMivimentacao()
    {
        $listMivimentacao = HistoricoPatrimonio::orderBy('id', 'desc')->take(10)->get(); // PEGA OS 10 1°

        return ['listMivimentacao' => $listMivimentacao];
    }

    // HISTORICO DE MOVIMENTACOES POR ID
    public function historico($id)
    {
        $historico = HistoricoPatrimonio::where('patrimonio_id', '=', $id)
        ->orderBy('id', 'DESC')->get();

        return ['historico' => $historico];
    }

    // ATUALIZA SETOR DO PATRIMONIO 
    public function novoLocalPatrimonio(array $data)
    { 
        $idPatrimonio = $data["patrimonio_id"];

        $to = $data["to"];

        return Patrimonio::find($idPatrimonio)->update(["setor_atual" => $to]);
    }

}