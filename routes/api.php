<?php

use App\Http\Controllers\InservivelController;
use Illuminate\Support\Facades\Route;

Route::get('/equipamentos/{id}', [InservivelController::class, 'show']);

