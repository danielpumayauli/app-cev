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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Factory\FactoryController@index' );

Route::get('/admin', 'Admin\HomeController@index');
Route::post('/admin/addNewProject', 'Admin\ProjectController@store');

Route::get('/project/{codeProject}', 'Admin\ProjectController@show');

Route::get('/factory', 'Factory\FactoryController@index');
Route::get('/factory/grabaciones', 'Factory\RecordingController@index');
Route::get('/factory/grabaciones/getFullNameForm', 'Factory\RecordingController@getFullNameForm');
Route::get('/factory/grabaciones/getProgramForm', 'Factory\RecordingController@getProgramForm');
Route::post('/factory/grabaciones/guardar', 'Factory\RecordingController@store');
Route::post('/factory/endRecording/{idRecord}', 'Factory\RecordingController@endRecording');

Route::get('/factory/capacitaciones', 'Factory\TrainingController@index');
Route::post('/factory/capacitaciones/guardar', 'Factory\TrainingController@store');

Route::get('/factory/eventos', 'Factory\EventsController@index');
Route::post('/factory/eventos/guardar', 'Factory\EventsController@store');

// Route::get('/qa', 'QA\QAController@index'); 

