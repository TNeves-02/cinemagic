<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BilheteController;
use App\Http\Controllers\ReciboController;
use App\Http\Controllers\PdfController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [FilmeController::class, 'index'])->name('welcome.index');

Route::get('/filmes', [FilmeController::class, 'filmespag'])->name('filmes.index');

Route::get('/filme/{filme}', [FilmeController::class, 'filmepag'])->name('filmes.filme');

Route::get('/lugares/{filme}/{sessao}', [LugarController::class, 'lugares'])->name('lugares.index');

Route::get('/historico', [ReciboController::class, 'index'])->name('recibos.index');

Route::get('/historico/{recibo}', [ReciboController::class, 'historico'])->name('historico.recibo')->middleware('can:view,recibo');

Route::get('/perfil', [ClienteController::class, 'perfil'])->name('clientes.perfil');

Route::get('/perfil/edit', [ClienteController::class, 'editarPerfil'])->name('clientes.editar');

Route::put('/perfil/{user}', [ClienteController::class, 'update'])->name('clientes.update');

Route::get('gerarpdf/{recibo}', [CarrinhoController::class, 'gerarPdf'])->name('pdf.index');

Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');

Route::delete('carrinho/{sessao}', [CarrinhoController::class, 'destroy_carrinho_linha'])->name('carrinho.destroy_linha');

Route::delete('carrinho', [CarrinhoController::class, 'destroy'])->name('carrinho.destroy');

//confirmação de carrinho e compra de carrinho necessitam de login
Route::middleware('auth')->group(function () {

    Route::post('carrinho/{filme}/{sessao}', [CarrinhoController::class, 'store_compra'])->name('carrinho.store.compra');

    Route::post('carrinho', [CarrinhoController::class, 'store_carrinho'])->name('carrinho.store.carrinho');

    Route::get('/pagamento', [CarrinhoController::class, 'finalizar'])->name('pagamento.finalizar');

    Route::get('/pagamento/finalizar', [CarrinhoController::class, 'recibo'])->name('pagamento.recibo');

});

//Parte de administração
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::group(['middleware' => 'App\Http\Middleware\AdmininstrationMiddleware'], function()
    {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        //filmes admin
        Route::get('filmes', [FilmeController::class, 'admin_index'])->name('filmes');

        Route::get('filmes/{filme}/view', [FilmeController::class, 'view'])->name('filmes.view');

        Route::get('filmes/create', [FilmeController::class, 'create'])->name('filmes.create')->middleware('can:create,App\Models\Filme');

        Route::post('filmes', [FilmeController::class, 'store'])->name('filmes.store')->middleware('can:create,App\Models\Filme');

        Route::get('filmes/{filme}/edit', [FilmeController::class, 'edit'])->name('filmes.edit')->middleware('can:update,filme');
        
        Route::put('filmes/{filme}', [FilmeController::class, 'update'])->name('filmes.update')->middleware('can:update, App\Models\Filme');

        Route::delete('filmes/{filme}', [FilmeController::class, 'destroy'])->name('filmes.destroy')->middleware('can:delete,filme');

        Route::delete('filmes/{filme}/foto', [FilmeController::class, 'destroy_foto'])->name('filmes.foto.destroy')->middleware('can:delete,filme');

        //generos admin
        Route::get('generos', [GeneroController::class, 'admin_index'])->name('generos');

        Route::get('generos/{genero}/view', [GeneroController::class, 'view'])->name('generos.view');

        Route::get('generos/create', [GeneroController::class, 'create'])->name('generos.create')->middleware('can:create,App\Models\Genero');
        
        Route::post('generos', [GeneroController::class, 'store'])->name('generos.store')->middleware('can:create,App\Models\Genero');

        Route::get('generos/{genero}/edit', [GeneroController::class, 'edit'])->name('generos.edit')->middleware('can:update,genero');

        Route::put('generos/{genero}', [GeneroController::class, 'update'])->name('generos.update')->middleware('can:update,genero');

        Route::delete('generos/{genero}', [GeneroController::class, 'destroy'])->name('generos.destroy')->middleware('can:delete,genero');

        //salas admin
        Route::get('salas', [SalaController::class, 'admin_index'])->name('salas');

        Route::get('salas/{sala}/view', [SalaController::class, 'view'])->name('salas.view');

        Route::get('salas/create', [SalaController::class, 'create'])->name('salas.create')->middleware('can:create,App\Models\Sala');

        Route::post('salas', [SalaController::class, 'store'])->name('salas.store')->middleware('can:create,App\Models\Sala');

        Route::delete('salas/{sala}', [SalaController::class, 'destroy'])->name('salas.destroy')->middleware('can:delete,sala');


        //sessoes admin
        Route::get('sessoes', [SessaoController::class, 'admin_index'])->name('sessoes');

        Route::get('sessoes/{sessao}/view', [SessaoController::class, 'view'])->name('sessoes.view');

        Route::get('sessoes/create', [SessaoController::class, 'create'])->name('sessoes.create')->middleware('can:create,App\Models\Sessao');;

        Route::post('sessoes', [SessaoController::class, 'store'])->name('sessoes.store')->middleware('can:create,App\Models\Sessao');

        Route::get('sessoes/{sessao}/edit', [SessaoController::class, 'edit'])->name('sessoes.edit')->middleware('can:update,sessao');

        Route::put('sessoes/{sessao}', [SessaoController::class, 'update'])->name('sessoes.update')->middleware('can:update,sessao');

        Route::delete('sessoes/{sessao}', [SessaoController::class, 'destroy'])->name('sessoes.destroy')->middleware('can:delete,sessao');

        
        //clientes admin
        Route::get('clientes', [ClienteController::class, 'admin_index'])->name('clientes');

        Route::put('clientes/{cliente}', [ClienteController::class, 'block'])->name('clientes.block');

        Route::delete('clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

        //bilhetes admin

        Route::get('bilhetes', [BilheteController::class, 'admin_index'])->name('bilhetes');
    });
});