<?php

use App\Http\Controllers\InservivelController;
use Illuminate\Support\Facades\Route;

Route::get('/equipamentos/{id}', [InservivelController::class, 'show']);
Route::put('/equipamentos/{id}/devolver', [InservivelController::class, 'devolver']);


