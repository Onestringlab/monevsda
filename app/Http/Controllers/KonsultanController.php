<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Log;
use App\Lov;
use App\Konsultan;

class KonsultanController extends Controller {

public function index(){
	$datakonsultan = Konsultan::orderby('nama','asc')->get();
	return view('konsultan/konsultanlist',['datakonsultan' => $datakonsultan]);
}

public function insert(){
	$datastatus = Lov::where('kategori','status')->get();
	return view('konsultan/konsultanform',['action' => 'insert','datastatus' => $datastatus]);
}

public function update($idkonsultan){
	$konsultan = Konsultan::find($idkonsultan);
	$datastatus = Lov::where('kategori','status')->get();
	return view('konsultan/konsultanform',['row' => $konsultan,'action' => 'update','datastatus' => $datastatus]);
}

public function delete($idkonsultan){
	$konsultan = Konsultan::find($idkonsultan);
	return view('konsultan/konsultanform',['row' => $konsultan,'action' => 'delete']);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$konsultan = new Konsultan;
		// $konsultan -> idkonsultan = $request -> idkonsultan;
		$konsultan -> nama = $request -> nama;
		$konsultan -> alamat = $request -> alamat;
		$konsultan -> penanggungjawab = $request -> penanggungjawab;
		$konsultan -> notelp = $request -> notelp;
		$konsultan -> email = $request -> email;
		$konsultan -> modified_by = session()->get('username');
		// $konsultan -> created_at = $request -> created_at;
		// $konsultan -> updated_at = $request -> updated_at;
		$konsultan -> status = $request -> status;
		$konsultan -> save();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menambahkan data konsultan';
    $log -> keterangan = 'Data : '.$request -> nama.', '.$request -> alamat;
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	else if($request -> action == 'update'){
		$konsultan = Konsultan::find($request -> idkonsultan);
		// $konsultan -> idkonsultan = $request -> idkonsultan;
		$konsultan -> nama = $request -> nama;
		$konsultan -> alamat = $request -> alamat;
		$konsultan -> penanggungjawab = $request -> penanggungjawab;
		$konsultan -> notelp = $request -> notelp;
		$konsultan -> email = $request -> email;
		$konsultan -> modified_by = session()->get('username');
		// $konsultan -> created_at = $request -> created_at;
		// $konsultan -> updated_at = $request -> updated_at;
		$konsultan -> status = $request -> status;
		$konsultan -> save();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Mengedit data konsultan';
    $log -> keterangan = 'Data : '.$request -> nama;
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	else if($request -> action == 'delete'){
		$konsultan = Konsultan::find($request -> idkonsultan);

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menghapus data konsultan';
    $log -> keterangan = 'Data : '.$konsultan -> nama.', '.$konsultan -> alamat;
    $log -> modified_by = $request->session()->get('username');
    $log -> save();

		$konsultan -> delete();
	}
	return redirect('/konsultan');
}
}
