<?php

namespace App\Http\Controllers;

use App\Models\Patrimonio;

use Illuminate\Http\Request;

use App\Http\Requests\validaPatrimonio; // VALIDA OS CAMPOS

use App\Repositories\Eloquent\PatrimonioRepository;  // REGRAS DE NEGOCIOS

use App\Repositories\Eloquent\HistoricoPatrimonioRepository;  // REGRAS DE NEGOCIOS

class PatrimonioController extends Controller
{

    public function create()
    {
        return view('patrimonio.adicionar');
    }

    // SALVO NO BD
    public function store(validaPatrimonio $request, PatrimonioRepository $model)  
    {
        try {
            $data = $request->all();
            $data['date_adicionado'] = date('Y-m-d H:i:s');
            
            $user = auth()->user();
            $data['user_id'] = $user->id;

            $model->store($data); // SALVA

            return redirect('/addPatrimonio')->with('msg', 'Patromônio cadastrado com sucesso!');
        } catch (\Throwable $th) {
            return redirect('/addPatrimonio')->with('error', 'Erro ao cadastrar patrimônio, verifique se o mesmo já está cadastro!');
        }       

    }

    public function localizar()
    {
        return view('patrimonio.localizar');
    }

    // BUSCA PATRIMONIO VIA NUMERO PATRIMONIO
    public function show(Request $request, PatrimonioRepository $model)
    {
        try {
            $patrimonio = $model->patrimonio($request->num_patrimonio);

            $historico = HistoricoPatrimonioRepository::historico($patrimonio[0]->id);
    
            return view('patrimonio.localizar', ['lista' => $patrimonio, 'historico' => $historico]);
        } catch (\Throwable $th) {
            return redirect('/localizar')->with('error', 'Patrimônio não encontrado!');
        }
        
    }

    // BUSCA PATRIMONIO VIA ID PARA MOVER
    public function mover(PatrimonioRepository $model)
    {
        try {

            $id = request('id'); // PARAMETRO URL

            $patrimonio = $model->getById($id);

            if(!$patrimonio){
                return redirect('/localizar')->with('error', 'Verifique o patrimônio e tente novamente!');
            }

            return view('patrimonio.movimentacao', ['patrimonio' => $patrimonio]);
        } catch (\Throwable $th) {
            return redirect('/localizar')->with('error', 'Verifique o patrimônio e tente novamente!');
        } 

    }

}
