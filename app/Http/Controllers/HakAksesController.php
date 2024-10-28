<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class HakAksesController extends Controller {

	public function index()
	{
		$keterangan = "";
		return view('hakakses/hakakses',["keterangan" => $keterangan]);
	}

public function waktu(Request $request)
	{
		Cache::put('akses','Superadmin',$request -> waktu);
		$keterangan = "Hak Akses Telah Diberikan Kepada Admin Selama ".$request -> waktu." Menit";
		return view('hakakses/hakakses',["keterangan" => $keterangan]);
	}


}