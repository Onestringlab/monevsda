<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Pekerjaan;
use App\LaporanKeuangan;

class LaporanKeuanganController extends Controller {

public function index(){
	$datalaporankeuangan = LaporanKeuangan::all();
	return view('laporankeuangan/laporankeuanganlist',['datalaporankeuangan' => $datalaporankeuangan]);
}

public function insert($idpekerjaan){
	$pekerjaan = Pekerjaan::find($idpekerjaan);
	$datalaporankeuangan = LaporanKeuangan::where('idpekerjaan', $idpekerjaan)->get();
	return view('laporankeuangan/laporankeuanganform',['action' => 'insert', 'pekerjaan' => $pekerjaan, 'datalaporankeuangan' => $datalaporankeuangan, 'edit' => 'Y']);
}

public function update($idlaporankeuangan){
	$laporankeuangan = LaporanKeuangan::find($idlaporankeuangan);
	$pekerjaan = Pekerjaan::find($laporankeuangan->idpekerjaan);
	$datalaporankeuangan = LaporanKeuangan::where('idpekerjaan', $laporankeuangan->idpekerjaan)->get();
	return view('laporankeuangan/laporankeuanganform',['row' => $laporankeuangan,'action' => 'update', 'pekerjaan' => $pekerjaan, 'datalaporankeuangan' => $datalaporankeuangan, 'edit' => 'Y']);
}

public function delete($idlaporankeuangan){
	$laporankeuangan = LaporanKeuangan::find($idlaporankeuangan);
	$pekerjaan = Pekerjaan::find($laporankeuangan->idpekerjaan);
	$datalaporankeuangan = LaporanKeuangan::where('idpekerjaan', $laporankeuangan->idpekerjaan)->get();
	return view('laporankeuangan/laporankeuanganform',['row' => $laporankeuangan,'action' => 'delete', 'pekerjaan' => $pekerjaan, 'datalaporankeuangan' => $datalaporankeuangan, 'edit' => 'Y']);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$laporankeuangan = new LaporanKeuangan;
		// $laporankeuangan -> idlaporankeuangan = $request -> idlaporankeuangan;
		$laporankeuangan -> idpekerjaan = $request -> idpekerjaan;
		$laporankeuangan -> tanggal = $request -> tanggal;
		$laporankeuangan -> keterangan = $request -> keterangan;
		$laporankeuangan -> pembayaran = $request -> pembayaran;
		// $laporankeuangan -> kemajuan = $request -> kemajuan;
		// $laporankeuangan -> buktiba = $request -> buktiba;
		$laporankeuangan -> modified_by = session() -> get('username');
		// $laporankeuangan -> created_at = $request -> created_at;
		// $laporankeuangan -> updated_at = $request -> updated_at;
		$laporankeuangan -> save();
	}
	else if($request -> action == 'update'){
		$laporankeuangan = LaporanKeuangan::find($request -> idlaporankeuangan);
		// $laporankeuangan -> idlaporankeuangan = $request -> idlaporankeuangan;
		$laporankeuangan -> idpekerjaan = $request -> idpekerjaan;
		$laporankeuangan -> tanggal = $request -> tanggal;
		$laporankeuangan -> keterangan = $request -> keterangan;
		$laporankeuangan -> pembayaran = $request -> pembayaran;
		// $laporankeuangan -> kemajuan = $request -> kemajuan;
		$laporankeuangan -> buktiba = $request -> buktiba;
		$laporankeuangan -> modified_by = session() -> get('username');
		// $laporankeuangan -> created_at = $request -> created_at;
		// $laporankeuangan -> updated_at = $request -> updated_at;
		$laporankeuangan -> save();
	}
	else if($request -> action == 'delete'){
		$laporankeuangan = LaporanKeuangan::find($request -> idlaporankeuangan);
		$laporankeuangan -> delete();
	}
	return redirect('/pekerjaanmonev/'.$request -> idpekerjaan);

}
}
