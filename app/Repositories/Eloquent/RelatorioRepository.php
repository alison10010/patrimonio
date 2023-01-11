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

            if($dataOne || $dataTwo) // SETANDO DATAS ESPECIFICAS
            {
                if($dataOne && !$dataTwo){ // CASO MARQUE SOMENTE 1° DATA
                    $dataTwo = date('Y-m-d 00:00:00' , strtotime($dataOne));
                }
                if(!$dataOne && $dataTwo){ // CASO MARQUE SOMENTE 2° DATA
                    $dataOne = date('Y-m-d 00:00:00' , strtotime($dataTwo));
                    $dataTwo = date('Y-m-d 00:00:00' , strtotime("+1 days", strtotime($dataOne)));
                }
            }

            if(!$num_patrimonio){  // RETORNA TODOS
                return self::allMovimentacao($dataOne, $dataTwo);
            }else{                 // RETORNA ESPECIFICO
                return self::NumMovimentacao($dataOne, $dataTwo, $num_patrimonio);
            }

        } catch (\Throwable $th) {
            return redirect('/relatorioMovimentacao')->with('error', 'Erro ao gerar relatório, Tente novamente mais tarde!');
        }     
    }

    // RETORNA TODAS AS SAIDAS
    function allMovimentacao($dataOne, $dataTwo)
    {
        if(!$dataOne){
            $listMovimentacao = HistoricoPatrimonio::orderBy('id', 'DESC')->get(); // LISTA DE Patrimonios
            $periodo = 'Saída de Materiais sem período definido';
        }else{
            $dataTwoF = date('Y-m-d 00:00:00' , strtotime("+1 days", strtotime($dataTwo)));
            $listMovimentacao = HistoricoPatrimonio::where([['created_at', '>', $dataOne]])
                                                    ->where('created_at', '<', $dataTwoF)
                                                    ->orderBy('id', 'DESC')->get();

            // FORMATA BR
            $dataOne = date('d/m/Y' , strtotime($dataOne));
            $dataTwo = date('d/m/Y' , strtotime($dataTwo));

            $periodo = 'Saída de Materiais no Período de '.$dataOne.' a '.$dataTwo;
        }

        $totalGeral = $listMovimentacao->count();                                    
        return (['listMovimentacao' => $listMovimentacao, 'periodo' => $periodo, 'totalGeral' => $totalGeral]);
    }

    // METODO DE BUSCAR PELO ID
    public function NumMovimentacao($dataOne, $dataTwo, $num_patrimonio)
    {
        try {
            $idPatrimonio = Patrimonio::where('num_patrimonio', $num_patrimonio)->select('id')->first()->id; // PEGA PATRIMONIO
        } catch (\Throwable $th) {
            $listMovimentacao = null;
            return $listMovimentacao;
        }

        if(!$dataOne){
            $listMovimentacao = HistoricoPatrimonio::where('patrimonio_id', '=', $idPatrimonio)->orderBy('id', 'DESC')->get();
            $periodo = 'Saída de Materiais sem período definido';

        }else{
            $dataTwoF = date('Y-m-d 00:00:00' , strtotime("+1 days", strtotime($dataTwo)));
            $listMovimentacao = HistoricoPatrimonio::where([['created_at', '>', $dataOne]])
                                                    ->where('created_at', '<', $dataTwoF)
                                                    ->where('patrimonio_id', '=', $idPatrimonio)
                                                    ->orderBy('id', 'DESC')->get();

            // FORMATA BR
            $dataOne = date('d/m/Y' , strtotime($dataOne));
            $dataTwo = date('d/m/Y' , strtotime($dataTwo));

            $periodo = 'Saída de Materiais no Período de '.$dataOne.' a '.$dataTwo;
        }

        $totalGeral = $listMovimentacao->count();
        return (['listMovimentacao' => $listMovimentacao, 'periodo' => $periodo, 'totalGeral' => $totalGeral]);

    }    

}