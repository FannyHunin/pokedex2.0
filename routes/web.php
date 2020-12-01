<?php

use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PokemonController::class, 'index']);
Route::get('/createPkmn', [PokemonController::class, 'create']);
Route::post('/storePkmn', [PokemonController::class, 'store']);
Route::get('/showPkmn/{id}', [PokemonController::class, 'show']);
Route::get('deletePkmn/{id}', [PokemonController::class, 'destroy']);
Route::get('/editPkmn/{id}', [PokemonController::class, 'edit']);
Route::post('/updatePkmn/{id}', [PokemonController::class, 'update']);

Route::get('/createType', [TypeController::class, 'create']);
Route::post('/storeType', [TypeController::class, 'store']);
Route::get('/editType/{id}', [TypeController::class, 'edit']);
Route::get('/deleteType/{id}', [TypeController::class, 'destroy']);
Route::post('/updateType/{id}', [TypeController::class, 'update']);