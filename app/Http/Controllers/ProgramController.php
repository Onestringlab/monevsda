<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Lov;
use App\Log;
use App\Program;

class ProgramController extends Controller {

public function index(){
	$dataprogram = Program::where('tahun', session()->get('ta'))->orderby('namaprogram','asc')->get();
	return view('program/programlist',['dataprogram' => $dataprogram]);
}

public function lapprokegpek(){
	$dataprogram = Program::where('tahun', session()->get('ta'))->get();
	return view('program/lapprokegpek',['dataprogram' => $dataprogram]);
}

public function insert(){
	$databidang = Lov::where('kategori','bidang') -> get();
	$datatahun = Lov::where('kategori','ta') -> get();
	return view('program/programform',['action' => 'insert', 'databidang' => $databidang, 'datatahun' => $datatahun]);
}

public function update($idprogram){
	$program = Program::find($idprogram);
	$databidang = Lov::where('kategori','bidang') -> get();
	$datatahun = Lov::where('kategori','ta') -> get();
	return view('program/programform',['row' => $program,'action' => 'update', 'databidang' => $databidang, 'datatahun' => $datatahun]);
}

public function delete($idprogram){
	$program = Program::find($idprogram);
	return view('program/programform',['row' => $program,'action' => 'delete']);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$program = new Program;
		// $program -> idprogram = $request -> idprogram;
		$program -> bidang = $request -> bidang;
		$program -> norekening = $request -> norekening;
		$program -> namaprogram = $request -> namaprogram;
		$program -> tahun = $request -> tahun;
		$program -> modified_by = $request -> session() -> get('username');
		// $program -> created_at = $request -> created_at;
		// $program -> updated_at = $request -> updated_at;
		$program -> save();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menambahkan data program';
    $log -> keterangan = json_encode($program);
		$log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();


	}
	else if($request -> action == 'update'){
		$program = Program::find($request -> idprogram);
		$keterangan = "Data Lama : "."<br>".json_encode($program);
		// $program -> idprogram = $request -> idprogram;
		$program -> bidang = $request -> bidang;
		$program -> norekening = $request -> norekening;
		$program -> namaprogram = $request -> namaprogram;
		$program -> tahun = $request -> tahun;
		$program -> modified_by = $request -> session() -> get('username');
		// $program -> created_at = $request -> created_at;
		// $program -> updated_at = $request -> updated_at;
		$program -> save();
		$keterangan .= "<br>Data Baru : <br>".json_encode($program);

		//data log
    $log = new Log;
    $log -> aktivitas = 'Mengedit data program';
    $log -> keterangan = $keterangan;
		$log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	else if($request -> action == 'delete'){
		$program = Program::find($request -> idprogram);
		$program -> delete();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menghapus data program';
    $log -> keterangan = json_encode($program);
		$log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	return redirect('/program');
}
}
