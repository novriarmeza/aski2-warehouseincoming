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

// Route::resource('/', 'IncController');
Route::get('/', 'IncController@view');
Route::get('/view/{os2}/viewedit', 'IncController@viewedit');
Route::post('/view/{os2}', 'IncController@store');

Route::get('/edit', 'IncController@edit');
Route::get('/edit/{os3}/editos', 'IncController@editos');
Route::post('/edit/{os3}', 'IncController@update');

Route::get('/dataos', 'IncController@dataos');


// Route::post('/view/{os2}', 'IncController@viewinput');

// Route::get('/all/{os2}/viewedit', 'IncController@edit');
// Route::post('/all/update/{bpr_order}', 'Bpr_ordersController@update');


// Route::post('/price/{bpr_hargaproduct}', 'Bpr_hargaproductsController@changeharga');
