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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/example', function () {
    return view('templates/example');
});

Route::get('/app', function () {
    return view('templates/app');
});

Route::get('/dataTable', function () {
    return view('dataTable');
});


//username
Route::get('/username', 'UsernameController@index');
Route::get('/username/insert', 'UsernameController@insert');
Route::get('/username/{idusername}/update', 'UsernameController@update');
Route::get('/username/{idusername}/delete', 'UsernameController@delete');
Route::post('/username/manage', 'UsernameController@manage');

