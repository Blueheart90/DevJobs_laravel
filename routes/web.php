<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

// Rutas protegidas

Route::group(['middleware' => ['auth', 'verified']], function() {
    // Rutas de vacantes
    Route::get('/vacantes', 'VacanteController@index')->name('vacantes.index');
    Route::get('/vacantes/create', 'VacanteController@create')->name('vacantes.create');
    Route::post('/vacantes', 'VacanteController@store')->name('vacantes.store');
    Route::delete('/vacantes/{vacante}', 'VacanteController@destroy')->name('vacantes.destroy');
    Route::get('/vacantes/{vacante}/edit', 'VacanteController@edit')->name('vacantes.edit');
    Route::put('/vacantes/{vacante}', 'VacanteController@update')->name('vacantes.update');

    // Subir Imagenes
    Route::post('/vacantes/imagen', 'VacanteController@imagen')->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen', 'VacanteController@borrarimagen')->name('vacantes.borrar');

    // Cambiar estado de la vacante
    Route::post('/vacantes/{vacante}','VacanteController@estado')->name('vacantes.estado');

    // Notificaciones
    Route::get('/notificaciones', 'NotificacionesController')->name('notificaciones');

});

// Pagina de inicio
Route::get('/', 'InicioController')->name('inicio');

// Enviar datos para una Vacante
Route::get('/candidatos/{id}', 'CandidatoController@index')->name('candidatos.index');
Route::post('/candidatos/store', 'CandidatoController@store')->name('candidatos.store');

// Muestra los trabajos en el front end sin autenticación
// Route::get('/vacantes/resultados', 'VacanteController@resultados')->name('vacantes.resultados'); // Esta ruta debe ir primero que la de vacante.show sino dará error, el orden es importante
// Route::post('/vacantes/buscar', 'VacanteController@buscar')->name('vacantes.buscar');        // Es una buena practica poner al final las ruras con comodines {vacante} en este caso
Route::get('/vacantes/{vacante}', 'VacanteController@show')->name('vacantes.show');

// Otra alternativa es usar una url distinta que no interfiera con las ya creadas que tengan comodines
Route::get('/busqueda/resultados', 'VacanteController@resultados')->name('vacantes.resultados');
Route::post('/busqueda/buscar', 'VacanteController@buscar')->name('vacantes.buscar');

// Mostrar vacantes de una categoria
Route::get('/categoria/{categoria}', 'CategoriaController@show')->name('categoria.show');




// Rutas de Vacantes
// Route::resource('/vacantes', 'VacanteController');


