<?php

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

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('usuario','App\Http\Controllers\UsuarioController')->middleware('permission:usuarios_listar');
Route::resource('marca','App\Http\Controllers\MarcaControlador')->middleware('permission:marcas_listar');
Route::resource('modelo','App\Http\Controllers\ModeloControlador')->middleware('permission:modelos_listar');

Route::get('grafico','App\Http\Controllers\ModeloControlador@grafico')->middleware('permission:marcas_grafica');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
