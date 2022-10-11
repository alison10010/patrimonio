<?php

namespace App\Repositories\Eloquent;

use App\Models\Patrimonio;

use App\Models\HistoricoPatrimonio;


class RelatorioRepository extends AbstractRepository{

    protected $model = Patrimonio::class;  // PASSA A VARIAVEL $model PARA AbstractRepository

    // RELATORIO DE PATRIMONO
    public function relatorioPatrimonio()
    {
        try {
            $dataOne = request('dataOne');
            $dataTwo = request('dataTwo');

            $dataTwoF = date('Y-m-d 00:00:00' , strtotime("+1 days", strtotime($dataTwo)));

            if(!$dataOne && !$dataTwo){
                $listPatrimonio = Patrimonio::orderBy('num_patrimonio', 'DESC')->get(); // LISTA DE Patrimonios
                return  $listPatrimonio;
            }

            if($dataOne || $dataTwo){ // RETORNA DATAS EPECIFICAS

                if($dataOne && !$dataTwo){ // CASO MARQUE SOMENTE 1° DATA
                    $dataTwoF = date('Y-m-d 00:00:00' , strtotime("+1 days", strtotime($dataOne)));
                }
                
                $listPatrimonio = Patrimonio::where([['date_adicionado', '>', $dataOne]])
                                        ->where('date_adicionado', '<', $dataTwoF)
                                        ->orderBy('num_patrimonio', 'DESC')->get();
    
                return  $listPatrimonio;
            }
        } catch (\Throwable $th) {
            return redirect('/addPatrimonio')->with('error', 'Erro ao gerar relatório, Tente novamente mais tarde!');
        }     
    }

    // RELATORIO DE MOVIMENTACAO
    public function relatorioMovimentacao()
    {
        try {
            $num_patrimonio = request('num_patrimonio'); 
            $dataOne = request('dataOne');
            $dataTwo = request('dataTwo');

            $dataTwoF = date('Y-m-d 00:00:00' , strtotime("+1 days", strtotime($dataTwo)));

            if(!$num_patrimonio){ // VERIFICA PESQUISA POR NUMERO DE PATRIMONIO
                if(!$dataOne && !$dataTwo){
                    $listMovimentacao = HistoricoPatrimonio::orderBy('id', 'DESC')->get(); // LISTA DE Patrimonios
                    return  $listMovimentacao;
                }    
                if($dataOne || $dataTwo){ // RETORNA DATAS EPECIFICAS    
                    if($dataOne && !$dataTwo){ // CASO MARQUE SOMENTE 1° DATA
                        $dataTwoF = date('Y-m-d 00:00:00' , strtotime("+1 days", strtotime($dataOne)));
                    }
                    if(!$dataOne && $dataTwo){ // CASO MARQUE SOMENTE 2° DATA
                        $dataOne = date('Y-m-d 00:00:00' , strtotime("-1 days", strtotime($dataTwo)));
                    }
                    $listMovimentacao = HistoricoPatrimonio::where([['created_at', '>', $dataOne]])
                                            ->where('created_at', '<', $dataTwoF)
                                            ->orderBy('id', 'DESC')->get();
                    return  $listMovimentacao;
                }
            }

            if($num_patrimonio){ // VERIFICA PESQUISA POR NUMERO DE PATRIMONIO   

                try {
                    $idPatrimonio = Patrimonio::where('num_patrimonio', $num_patrimonio)->select('id')->first()->id; // PEGA PATRIMONIO
                } catch (\Throwable $th) {
                    $listPatrimonio = null;
                    return $listPatrimonio;
                }            

                if(!$dataOne && !$dataTwo){

                    $listPatrimonio = HistoricoPatrimonio::where('patrimonio_id', '=', $idPatrimonio)->orderBy('id', 'DESC')->get(); 

                    return  $listPatrimonio;
                }

                if($dataOne || $dataTwo){ // RETORNA DATAS EPECIFICAS    
                    if($dataOne && !$dataTwo){ // CASO MARQUE SOMENTE 1° DATA
                        $dataTwoF = date('Y-m-d 00:00:00' , strtotime("+1 days", strtotime($dataOne)));
                    }
                    if(!$dataOne && $dataTwo){ // CASO MARQUE SOMENTE 2° DATA
                        $dataOne = date('Y-m-d 00:00:00' , strtotime("-1 days", strtotime($dataTwo)));
                    }
                    $listMovimentacao = HistoricoPatrimonio::where([['created_at', '>', $dataOne]])
                                            ->where('created_at', '<', $dataTwoF)
                                            ->where('patrimonio_id', '=', $idPatrimonio)
                                            ->orderBy('id', 'DESC')->get();
                    return  $listMovimentacao;
                }
                
            }            

        } catch (\Throwable $th) {
            return redirect('/relatorioMovimentacao')->with('error', 'Erro ao gerar relatório, Tente novamente mais tarde!');
        }     
    }

    

}