<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

use App\Log;
use App\Lov;
use App\Desa;
use App\Kecamatan;

class KecamatanController extends Controller {

public function index(){
	$datakecamatan = Kecamatan::orderby('nama')->get();
	// $datakecamatan = Cache::remember('datakecamatan',1,function(){
	// 	return Kecamatan::orderby('nama')->get();
	// });
	return view('kecamatan/kecamatanlist',['datakecamatan' => $datakecamatan]);
}

public function insert(){
	$datakecamatan = Kecamatan::orderby('nama')->get();
	$datastatus = Lov::where('kategori','status')->get();
	return view('kecamatan/kecamatanform',['action' => 'insert','datastatus' => $datastatus, 'datakecamatan' => $datakecamatan]);
}

public function update($idkecamatan){
	$datakecamatan = Kecamatan::orderby('nama')->get();
	$kecamatan = Kecamatan::find($idkecamatan);
	$datastatus = Lov::where('kategori','status')->get();
	return view('kecamatan/kecamatanform',['row' => $kecamatan,'action' => 'update','datastatus' => $datastatus, 'datakecamatan' => $datakecamatan]);
}

public function delete($idkecamatan){
	$datakecamatan = Kecamatan::orderby('nama')->get();
	$kecamatan = Kecamatan::find($idkecamatan);
	return view('kecamatan/kecamatanform',['row' => $kecamatan,'action' => 'delete', 'datakecamatan' => $datakecamatan]);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$kecamatan = new Kecamatan;
		// $kecamatan -> idkecamatan = $request -> idkecamatan;
		$kecamatan -> nama = $request -> nama;
		$kecamatan -> kode = $request -> kode;
		$kecamatan -> status = $request -> status;
		$kecamatan -> modified_by = session()->get('username');
		// $kecamatan -> at = $request -> at;
		// $kecamatan -> updated_at = $request -> updated_at;
		$kecamatan -> save();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menambah data kecamatan';
    $log -> keterangan = json_encode($kecamatan);
		$log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	else if($request -> action == 'update'){
		$kecamatan = Kecamatan::find($request -> idkecamatan);
		// $kecamatan -> idkecamatan = $request -> idkecamatan;
		$kecamatan -> nama = $request -> nama;
		$kecamatan -> kode = $request -> kode;
		$kecamatan -> status = $request -> status;
		$kecamatan -> modified_by = session()->get('username');
		// $kecamatan -> created_at = $request -> created_at;
		// $kecamatan -> updated_at = $request -> updated_at;
		$kecamatan -> save();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Mengedit data kecamatan';
    $log -> keterangan = json_encode($kecamatan);
		$log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	else if($request -> action == 'delete'){
		$kecamatan = Kecamatan::find($request -> idkecamatan);
		Desa::where('idkecamatan',$request -> idkecamatan) -> delete();
		$kecamatan -> delete();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menghapus data kecamatan';
    $log -> keterangan = json_encode($kecamatan);
		$log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	return redirect('/kecamatan');
}
}
