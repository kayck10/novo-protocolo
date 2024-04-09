<?php

use App\Http\Controllers\AtendimentoEscolasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProtocoloEntradaController;
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

Route::prefix('/dashboard')->group(function(){
    Route::get('/index', [DashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('/atendimento-escola')->group(function(){
    Route::get('/index', [AtendimentoEscolasController::class, 'index'])->name('atendimento.escola');
});

Route::prefix('/protocolo-entrada')->group(function(){
    Route::get('/index', [ProtocoloEntradaController::class, 'index'])->name('index.protocolo');
    Route::get('/create', [ProtocoloEntradaController::class, 'create'])->name('create.protocolo');
});


