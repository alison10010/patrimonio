<?php

namespace App\Repositories\Eloquent;

use App\Models\Patrimonio;


class PatrimonioRepository extends AbstractRepository{

    protected $model = Patrimonio::class;  // PASSA A VARIAVEL $model PARA AbstractRepository

    // BUSCA POR PATRIMONIO 
    public function patrimonio($num_patrimonio) 
    { 
        $listChamado = Patrimonio::where([['num_patrimonio', '=', $num_patrimonio]])->orderBy('id', 'DESC')->get();
        return $listChamado;
    }

}