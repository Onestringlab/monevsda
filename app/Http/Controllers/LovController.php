<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Lov;
use App\Log;

class LovController extends Controller {

public function index(){
	$datalov = Lov::orderby('kategori')->get();
	return view('lov/lovlist',['datalov' => $datalov]);
}

public function insert(){
	return view('lov/lovform',['action' => 'insert']);
}

public function update($idlov){
	$lov = Lov::find($idlov);
	return view('lov/lovform',['row' => $lov,'action' => 'update']);
}

public function delete($idlov){
	$lov = Lov::find($idlov);
	return view('lov/lovform',['row' => $lov,'action' => 'delete']);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$lov = new Lov;
		// $lov -> idlov = $request -> idlov;
		$lov -> kategori = $request -> kategori;
		$lov -> kode = $request -> kode;
		$lov -> value = $request -> value;
		$lov -> modified_by = session()->get('username');
		// $lov -> created_at = $request -> created_at;
		// $lov -> updated_at = $request -> updated_at;
		$lov -> save();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menambahkan data lov';
    $log -> keterangan = 'Data : '.$request -> kode.', '.$request -> value;
    $log -> modified_by = $request->session()->get('username');
    $log -> save();

	}
	else if($request -> action == 'update'){
		$lov = Lov::find($request -> idlov);
		// $lov -> idlov = $request -> idlov;
		$lov -> kategori = $request -> kategori;
		$lov -> kode = $request -> kode;
		$lov -> value = $request -> value;
		$lov -> modified_by = session()->get('username');
		// $lov -> created_at = $request -> created_at;
		// $lov -> updated_at = $request -> updated_at;
		$lov -> save();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Mengedit data lov';
    $log -> keterangan = 'Data : '.$request -> kode.', '.$request -> value;
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	else if($request -> action == 'delete'){
		$lov = Lov::find($request -> idlov);

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menghapus data lov';
    $log -> keterangan = 'Data : '.$lov -> kode.', '.$lov -> value;
    $log -> modified_by = session()->get('username');
    $log -> save();

		$lov -> delete();
	}
	return redirect('/lov');
}
}
