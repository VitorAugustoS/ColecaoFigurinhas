<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubeController;
use App\Http\Controllers\PosicaoController;
use App\Http\Controllers\JogadorController;

Route::Resources([
	"clube" => ClubeController::class,
	"posicao" => PosicaoController::class,
	"jogador" => JogadorController::class
]);

Route::get('/', function () {
    return view('welcome');
});
