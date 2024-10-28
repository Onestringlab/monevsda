<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Log;
use App\Kegiatan;

class KegiatanController extends Controller {

public function index($idprogram){
	$datakegiatan = Kegiatan::where('idprogram',$idprogram)->where('tahun',session()->get('ta'))->with('program')->orderby('namakegiatan','asc')->get();
	return view('kegiatan/kegiatanlist',['datakegiatan' => $datakegiatan, 'idprogram' => $idprogram]);
}

public function insert($idprogram){
	return view('kegiatan/kegiatanform',['action' => 'insert', 'idprogram' => $idprogram]);
}

public function update($idkegiatan){
	$kegiatan = Kegiatan::find($idkegiatan);
	return view('kegiatan/kegiatanform',['row' => $kegiatan,'action' => 'update']);
}

public function delete($idkegiatan){
	$kegiatan = Kegiatan::find($idkegiatan);
	return view('kegiatan/kegiatanform',['row' => $kegiatan,'action' => 'delete']);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$kegiatan = new Kegiatan;
		// $kegiatan -> idkegiatan = $request -> idkegiatan;
		$kegiatan -> idprogram = $request -> idprogram;
		$kegiatan -> norekening = $request -> norekening;
		$kegiatan -> namakegiatan = $request -> namakegiatan;
		$kegiatan -> tahun = $request -> tahun;
		$kegiatan -> modified_by = $request -> session() -> get('username');
		// $kegiatan -> created_at = $request -> created_at;
		// $kegiatan -> updated_at = $request -> updated_at;
		$kegiatan -> save();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menambahkan data kegiatan';
    $log -> keterangan = json_encode($kegiatan);
		$log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	else if($request -> action == 'update'){
		$kegiatan = Kegiatan::find($request -> idkegiatan);
		$keterangan = "Data Lama : "."<br>".json_encode($kegiatan);
		// $kegiatan -> idkegiatan = $request -> idkegiatan;
		$kegiatan -> idprogram = $request -> idprogram;
		$kegiatan -> norekening = $request -> norekening;
		$kegiatan -> namakegiatan = $request -> namakegiatan;
		$kegiatan -> tahun = $request -> tahun;
		$kegiatan -> modified_by = $request -> session() -> get('username');
		// $kegiatan -> created_at = $request -> created_at;
		// $kegiatan -> updated_at = $request -> updated_at;
		$kegiatan -> save();
		$keterangan .= "<br>Data Baru : <br>".json_encode($kegiatan);

		//data log
    $log = new Log;
    $log -> aktivitas = 'Mengedit data kegiatan';
    $log -> keterangan = $keterangan;
		$log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	else if($request -> action == 'delete'){
		$kegiatan = Kegiatan::find($request -> idkegiatan);
		$kegiatan -> delete();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menghapus data kegiatan';
    $log -> keterangan = json_encode($kegiatan);
		$log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	return redirect('/kegiatan/'.$request -> idprogram);
}
}
