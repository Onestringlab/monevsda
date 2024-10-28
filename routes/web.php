<?php

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

	//pengawas
	Route::get('/pengawas', 'PengawasController@index');
	Route::get('/pengawas/insert', 'PengawasController@insert');
	Route::get('/pengawas/{idpengawas}/update', 'PengawasController@update');
	Route::get('/pengawas/{idpengawas}/delete', 'PengawasController@delete');
	Route::get('/pengawas/{idpengawas}/detail', 'PengawasController@detail');
	Route::post('/pengawas/manage', 'PengawasController@manage');



});

Route::group(['middleware' => 'admin'], function(){
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
	Route::get('/datadesa/{idkecamatan}', 'DesaController@desaByKecamatan');
	Route::get('/desa/insert/{idkecamatan}', 'DesaController@insert');
	Route::get('/desa/{iddesa}/update', 'DesaController@update');
	Route::get('/desa/{iddesa}/delete', 'DesaController@delete');
	Route::post('/desa/manage', 'DesaController@manage');

	//sk
	Route::get('/sk', 'SKController@index');
	Route::get('/sk/insert', 'SKController@insert');
	Route::get('/sk/{idsk}/update', 'SKController@update');
	Route::get('/sk/{idsk}/delete', 'SKController@delete');
	Route::post('/sk/manage', 'SKController@manage');

	//penjabat
	Route::get('/penjabat/{idsk}', 'PenjabatController@index');
	Route::get('/penjabat/insert/{idsk}', 'PenjabatController@insert');
	Route::get('/penjabat/{idpenjabat}/update', 'PenjabatController@update');
	Route::get('/penjabat/{idpenjabat}/delete', 'PenjabatController@delete');
	Route::post('/penjabat/manage', 'PenjabatController@manage');

	//program
	Route::get('/program', 'ProgramController@index');
	Route::get('/program/insert', 'ProgramController@insert');
	Route::get('/program/{idprogram}/update', 'ProgramController@update');
	Route::get('/program/{idprogram}/delete', 'ProgramController@delete');
	Route::post('/program/manage', 'ProgramController@manage');


	//kegiatan
	Route::get('/kegiatan/{idprogram}', 'KegiatanController@index');
	Route::get('/kegiatan/insert/{idprogram}', 'KegiatanController@insert');
	Route::get('/kegiatan/{idkegiatan}/update', 'KegiatanController@update');
	Route::get('/kegiatan/{idkegiatan}/delete', 'KegiatanController@delete');
	Route::post('/kegiatan/manage', 'KegiatanController@manage');

	//pekerjaan
	Route::get('/pekerjaan/{idkegiatan}', 'PekerjaanController@index');
	Route::get('/pekerjaan/insert/{idkegiatan}', 'PekerjaanController@insert');
	Route::get('/pekerjaan/{idpekerjaan}/update/{data}', 'PekerjaanController@update');
	Route::get('/pekerjaan/{idpekerjaan}/delete/{data}', 'PekerjaanController@delete');
	Route::post('/pekerjaan/manage', 'PekerjaanController@manage');
	Route::get('/pekerjaandetail/{idpekerjaan}', 'PekerjaanController@detail');
	Route::get('/pekerjaandetailpdf/{idpekerjaan}', 'PekerjaanController@detailPDF');
	Route::get('/pekerjaandetailprint/{idpekerjaan}', 'PekerjaanController@detailPrint');
	Route::get('/pekerjaanmonev/{idpekerjaan}', 'PekerjaanController@monev');
	Route::get('/pekerjaanall', 'PekerjaanController@pekerjaanall');

	//alat
	Route::get('/alat', 'AlatController@index');
	Route::get('/alat/insert/{idpekerjaan}', 'AlatController@insert');
	Route::get('/alat/{idalat}/update', 'AlatController@update');
	Route::get('/alat/{idalat}/delete', 'AlatController@delete');
	Route::post('/alat/manage', 'AlatController@manage');
	Route::get('/alat/singkronalat/{idpekerjaan}', 'AlatController@singkronalat');


	//koordinat
	Route::get('/koordinat/{idpekerjaan}', 'KoordinatController@index');
	Route::get('/koordinat/insert/{idpekerjaan}', 'KoordinatController@insert');
	Route::get('/koordinat/{idkoordinat}/update', 'KoordinatController@update');
	Route::get('/koordinat/{idkoordinat}/delete', 'KoordinatController@delete');
	Route::post('/koordinat/manage', 'KoordinatController@manage');
	Route::get('/koordinat/singkronkoordinat/{idpekerjaan}', 'KoordinatController@singkronkoordinat');

	//files
	Route::get('/dokumen/{idpekerjaan}', 'DokumenController@index');
	Route::get('/dokumen/insert/{idpekerjaan}', 'DokumenController@insert');
	Route::get('/dokumen/{iddokumen}/update', 'DokumenController@update');
	Route::get('/dokumen/{iddokumen}/delete', 'DokumenController@delete');
	Route::post('/dokumen/manage', 'DokumenController@manage');

	//laporan fisik
	Route::get('/laporanfisik/{idpekerjaan}', 'LaporanFisikController@index');
	Route::get('/laporanfisik/insert/{idpekerjaan}', 'LaporanFisikController@insert');
	Route::get('/laporanfisik/{idlaporanfisik}/update', 'LaporanFisikController@update');
	Route::get('/laporanfisik/{idlaporanfisik}/delete', 'LaporanFisikController@delete');
	Route::post('/laporanfisik/manage', 'LaporanFisikController@manage');
	Route::get('/laporanfisik/getdatarealisasi/{idpekerjaan}', 'LaporanFisikController@getdatarealisasi');

	//photo fisik
	Route::get('/photofisik/{idlaporanfisik}', 'PhotoFisikController@index');
	Route::get('/photofisik/insert/{idlaporanfisik}', 'PhotoFisikController@insert');
	Route::get('/photofisik/{idphotofisik}/update', 'PhotoFisikController@update');
	Route::get('/photofisik/{idphotofisik}/delete', 'PhotoFisikController@delete');
	Route::post('/photofisik/manage', 'PhotoFisikController@manage');

	//laporan keuangan
	Route::get('/laporankeuangan/{idpekerjaan}', 'LaporanKeuanganController@index');
	Route::get('/laporankeuangan/insert/{idpekerjaan}', 'LaporanKeuanganController@insert');
	Route::get('/laporankeuangan/{idlaporankeuangan}/update', 'LaporanKeuanganController@update');
	Route::get('/laporankeuangan/{idlaporankeuangan}/delete', 'LaporanKeuanganController@delete');
	Route::post('/laporankeuangan/manage', 'LaporanKeuanganController@manage');

	//hakakses
	Route::get('/hakakses', 'HakAksesController@index');
	Route::post('/hakakses/waktu', 'HakAksesController@waktu');

});

Route::group(['middleware' => 'guests'], function(){
	//dashboard
	Route::get('/dashboard1', 'DashboardController@dashboard1');
	Route::get('/dashboard2', 'DashboardController@dashboard2');
	Route::get('/pekerjaancari', 'PekerjaanController@pekerjaancari');

	//laporan
	Route::get('/lapstatkemajuan', 'PekerjaanController@lapstatkemajuan');
	Route::get('/lappekstat', 'PekerjaanController@lappekstat');
	Route::get('/lappekexpired', 'PekerjaanController@lappekexpired');
	Route::get('/lappekakanexpired', 'PekerjaanController@lappekakanexpired');
	Route::get('/lappeklok', 'PekerjaanController@lappeklok');
	Route::get('/lappekkon', 'PekerjaanController@lappekkon');
	Route::get('/laphasilpro', 'PekerjaanController@laphasilpro');
	Route::get('/lappekpej', 'PekerjaanController@lappekpej');
	Route::get('/lappekcair', 'PekerjaanController@lappekcair');
	Route::get('/lapprokegpek', 'ProgramController@lapprokegpek');


});

//login
Route::get('/halamanlogin', 'LoginController@index');
Route::post('/ceklogin', 'LoginController@ceklogin');
Route::get('/keluar', 'LoginController@keluar');

//app
Route::get('/app', function () {return view('templates/app'); });

Route::get('/pekerjaanpengawas', 'PengawasController@pekerjaanpengawas');

//alatp
Route::get('/alatp/{idpekerjaan}', 'AlatpController@index');
Route::get('/alatp/insert/{idpekerjaan}', 'AlatpController@insert');
Route::get('/alatp/{idalatp}/update', 'AlatpController@update');
Route::get('/alatp/{idalatp}/delete', 'AlatpController@delete');
Route::get('/alatp/{idalatp}/detail', 'AlatpController@detail');
Route::post('/alatp/manage', 'AlatpController@manage');

//koordinatp
Route::get('/koordinatp/{idpekerjaan}', 'KoordinatpController@index');
Route::get('/koordinatp/insert/{idpekerjaan}', 'KoordinatpController@insert');
Route::get('/koordinatp/{idkoordinatp}/update', 'KoordinatpController@update');
Route::get('/koordinatp/{idkoordinatp}/delete', 'KoordinatpController@delete');
Route::get('/koordinatp/{idkoordinatp}/detail', 'KoordinatpController@detail');
Route::post('/koordinatp/manage', 'KoordinatpController@manage');

//laporanfisikp
Route::get('/laporanfisikp/{idpekerjaan}', 'LaporanFisikpController@index');
Route::get('/laporanfisikp/insert/{idpekerjaan}', 'LaporanFisikpController@insert');
Route::get('/laporanfisikp/{idlaporanfisikp}/update', 'LaporanFisikpController@update');
Route::get('/laporanfisikp/{idlaporanfisikp}/delete', 'LaporanFisikpController@delete');
Route::get('/laporanfisikp/{idlaporanfisikp}/detail', 'LaporanFisikpController@detail');
Route::post('/laporanfisikp/manage', 'LaporanFisikpController@manage');
Route::get('/laporanfisikp/getdatarencana/{idpekerjaan}', 'LaporanFisikpController@getdatarencana');

//photofisikp
Route::get('/photofisikp/{idlaporanfisikp}', 'PhotoFisikpController@index');
Route::get('/photofisikp/insert/{idlaporanfisikp}', 'PhotoFisikpController@insert');
Route::get('/photofisikp/{idphotofisikp}/update', 'PhotoFisikpController@update');
Route::get('/photofisikp/{idphotofisikp}/delete', 'PhotoFisikpController@delete');
Route::get('/photofisikp/{idphotofisikp}/detail', 'PhotoFisikpController@detail');
Route::post('/photofisikp/manage', 'PhotoFisikpController@manage');




