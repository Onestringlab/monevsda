<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pekerjaan;
use App\Koordinatp;


class KoordinatpController extends Controller {

public function index($idpekerjaan){
	$rows = Koordinatp::where('idpekerjaan',$idpekerjaan)->orderby('grup','asc')->get();
	$pekerjaan = Pekerjaan::find($idpekerjaan);
	return view('koordinatp/koordinatplist',['rows' => $rows, 'idpekerjaan' => $idpekerjaan, 'pekerjaan' => $pekerjaan]);
}

public function insert($idpekerjaan){
	$pekerjaan = Pekerjaan::find($idpekerjaan);
	return view('koordinatp/koordinatpform',['action' => 'insert', 'idpekerjaan' => $idpekerjaan, 'pekerjaan' => $pekerjaan]);
}

public function update($idkoordinatp){
	$koordinatp = Koordinatp::find($idkoordinatp);
	$pekerjaan = Pekerjaan::find($koordinatp->idpekerjaan);
	return view('koordinatp/koordinatpform',['row' => $koordinatp,'action' => 'update', 'pekerjaan' => $pekerjaan]);
}

public function detail($idkoordinatp){
	$koordinatp = Koordinatp::find($idkoordinatp);
	$pekerjaan = Pekerjaan::find($koordinatp->idpekerjaan);
	return view('koordinatp/koordinatpform',['row' => $koordinatp,'action' => 'detail', 'pekerjaan' => $pekerjaan]);
}

public function delete($idkoordinatp){
	$koordinatp = Koordinatp::find($idkoordinatp);
	$pekerjaan = Pekerjaan::find($koordinatp->idpekerjaan);
	return view('koordinatp/koordinatpform',['row' => $koordinatp,'action' => 'delete', 'pekerjaan' => $pekerjaan]);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$koordinatp = new Koordinatp;
		// $koordinatp -> idkoordinatp = $request -> idkoordinatp;
		$koordinatp -> idpekerjaan = $request -> idpekerjaan;
		$koordinatp -> grup = $request -> grup;
		$koordinatp -> latkoor = $request -> latkoor;
		$koordinatp -> lngkoor = $request -> lngkoor;
		$koordinatp -> status = $request -> status;
		$koordinatp -> modified_by = session() -> get('username');
		// $koordinatp -> created_at = $request -> created_at;
		// $koordinatp -> updated_at = $request -> updated_at;
		$koordinatp -> save();
	}
	else if($request -> action == 'update'){
		$koordinatp = Koordinatp::find($request -> idkoordinatp);
		// $koordinatp -> idkoordinatp = $request -> idkoordinatp;
		$koordinatp -> idpekerjaan = $request -> idpekerjaan;
		$koordinatp -> grup = $request -> grup;
		$koordinatp -> latkoor = $request -> latkoor;
		$koordinatp -> lngkoor = $request -> lngkoor;
		$koordinatp -> status = $request -> status;
		$koordinatp -> modified_by = session() -> get('username');
		// $koordinatp -> created_at = $request -> created_at;
		// $koordinatp -> updated_at = $request -> updated_at;
		$koordinatp -> save();
	}
	else if($request -> action == 'delete'){
		$koordinatp = Koordinatp::find($request -> idkoordinatp);
		$koordinatp -> delete();
	}
	return redirect('/koordinatp/'.$koordinatp -> idpekerjaan);
}
}
