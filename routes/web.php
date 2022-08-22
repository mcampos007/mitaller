<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->namespace('Admin')->group(function(){
    
    Route::get('/tecnicos', 'TecnicoController@index');
    Route::get('/tecnicos/create', 'TecnicoController@create');
    Route::get('/tecnicos/{tecnico}/edit', 'TecnicoController@edit');
    Route::post('/tecnicos', 'TecnicoController@store');
    Route::put('/tecnicos/{tecnico}', 'TecnicoController@update');
    Route::delete('/tecnicos/{tecnico}', 'TecnicoController@destroy');

    //Clientes
    Route::resource('clientes','ClienteController');

    //Empleados
    Route::resource('empleados','EmpleadoController');

});

