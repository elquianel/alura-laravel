<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;

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
    return redirect('/series');
});

//novo no laravel 9
//basicamente agrupa as rotas pelo controller
// Route::controller(SeriesController::class)->group(function(){
//     Route::get('/series', "index");
//     Route::get('/series/create', "create");
//     Route::post('/series/salvar', "store");
// });



//forma mais comum de se ver
// Route::get('/series', [SeriesController::class, "index"]);
// Route::get('/series/create', [SeriesController::class, "create"]);
// Route::post('/series/salvar', [SeriesController::class, "store"]);


//nomeando rotas para não precisar acessar os caminhos diretamente nos links (ex: form... action...)
// Route::controller(SeriesController::class)->group(function(){
//     Route::get('/series', "index")->name('series.index');
//     Route::get('/series/create', "create")->name('series.create');
//     Route::post('/series/salvar', "store")->name('series.store');
// });

// usar o resource ele meio que define rotas que ainda n temos, mas basta nomear direitinho os metodos e arquivos que ele encontra
// aqui abaixo posso utilizar os metodos only() e excepted() pra definir as rotas que já tenho
// Route::resource('/series', SeriesController::class)->only('index', 'create', 'store', 'destroy', 'edit');
Route::resource('/series', SeriesController::class)->except('show');
// Route::resource('/series', SeriesController::class);

// Route::delete('/series/destroy/{id}', [SeriesController::class, 'destroy'])->name('series.destroy');

