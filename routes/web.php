<?php

Route::get('/example', function () {
		Cache::put('username','yulriobrianorman',1);
		dd(Cache::get('username'));
    // return view('templates/example');
});

Route::get('/dataTable', function () {
    return view('dataTable');
});

Route::group(['middleware' => 'superman'], function(){
	//username
	Route::get('/username', 'UsernameController@index');
	Route::get('/username/insert', 'UsernameController@insert');
	Route::get('/username/{idusername}/update', 'UsernameController@update');
	Route::get('/username/{idusername}/delete', 'UsernameController@delete');
	Route::post('/username/manage', 'UsernameController@manage');

	//log
	Route::get('/log', 'LogController@index');
	Route::get('/log/insert', 'LogController@insert');
	Route::get('/log/{idlog}/update', 'LogController@update');
	Route::get('/log/{idlog}/delete', 'LogController@delete');
	Route::post('/log/manage', 'LogController@manage');

	//lov
	Route::get('/lov', 'LovController@index');
	Route::get('/lov/insert', 'LovController@insert');
	Route::get('/lov/{idlov}/update', 'LovController@update');
	Route::get('/lov/{idlov}/delete', 'LovController@delete');
	Route::post('/lov/manage', 'LovController@manage');

	//konsultan
	Route::get('/konsultan', 'KonsultanController@index');
	Route::get('/konsultan/insert', 'KonsultanController@insert');
	Route::get('/konsultan/{idkonsultan}/update', 'KonsultanController@update');
	Route::get('/konsultan/{idkonsultan}/delete', 'KonsultanController@delete');
	Route::post('/konsultan/manage', 'KonsultanController@manage');

	//kecamatan
	Route::get('/kecamatan', 'KecamatanController@index');
	Route::get('/kecamatan/insert', 'KecamatanController@insert');
	Route::get('/kecamatan/{idkecamatan}/update', 'KecamatanController@update');
	Route::get('/kecamatan/{idkecamatan}/delete', 'KecamatanController@delete');
	Route::post('/kecamatan/manage', 'KecamatanController@manage');

	//desa
	Route::get('/desa/{idkecamatan}', 'DesaController@index');
	Route::get('/desa/insert/{idkecamatan}', 'DesaController@insert');
	Route::get('/desa/{iddesa}/update', 'DesaController@update');
	Route::get('/desa/{iddesa}/delete', 'DesaController@delete');
	Route::post('/desa/manage', 'DesaController@manage');


});

Route::group(['middleware' => 'admin'], function(){
	//app
	Route::get('/app', function () {
	    return view('templates/app');
	});

});

//login
Route::get('/halamanlogin', 'LoginController@index');
Route::post('/ceklogin', 'LoginController@ceklogin');
Route::get('/keluar', 'LoginController@keluar');






