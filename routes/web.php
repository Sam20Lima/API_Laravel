<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Person\PersonController;

Route::get('Todos', [PersonController::class, 'allData']);
Route::get('Nomes', [PersonController::class, 'allNames']);
Route::get('Quantidade', [PersonController::class, 'allRecords']);
Route::get('Dominios', [PersonController::class, 'emailDomains']);
Route::get('Usuario', [PersonController::class, 'personData']);
Route::get('Status', [PersonController::class, 'status']);
