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
Route::post('/lectura', 'ReadingController@storeCamera');
Route::post('/lectura/ultrasound', 'ReadingController@storeUltrasound');

//Route::get('/reading', 'ReadingController@index')->name('char');

Route::get('descargar-tabla', 'ReadingController@pdfList')->name('tabla.pdf');
Route::get('descargar-rank', 'ReadingController@pdfRank')->name('rank.pdf');

/*Las rutas deben seguir una misma estructura, la pueden modificar si gustan
pero "/add/sede" solo eso 'HeadquarterController@store' esa es la direccion
del contralador y de la funcion que se usará
*/

Route::post('/add/sede', 'HeadquarterController@store');
Route::post('/update/sede', 'HeadquarterController@update');
Route::get('/show/sede', 'HeadquarterController@show');

// OBRAS
Route::get('/add/cuadro', 'PictureController@create');
Route::post('/add/cuadro', 'PictureController@store');
Route::post('/update/cuadro', 'PictureController@update');
Route::get('/show/cuadros', 'PictureController@index');
Route::get('/show/cuadro/{id}', 'PictureController@show');
Route::get('/delete/cuadro/{id}', 'PictureController@destroy');

// ULTRASONIDO

Route::get('/add/ultrasonido', 'UltrasoundController@create');
Route::post('/add/ultrasonido', 'UltrasoundController@store');
Route::post('/add/ultrasonidos', 'UltrasoundController@stored');
Route::post('/update/ultrasonido', 'UltrasoundController@update');
Route::get('/show/ultrasonidos', 'UltrasoundController@index');
Route::get('/show/ultrasonido/{id}', 'UltrasoundController@show');
Route::get('/delete/ultrasonido/{id}', 'UltrasoundController@destroy');

// CAMARAS

Route::get('/add/camara', 'CameraController@create');
Route::post('/add/camara', 'CameraController@store');
Route::post('/add/camaras', 'CameraController@stored');
Route::post('/update/camara', 'CameraController@update');
Route::post('/update/camaras', 'CameraController@updated');
Route::get('/show/camaras', 'CameraController@index');
Route::get('/show/camaras/{id}', 'CameraController@showed');
Route::get('/delete/camara/{id}', 'CameraController@destroy');

// TOTEMS

Route::get('/add/totem', 'TotemController@create');
Route::post('/add/totem', 'TotemController@store');
Route::post('/add/totems', 'TotemController@stored');
Route::post('/update/totem', 'TotemController@update');
Route::get('/show/totem', 'TotemController@index');
Route::get('/show/totem/{id}', 'TotemController@showed');
Route::get('/delete/totem/{id}', 'TotemController@destroy');

// REPORTES
Route::get('/reportes', 'HomeController@reportes');

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/graficos', 'HomeController@index')->name('home');
