<?php

use App\Http\Controllers\AtendimentoEscolasController;
use App\Http\Controllers\AtendimentoInternoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\EstanteController;
use App\Http\Controllers\GraficosController;
use App\Http\Controllers\InservivelController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProtocoloEntradaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    Route::prefix('/dashboard')->group(function () {
        Route::get('/index', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::prefix('/atendimento-escola')->group(function () {
        Route::get('/index', [AtendimentoEscolasController::class, 'index'])->name('atendimento.escola');
        Route::post('/store', [AtendimentoEscolasController::class, 'store'])->name('atendimento.store');
        Route::post('/finalize', [AtendimentoEscolasController::class, 'finalize'])->name('atendimento.finalize');
        Route::post('/delete', [AtendimentoEscolasController::class, 'delete'])->name('atendimento.delete');
    });

    Route::prefix('/protocolo-entrada')->group(function () {
        Route::get('/index', [ProtocoloEntradaController::class, 'index'])->name('index.protocolo');
        Route::get('/show/{id}', [ProtocoloEntradaController::class, 'getProtocolo'])->name('getProtocolo');
        Route::get('/create', [ProtocoloEntradaController::class, 'create'])->name('create.protocolo');
        Route::post('/store', [ProtocoloEntradaController::class, 'store'])->name('protocolo.store');
        Route::post('store/equipamento', [ProtocoloEntradaController::class, 'equipamentos'])->name('store.equipamento');
        Route::put('/update/{id}', [ProtocoloEntradaController::class, 'update'])->name('protocolo.update');
        Route::patch('/devolver/{id}', [ProtocoloEntradaController::class, 'devolver'])->name('equipamentos.devolver');
        Route::delete('/destroy/{id}', [ProtocoloEntradaController::class, 'destroy'])->name('protocolo.destroy');
        Route::delete('/equipamento/destroy/{id}', [ProtocoloEntradaController::class, 'destroyEquipamento'])->name('equipamento.destroy');
        Route::post('/gerar-pdf-segundo', [PdfController::class, 'gerarprotocoloPDF'])->name('gerar.protocolo.pdf');
        Route::post('/gerar-pdf', [PdfController::class, 'indexProtocolo'])->name('indexProtocolo.pdf');
    });

    Route::prefix('/equipamento')->group(function () {
        Route::get('/create', [EquipamentoController::class, 'create'])->name('create.equipamento');
        Route::post('/store', [EquipamentoController::class, 'store'])->name('store.tipoequipamento');
        Route::get('/lista', [EquipamentoController::class, 'index'])->name('lista.tipoequipamento');
        Route::get('/{id}/edit', [EquipamentoController::class, 'edit'])->name('equipamentos.edit');
        Route::put('/{id}', [EquipamentoController::class, 'update'])->name('equipamentos.update');
        Route::delete('/{id}', [EquipamentoController::class, 'destroy'])->name('equipamentos.delete');
        Route::get('/historico', [EquipamentoController::class, 'historico'])->name('historico');

    });

    Route::prefix('/atendimento-interno')->group(function () {
        Route::get('/index', [AtendimentoInternoController::class, 'index'])->name('atendimento-interno.index');
        Route::get('/create', [AtendimentoInternoController::class, 'create'])->name('atendimento-interno.create');
        Route::post('/store', [AtendimentoInternoController::class, 'store'])->name('atendimentointerno.store');
        Route::get('/show/{id}', [AtendimentoInternoController::class, 'show'])->name('atendimentointerno.show');
        Route::get('/edit/{id}', [AtendimentoInternoController::class, 'edit'])->name('atendimento-interno.edit');
        Route::put('/update/{id}', [AtendimentoInternoController::class, 'update'])->name('atendimento-interno.update');
        Route::delete('/delete/{id}', [AtendimentoInternoController::class, 'delete'])->name('atendimento-interno.delete');
    });
    Route::prefix('/estante')->group(function () {
        Route::get('/index', [EstanteController::class, 'index'])->name('estante.index');
        Route::get('/equipamentos', [EstanteController::class, 'status'])->name('estante.equipamentos');
        Route::get('/pesquisar-tombamento', [EstanteController::class, 'pesquisarPorTombamento'])->name('estante.pesquisarTombamento');
        Route::get('/show/{id}', [EstanteController::class, 'show']);
        Route::get('/status', [EstanteController::class, 'getStatus'])->name('estante.status');
        Route::get('/status/modal', [EstanteController::class, 'getStatusModal'])->name('estante.status.modal');
        Route::post('/passar', [EstanteController::class, 'passar'])->name('estante.passar');
        // Route::post('/saida', [EstanteController::class, 'saida'])->name('estante.saida');
        Route::post('/retornar', [EstanteController::class, 'retornar'])->name('estante.retornar');
        Route::post('/retirar', [EstanteController::class, 'retirar'])->name('estante.retirar');
        Route::post('/inservivel', [EstanteController::class, 'inservivel'])->name('estante.inservivel');
        Route::get('/create', [EstanteController::class, 'create'])->name('estante.create');
        Route::get('/pdf/{id}', [EstanteController::class, 'pdf'])->name('estante.pdf');
    });


    Route::prefix('/inservivel')->group(function () {
        Route::get('/index', [InservivelController::class, 'index'])->name('inservivel.index');
        Route::get('/create', [InservivelController::class, 'create'])->name('inservivel.create');
        Route::post('/store', [InservivelController::class, 'store'])->name('inservivel.store');
        Route::post('/devolver', [InservivelController::class, 'devolver'])->name('inservivel.devolver');
        Route::patch('/devolver/{id}', [InservivelController::class, 'atualizar'])->name('inservivel.atualizar');
        Route::post('/gerar-pdf', [PdfController::class, 'gerarPDF'])->name('gerar.pdf');
        Route::post('/pdf-inservivel', [PdfController::class, 'pdfInservivel'])->name('pdf.inservivel');
        Route::post('/verificar', [PdfController::class, 'verificarId'])->name('verificar');
    });

    Route::prefix('/graficos')->group(function () {
        Route::get('/anual', [GraficosController::class, 'anual'])->name('graficos.anual');
        Route::get('/participacoes', [GraficosController::class, 'participacoes'])->name('graficos.participacoes');
        Route::post('/store', [GraficosController::class, 'store'])->name('graficos.store');
        Route::get('/inserviveis', [GraficosController::class, 'inserviveis'])->name('graficos.inserviveis');
    });
    Route::prefix('/usuarios')->group(function () {
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/index', [UserController::class, 'index'])->name('user.index');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::post('/reset-password/{id}', [UserController::class, 'resetPassword'])->name('user.reset.password');
        Route::put('/atualizar/{id}', [UserController::class, 'atualizarUsuario'])->name('user.atualizar');
    });
    Route::prefix('/local')->group(function () {
        Route::get('/create', [LocalController::class, 'create'])->name('local.create');
    });
});
