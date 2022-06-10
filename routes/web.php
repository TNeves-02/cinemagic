<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;


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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FilmeController::class, 'index'])->name('welcome.index');

Route::get('/filmes', [FilmeController::class, 'filmespag'])->name('filmes.index');

Route::get('/filme/{filme}', [FilmeController::class, 'filmepag'])->name('filmes.filme');

Route::get('/lugares/{filme}/{sessao}', [LugarController::class, 'lugares'])->name('lugares.index');

Route::get('/bilhete', [FilmeController::class, 'bilhete'])->name('bilhetes.index');

Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/perfil', [ClienteController::class, 'perfil'])->name('clientes.perfil');

Route::get('/perfil/edit', [ClienteController::class, 'editarPerfil'])->name('clientes.editar');

Route::post('/perfil/{user}', [ClienteController::class, 'update'])->name('clientes.update');

Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //filmes admin
    Route::get('filmes', [FilmeController::class, 'admin_index'])->name('filmes');

    Route::get('filmes/{filme}/edit', [FilmeController::class, 'edit'])->name('filmes.edit');

    Route::get('filmes/{filme}/view', [FilmeController::class, 'view'])->name('filmes.view');

    Route::get('filmes/create', [FilmeController::class, 'create'])->name('filmes.create');

    Route::post('filmes', [FilmeController::class, 'store'])->name('filmes.store');

    Route::put('filmes/{filme}', [FilmeController::class, 'update'])->name('filmes.update');

    Route::delete('filmes/{filme}', [FilmeController::class, 'destroy'])->name('filmes.destroy');

    Route::delete('filmes/{filme}/foto', [FilmeController::class, 'destroy_foto'])->name('filmes.foto.destroy');

    //generos admin
    Route::get('generos', [GeneroController::class, 'admin_index'])->name('generos');

    Route::get('generos/{genero}/edit', [GeneroController::class, 'edit'])->name('generos.edit');

    Route::get('generos/{genero}/view', [GeneroController::class, 'view'])->name('generos.view');

    Route::get('generos/create', [GeneroController::class, 'create'])->name('generos.create');

    Route::post('generos', [GeneroController::class, 'store'])->name('generos.store');

    Route::put('generos/{genero}', [GeneroController::class, 'update'])->name('generos.update');

    Route::delete('generos/{genero}', [GeneroController::class, 'destroy'])->name('generos.destroy');

     //salas admin
     Route::get('salas', [SalaController::class, 'admin_index'])->name('salas');

     Route::get('salas/{sala}/edit', [SalaController::class, 'edit'])->name('salas.edit');
 
     Route::get('salas/{sala}/view', [SalaController::class, 'view'])->name('salas.view');
 
     Route::get('salas/create', [SalaController::class, 'create'])->name('salas.create');
 
     Route::post('salas', [SalaController::class, 'store'])->name('salas.store');
 
     Route::put('salas/{sala}', [SalaController::class, 'update'])->name('salas.update');
 
     Route::delete('salas/{sala}', [SalaController::class, 'destroy'])->name('salas.destroy');


     //sessoes admin
     Route::get('sessoes', [SessaoController::class, 'admin_index'])->name('sessoes');

     Route::get('sessoes/{sessao}/edit', [SessaoController::class, 'edit'])->name('sessoes.edit');
 
     Route::get('sessoes/{sessao}/view', [SessaoController::class, 'view'])->name('sessoes.view');
 
     Route::get('sessoes/create', [SessaoController::class, 'create'])->name('sessoes.create');
 
     Route::post('sessoes', [SessaoController::class, 'store'])->name('sessoes.store');
 
     Route::put('sessoes/{sessao}', [SessaoController::class, 'update'])->name('sessoes.update');
 
     Route::delete('sessoes/{sessao}', [SessaoController::class, 'destroy'])->name('sessoes.destroy');

     
     //lugares admin //falta terminar
     Route::get('lugares', [LugarController::class, 'admin_index'])->name('lugares');

     Route::get('lugares/{lugar}/edit', [LugarController::class, 'edit'])->name('lugares.edit');
 
     Route::get('lugares/{lugar}/view', [LugarController::class, 'view'])->name('lugares.view');
 
     Route::get('lugares/create', [LugarController::class, 'create'])->name('lugares.create');
 
     Route::post('lugares', [LugarController::class, 'store'])->name('lugares.store');
 
     Route::put('lugares/{lugar}', [LugarController::class, 'update'])->name('lugares.update');
 
     Route::delete('lugares/{lugar}', [LugarController::class, 'destroy'])->name('lugares.destroy');

      
     //clientes admin
     Route::get('clientes', [ClienteController::class, 'admin_index'])->name('clientes');

     Route::get('clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
 
     Route::get('clientes/{cliente}/view', [ClienteController::class, 'view'])->name('clientes.view');
 
     Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
 
     Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store');
 
     Route::put('clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
 
     Route::delete('clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');



});