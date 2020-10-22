<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OrcamentoController;
use App\Http\Controllers\Admin\ServicoController;
use App\Http\Controllers\Admin\MateriaisController;
use App\Http\Controllers\Admin\ClienteController;
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

//Route::get('/', function () {
    //return view('welcome');
//});

Route::redirect('/', '/admin/servicos');
Route::redirect('/', '/admin/orcamentos');


Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('servicos', [ServicoController::class,'servicos'])->name('servicos.listar');
    Route::get('servicos/adicionar', [ServicoController::class,'formAdicionar'])->name('servicos.form');
    Route::post('servicos/adicionar', [ServicoController::class,'Adicionar'])->name('servicos.adicionar');
    Route::delete('servicos/{id}', [ServicoController::class,'deletar'])->name('servicos.deletar');
    Route::get('servicos/{id}', [ServicoController::class, 'formEditar'])->name('servicos.formEditar');
    Route::put('servicos/{id}', [ServicoController::class, 'editar'])->name('servicos.editar');



    Route::get('materiais', [MateriaisController::class,'materiais'])->name('materiais.listar');
    Route::get('materiais/adicionar', [MateriaisController::class,'formAdicionar'])->name('materiais.form');
    Route::post('materiais/adicionar', [MateriaisController::class,'Adicionar'])->name('materiais.adicionar');
    Route::delete('materiais/{id}', [MateriaisController::class,'deletar'])->name('materiais.deletar');
    Route::get('materiais/{id}', [MateriaisController::class, 'formEditar'])->name('materiais.formEditar');
    Route::put('materiais/{id}', [MateriaisController::class, 'editar'])->name('materiais.editar');

    Route::get('orcamentos', [OrcamentoController::class,'orcamentos'])->name('orcamentos.listar');
    Route::get('orcamentos/adicionar', [OrcamentoController::class,'formAdicionar'])->name('orcamentos.form');
    Route::post('orcamentos/adicionar', [OrcamentoController::class,'Adicionar'])->name('orcamentos.adicionar');
    Route::delete('orcamentos/{id}', [OrcamentoController::class,'deletar'])->name('orcamentos.deletar');
    Route::get('orcamentos/{id}', [OrcamentoController::class, 'formEditar'])->name('orcamentos.formEditar');
    Route::put('orcamentos/{id}', [OrcamentoController::class, 'editar'])->name('orcamentos.editar');

    Route::get('clientes', [ClienteController::class,'clientes'])->name('clientes.listar');
    Route::get('clientes/adicionar', [ClienteController::class,'formAdicionar'])->name('clientes.form');
    Route::post('clientes/adicionar', [ClienteController::class,'Adicionar'])->name('clientes.adicionar');
    Route::delete('clientes/{id}', [ClienteController::class,'deletar'])->name('clientes.deletar');
    Route::get('clientes/{id}', [ClienteController::class, 'formEditar'])->name('clientes.formEditar');
    Route::put('clientes/{id}', [ClienteController::class, 'editar'])->name('clientes.editar');
});


//Route::get('admin/materiais', [MateriaisController::class,'materiais']);
//Route::get('/', function () {
    //return view('materiais');
//});

Route::get('/sobre', function () {
    return '<h1>Sobre</h1>';
});
