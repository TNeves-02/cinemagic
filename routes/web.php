<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\GeneroController;
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

Route::get('/bilhete', [FilmeController::class, 'bilhete'])->name('bilhetes.index');

Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

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

});