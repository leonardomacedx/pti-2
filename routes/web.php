<?php

use App\Http\Controllers\consultaAssinaturaController;
use App\Http\Controllers\pacienteController;
use App\Http\Controllers\recursoController;
use App\Http\Controllers\atendimentoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\inscricaoController;
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

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::get('/cadastro-usuario', [RegisteredUserController::class, 'create'])->name('cadastro-usuario');
Route::post('/cadastro-usuario/salvar', [RegisteredUserController::class, 'store'])->name('salvar-usuario');
Route::post('/logar', [AuthenticatedSessionController::class, 'store'])->name('logar');
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/inicio', [atendimentoController::class, 'index'])->name('inicio');
Route::get('/cadastro-paciente', [pacienteController::class, 'create'])->name('cadastro-paciente');
Route::post('/salvar-paciente', [pacienteController::class, 'store'])->name('salvar-paciente');
Route::get('/editar-usuario', [AuthenticatedSessionController::class, 'edit'])->name('edit-senha');
Route::put('/editar-usuario/salvar', [AuthenticatedSessionController::class, 'update'])->name('update-senha');

Route::get('/cadastro-atendimento', [atendimentoController::class, 'create'])->name('cadastro-atendimento');
Route::post('/salvar-atendimento', [atendimentoController::class, 'store'])->name('salvar-atendimento');
Route::delete('/atendimentos/{id}', [atendimentoController::class, 'destroy'])->name('atendimentos.destroy');

Route::middleware(['auth'])->group(function () {


    //Rotas de edição de cadastro

});
