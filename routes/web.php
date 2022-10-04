<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
/* Para manejar solicitudes HHTP -> solicitudes de usuario */


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
    Route::get         | Consultar
	Route::post        |Guardar
	Route::delete      | Eliminar
	Route::put         |Actualizar
	
|
*/

/** 
Route::get('/',[PageController::class, 'home'])->name('home');

Route::get('blog',[PageController::class,'blog'] )->name('blog');

Route::get('blog/{slug}', [PageController::class,'post'])->name('post');

 */

Route::controller(PageController::class)->group(function () {

  Route::get('/',           'home')->name('home');
  Route::get('blog',        'blog')->name('blog');
  Route::get('blog/{Post slug}',   'post')->name('post');
});

Route::get('/dashboard', function () {
  return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('posts',PostController::class)->except(['show']);

require __DIR__ . '/auth.php';
