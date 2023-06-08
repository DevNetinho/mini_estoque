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

// Route::get('/', function () { //ROTA PADRÃO AO ACESSAR O LINK
//     return redirect()->route('produto');
// });

Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* a diferença principal entre uma rota POST e uma rota GET no Laravel é que a rota GET é usada para recuperar informações do servidor,
enquanto a rota POST é usada para enviar dados ao servidor para criar ou atualizar recursos, realizar ações de modificação ou enviar informações confidenciais. */

Route::redirect('/', 'produto');

Route::resource('produto', 'ProdutoController');

