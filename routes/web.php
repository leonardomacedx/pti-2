<?php

use App\Http\Controllers\consultaAssinaturaController;
use App\Http\Controllers\recursoController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/inicio', [inscricaoController::class, 'inicio'])->name('inicio');
    Route::get('/buscainscricoes', [inscricaoController::class, 'listarRequerimentoPorUsuario'])->name('busca');

    //Rotas de requerimento
    Route::get('/cadastro-requerimento', [inscricaoController::class, 'index'])->name('cadastro-requerimento');
    Route::post('/requerimento/visualizar', [inscricaoController::class, 'show'])->name('ver-requerimento');
    Route::get('/abrir-docs/{id}/{doc}', [inscricaoController::class, 'abrirDocs'])->name('abrir-docs');
    Route::post('/requerimento/editar', [inscricaoController::class, 'edit'])->name('editar-requerimento');
    Route::put('/requerimento/update', [inscricaoController::class, 'update'])->name('update-requerimento');
    Route::post('/salvar-requerimento', [inscricaoController::class, 'store'])->name('salvar-requerimento');
    Route::get('/modelodeclaracao', [inscricaoController::class, 'carta'])->name('/modelodeclaracao');
    Route::post('/requerimento/protocolo', [inscricaoController::class, 'downloadProtocolo'])->name('baixar-protocolo');
    //Route::post('/requerimento/parecer', [inscricaoController::class, 'downloadRequerimento'])->name('baixar-requerimento');

    //Rotas de edição de cadastro
    Route::get('/editar-usuario', [AuthenticatedSessionController::class, 'edit'])->name('edit-senha');
    Route::put('/editar-usuario/salvar', [AuthenticatedSessionController::class, 'update'])->name('update-senha');

    //Rotas de recurso
    Route::post('/recurso', [recursoController::class, 'index'])->name('recurso');
    Route::post('/recurso/salvar', [recursoController::class, 'store'])->name('salvar-recurso');
    Route::post('/recurso/visualizar', [recursoController::class, 'show'])->name('visualizar-recurso');
    //Route::post('/recurso/parecer', [recursoController::class, 'downloadRecurso'])->name('baixar-recurso');
});
