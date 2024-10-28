<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Koordinat;
use App\Koordinatp;
use App\Pekerjaan;

class KoordinatController extends Controller {

public function index(){
	$datakoordinat = Koordinat::all();
	return view('koordinat/koordinatlist',['datakoordinat' => $datakoordinat]);
}

public function insert($idpekerjaan){
	$pekerjaan = Pekerjaan::find($idpekerjaan);
	$datakoordinat = Koordinat::where('idpekerjaan', $idpekerjaan) -> orderby('grup','asc') -> get();
	return view('koordinat/koordinatform',['action' => 'insert' , 'pekerjaan' => $pekerjaan, 'datakoordinat' => $datakoordinat, 'edit' => 'Y']);
}

public function update($idkoordinat){
	$koordinat = Koordinat::find($idkoordinat);
	$pekerjaan = Pekerjaan::find($koordinat->idpekerjaan);
	$datakoordinat = Koordinat::where('idpekerjaan', $koordinat->idpekerjaan) -> orderby('grup','asc') ->get();
	return view('koordinat/koordinatform',['row' => $koordinat,'action' => 'update', 'pekerjaan' => $pekerjaan, 'datakoordinat' => $datakoordinat, 'edit' => 'Y']);
}

public function delete($idkoordinat){
	$koordinat = Koordinat::find($idkoordinat);
	$pekerjaan = Pekerjaan::find($koordinat->idpekerjaan);
	$datakoordinat = Koordinat::where('idpekerjaan', $koordinat->idpekerjaan) -> orderby('grup','asc') -> get();
	return view('koordinat/koordinatform',['row' => $koordinat,'action' => 'delete', 'pekerjaan' => $pekerjaan, 'datakoordinat' => $datakoordinat, 'edit' => 'Y']);
}

public function singkronkoordinat($idpekerjaan){
	Koordinat::where('idpekerjaan', $idpekerjaan) -> delete();
	$datakoordinatp = Koordinatp::where('idpekerjaan', $idpekerjaan) -> orderby('grup','asc') -> get();
	foreach ($datakoordinatp as $koodinatp) {
		$koordinat = new Koordinat;
		$koordinat -> idpekerjaan = $koodinatp -> idpekerjaan;
		$koordinat -> grup = $koodinatp -> grup;
		$koordinat -> latkoor = $koodinatp -> latkoor;
		$koordinat -> lngkoor = $koodinatp -> lngkoor;
		$koordinat -> modified_by = session() -> get('username');
		$koordinat -> save();

		$koordinatp = Koordinatp::find($koodinatp -> idkoordinatp);
		$koordinatp -> status = 'Singkron';
		$koordinatp -> save();
	}
	return redirect('/pekerjaanmonev/'.$idpekerjaan);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$koordinat = new Koordinat;
		// $koordinat -> idkoordinat = $request -> idkoordinat;
		$koordinat -> idpekerjaan = $request -> idpekerjaan;
		$koordinat -> grup = $request -> grup;
		$koordinat -> latkoor = $request -> latkoor;
		$koordinat -> lngkoor = $request -> lngkoor;
		$koordinat -> modified_by = session() -> get('username');
		// $koordinat -> created_at = $request -> created_at;
		// $koordinat -> updated_at = $request -> updated_at;
		$koordinat -> save();
	}
	else if($request -> action == 'update'){
		$koordinat = Koordinat::find($request -> idkoordinat);
		// $koordinat -> idkoordinat = $request -> idkoordinat;
		$koordinat -> idpekerjaan = $request -> idpekerjaan;
		$koordinat -> grup = $request -> grup;
		$koordinat -> latkoor = $request -> latkoor;
		$koordinat -> lngkoor = $request -> lngkoor;
		$koordinat -> modified_by = session() -> get('username');
		// $koordinat -> created_at = $request -> created_at;
		// $koordinat -> updated_at = $request -> updated_at;
		$koordinat -> save();
	}
	else if($request -> action == 'delete'){
		$koordinat = Koordinat::find($request -> idkoordinat);
		$koordinat -> delete();
	}
	return redirect('/pekerjaanmonev/'.$request -> idpekerjaan);
}

}
