<?php

use App\Http\Controllers\AtendimentoEscolasController;
use App\Http\Controllers\AtendimentoInternoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EstanteController;
use App\Http\Controllers\GraficosController;
use App\Http\Controllers\InservivelController;
use App\Http\Controllers\LoginController;
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

Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::post('/login/store', [LoginController::class, 'store'])->name('login.store');

Route::get('/teste', [LoginController::class, 'teste'])->name('teste.ajax');

Route::middleware(['auth'])->group(function () {

    Route::prefix('/dashboard')->group(function () {
        Route::get('/index', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::prefix('/atendimento-escola')->group(function () {
        Route::get('/index', [AtendimentoEscolasController::class, 'index'])->name('atendimento.escola');
    });

    Route::prefix('/protocolo-entrada')->group(function () {
        Route::get('/index', [ProtocoloEntradaController::class, 'index'])->name('index.protocolo');
        Route::get('/create', [ProtocoloEntradaController::class, 'create'])->name('create.protocolo');
    });

    Route::prefix('/atendimento-interno')->group(function () {
        Route::get('/index', [AtendimentoInternoController::class, 'index'])->name('atendimento-interno.index');
        Route::get('/create', [AtendimentoInternoController::class, 'create'])->name('atendimento-interno.create');
    });
    Route::prefix('/estante')->group(function () {
        Route::get('/index', [EstanteController::class, 'index'])->name('estante.index');
        Route::get('/equipamentos', [EstanteController::class, 'status'])->name('estante.equipamentos');
        Route::get('/pesquisa', [EstanteController::class, 'pesquisa']);
        Route::post('/filtros', [EstanteController::class, 'filtros']);
        Route::get('/show/{id}', [EstanteController::class, 'show']);
        Route::post('/passar', [EstanteController::class, 'passar']);
        Route::get('/create', [EstanteController::class, 'create'])->name('estante.create');
        Route::get('/pdf/{id}', [EstanteController::class, 'pdf'])->name('estante.pdf');
    });
    Route::prefix('/inservivel')->group(function () {
        Route::get('/index', [InservivelController::class, 'index'])->name('inservivel.index');
        Route::get('/create', [InservivelController::class, 'create'])->name('inservivel.create');
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
        Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
    });
});
