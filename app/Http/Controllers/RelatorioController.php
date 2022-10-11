<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Patrimonio;

use App\Repositories\Eloquent\RelatorioRepository;  // REGRAS DE NEGOCIOS

use PDF;

class RelatorioController extends Controller
{
    public function dashboard()
    {
        return view('relatorio.dashboard'); 
    }

    public function relatorioPatrimonio()
    {
        return view('relatorio.relatorioPatrimonio'); 
    }

    public function relatorioMovimentacao()
    {
        return view('relatorio.relatorioMovimentacao'); 
    }

    // GERA RELATORIO EM PDF
    public function geraRelatorio(RelatorioRepository $model) 
    {
        $listPatrimonio = $model->relatorioPatrimonio();   
        $pdf = PDF::loadView('relatorio.relatorioPDF', compact('listPatrimonio'));
        return  $pdf->setPaper('a4', 'landscape')->stream('Relatorio_Patrimonio.pdf');        
    }

    // GERA RELATORIO EM PDF DAS MOVIMENTACOES
    public function geraRelatorioMovimentacao(RelatorioRepository $model) 
    {
        $listMovimentacao = $model->relatorioMovimentacao();   
        $pdf = PDF::loadView('relatorio.relatorioPDFMovimentacao', compact('listMovimentacao'));
        return  $pdf->setPaper('a4', 'landscape')->stream('Relatorio_Movimentacao.pdf');        
    }

} 
