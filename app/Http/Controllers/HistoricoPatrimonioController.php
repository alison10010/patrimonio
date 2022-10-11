<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HistoricoPatrimonio;

use App\Repositories\Eloquent\HistoricoPatrimonioRepository;  // REGRAS DE NEGOCIOS

class HistoricoPatrimonioController extends Controller
{
    //

    // RETORNA LISTA DE MOVIMENTACAO
    public function dashboard(HistoricoPatrimonioRepository $model)
    {
        $listMivimentacao = $model->listMivimentacao();

        //dd($listMivimentacao);
        return view('dashboard', ['listMivimentacao' => $listMivimentacao]); 

    }

    // SALVA MOVIMENTACAO
    public function storeMovimentacao(Request $request, HistoricoPatrimonioRepository $model) 
    {
        try {
            $data = $request->all();      
            $user = auth()->user();

            $data['user_id'] = $user->id;

            $model->novoLocalPatrimonio($data); // SALVA NOVO LOCAL DO PATRIMONIO

            $model->store($data); // SALVA

            return redirect('/dashboard')->with('msg', 'Movido com sucesso!');
        } catch (\Throwable $th) {
            return redirect('/')->with('error', 'Erro ao Mover, tente novamente mais tarde!');
        }
            
    }

}
