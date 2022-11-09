<?php

use App\Http\Controllers\PropriedadeController;
use App\Http\Livewire\Agente;
use App\Http\Livewire\AgenteItem;
use App\Http\Livewire\Agentes;
use App\Http\Livewire\Buscas;
use App\Http\Livewire\Categoria;
use App\Http\Livewire\Categorias;
use App\Http\Livewire\Contactos;
use App\Http\Livewire\Detalhes;
use App\Http\Livewire\Fotos;
use App\Http\Livewire\Inicios;
use App\Http\Livewire\Items;
use App\Http\Livewire\NoticiaItem;
use App\Http\Livewire\Noticias;
use App\Http\Livewire\Propriedades;
use App\Http\Livewire\Sliders;
use App\Http\Livewire\Sobres;
use App\Http\Livewire\Tipos;
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
Route::get('/linkstorage', function () {
    $targetFolder = base_path().'/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($targetFolder, $linkFolder); 
});

Route::get('/', Inicios::class)->name('/');

Route::get('inicio', Inicios::class)->name('inicio');

Route::get('propriedade', Propriedades::class)->name('propriedade');
/* Route::resource('propriedade', PropriedadeController::class); */
Route::get('categorias', Categorias::class)->name('categorias');
Route::get('tipo', Tipos::class)->name('tipo');
Route::get('agentes', Agentes::class)->name('agente');
Route::get('noticia', Noticias::class)->name('noticia');
Route::get('busca', Buscas::class)->name('busca');
Route::get('item/{id}', Items::class)->name('item');
Route::get('detalhe/{id}', Detalhes::class)->name('detalhe');
Route::get('contacto', Contactos::class)->name('contacto');
Route::get('agente', Agente::class)->name('agente');
Route::get('categoria/{id}', Categoria::class)->name('categoria');
Route::get('sobre', Sobres::class)->name('sobre');
Route::get('slider', Sliders::class)->name('slider');
Route::get('agenteitem/{id}', AgenteItem::class)->name('agenteitem');
Route::get('noticiaitem/{id}', NoticiaItem::class)->name('noticiaitem');
Route::get('foto', Fotos::class)->name('foto');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
