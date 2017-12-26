<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Log;
use App\Lov;
use App\Desa;
use App\Kecamatan;

class DesaController extends Controller {

public function index($idkecamatan){
	$datadesa = Desa::where('idkecamatan',$idkecamatan)->orderby('nama','asc')->get();
	return view('desa/desalist',['datadesa' => $datadesa,'idkecamatan' => $idkecamatan]);
}

public function insert($idkecamatan){
	$kecamatan = Kecamatan::find($idkecamatan);
	$datastatus = Lov::where('kategori','status')->get();
	$datadesa = Desa::where('idkecamatan',$idkecamatan)->orderby('nama','asc')->get();
	return view('desa/desaform',['action' => 'insert', 'kecamatan' => $kecamatan, 'datadesa' => $datadesa, 'datastatus' => $datastatus]);
}

public function update($iddesa){
	$desa = Desa::find($iddesa);
	$datastatus = Lov::where('kategori','status')->get();
	$datadesa = Desa::where('idkecamatan',$desa->idkecamatan)->orderby('nama','asc')->get();
	return view('desa/desaform',['row' => $desa, 'datastatus' => $datastatus, 'action' => 'update', 'datadesa' => $datadesa, 'kecamatan' => $desa->kecamatan]);
}

public function delete($iddesa){
	$desa = Desa::find($iddesa);
	$datadesa = Desa::where('idkecamatan',$desa->idkecamatan)->orderby('nama','asc')->get();
	return view('desa/desaform',['row' => $desa,'action' => 'delete', 'datadesa' => $datadesa, 'kecamatan' => $desa->kecamatan]);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$desa = new Desa;
		// $desa -> iddesa = $request -> iddesa;
		$desa -> idkecamatan = $request -> idkecamatan;
		$desa -> nama = $request -> nama;
		$desa -> kode = $request -> kode;
		$desa -> status = $request -> status;
		$desa -> modified_by = session()->get('username');
		// $desa -> created_at = $request -> created_at;
		// $desa -> updated_at = $request -> updated_at;
		$desa -> save();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menambahkan data desa';
    $log -> keterangan = 'Data : '.$desa -> nama.', '.$desa->kecamatan->nama;
    $log -> modified_by = $request->session()->get('username');
    $log -> save();


	}
	else if($request -> action == 'update'){
		$desa = Desa::find($request -> iddesa);
		// $desa -> iddesa = $request -> iddesa;
		$desa -> idkecamatan = $request -> idkecamatan;
		$desa -> nama = $request -> nama;
		$desa -> kode = $request -> kode;
		$desa -> status = $request -> status;
		$desa -> modified_by = session()->get('username');
		// $desa -> created_at = $request -> created_at;
		// $desa -> updated_at = $request -> updated_at;
		$desa -> save();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Mengedit data desa';
    $log -> keterangan = 'Data : '.$desa -> nama.', '.$desa->kecamatan->nama;
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	else if($request -> action == 'delete'){
		$desa = Desa::find($request -> iddesa);

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menghapus data desa';
    $log -> keterangan = 'Data : '.$desa -> nama.', '.$desa->kecamatan->nama;
    $log -> modified_by = $request->session()->get('username');
    $log -> save();


		$desa -> delete();
	}
	return redirect('/desa/'.$request->idkecamatan);
}
}
