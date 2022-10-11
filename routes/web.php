<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PatrimonioController;

use App\Http\Controllers\HistoricoPatrimonioController;

use App\Http\Controllers\FuncionarioController;

use App\Http\Controllers\RelatorioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {  // PAGINA PARA CRIAR UM EVENTO PRECISA TÁ LOGADO
    
    // PATRIMONIO

    Route::get('/', [HistoricoPatrimonioController::class, 'dashboard'])->name('dashboard'); // PAGE DE BUSCA PATRIMONIO
    
    Route::get('/dashboard', [HistoricoPatrimonioController::class, 'dashboard'])->name('dashboard'); // PAGE DE BUSCA PATRIMONIO

    Route::post('/addPatrimonio', [PatrimonioController::class, 'store'])->name('patrimonio.store'); // SALVA NOVO PATRIMONIO

    Route::get('/addPatrimonio', [PatrimonioController::class, 'create'])->name('patrimonio.create'); // PAGE DE CAD.

    Route::post('/movimentacao', [HistoricoPatrimonioController::class, 'storeMovimentacao'])->name('patrimonio.storeMovimentacao'); // SALVA NOVO PATRIMONIO

    Route::get('/localizar', [PatrimonioController::class, 'localizar'])->name('patrimonio.localizar'); // PAGE DE BUSCA PATRIMONIO

    Route::post('/localizar', [PatrimonioController::class, 'show'])->name('patrimonio.show'); // LISTA PATRIMONIO NA PAGE

    Route::get('/localizar/{id?}', [PatrimonioController::class, 'mover'])->name('patrimonio.mover'); // PAGE DE MOVER PATRIMONIO

    // RELATORIO

    Route::get('/relatorio', [RelatorioController::class, 'dashboard'])->name('relatorio.dashboard'); // PAGE DE CAD.

    Route::get('/relatorioPatrimonio', [RelatorioController::class, 'relatorioPatrimonio'])->name('relatorio.relatorioPatrimonio'); // PAGE DE CAD.

    Route::get('/relatorioPDF/{dataOne?}{dataTwo?}', [RelatorioController::class, 'geraRelatorio'])->name('relatorioPDF');

    Route::get('/relatorioMovimentacao', [RelatorioController::class, 'relatorioMovimentacao'])->name('relatorio.relatorioMovimentacao'); // PAGE DE CAD.

    Route::get('/relatorioPDFMovimentacao/{num_patrimonio?}{dataOne?}{dataTwo?}', [RelatorioController::class, 'geraRelatorioMovimentacao'])->name('relatorioMovimentacao');
});



require __DIR__.'/auth.php';
