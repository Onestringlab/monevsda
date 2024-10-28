<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\SK;
use App\Lov;
use App\Penjabat;

class PenjabatController extends Controller {

public function index($idsk){
	$datapenjabat = Penjabat::where('idsk', $idsk)->with('sk')->get();
	return view('penjabat/penjabatlist',['datapenjabat' => $datapenjabat, 'idsk' => $idsk]);
}

public function insert($idsk){
	$datastatus = Lov::where('kategori','status')->get();
	$datata = Lov::where('kategori','ta')->orderby('value','desc')->get();
	return view('penjabat/penjabatform',['action' => 'insert', 'idsk' => $idsk, 'datastatus' => $datastatus, 'datata' => $datata ]);
}

public function update($idpenjabat){
	$penjabat = Penjabat::find($idpenjabat);
	$datastatus = Lov::where('kategori','status')->orderby('value','desc')->get();
	$datata = Lov::where('kategori','ta')->get();
	return view('penjabat/penjabatform',['row' => $penjabat,'action' => 'update', 'datastatus' => $datastatus, 'datata' => $datata]);
}

public function delete($idpenjabat){
	$penjabat = Penjabat::find($idpenjabat);
	return view('penjabat/penjabatform',['row' => $penjabat,'action' => 'delete']);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$penjabat = new Penjabat;
		// $penjabat -> idpenjabat = $request -> idpenjabat;
		$penjabat -> idsk = $request -> idsk;
		$penjabat -> nip = $request -> nip;
		$penjabat -> namapenjabat = $request -> namapenjabat;
		$penjabat -> jabatan = $request -> jabatan;
		$penjabat -> tahun = $request -> tahun;
		$penjabat -> status = $request -> status;
		$penjabat -> modified_by = session() -> get('username');
		// $penjabat -> created_at = $request -> created_at;
		// $penjabat -> updated_at = $request -> updated_at;
		$penjabat -> save();
	}
	else if($request -> action == 'update'){
		$penjabat = Penjabat::find($request -> idpenjabat);
		// $penjabat -> idpenjabat = $request -> idpenjabat;
		// $penjabat -> idsk = $request -> idsk;
		$penjabat -> nip = $request -> nip;
		$penjabat -> namapenjabat = $request -> namapenjabat;
		$penjabat -> jabatan = $request -> jabatan;
		$penjabat -> tahun = $request -> tahun;
		$penjabat -> status = $request -> status;
		$penjabat -> modified_by = session() -> get('username');
		// $penjabat -> created_at = $request -> created_at;
		// $penjabat -> updated_at = $request -> updated_at;
		$penjabat -> save();
	}
	else if($request -> action == 'delete'){
		$penjabat = Penjabat::find($request -> idpenjabat);
		$penjabat -> delete();
	}
	return redirect('/penjabat/'.$request -> idsk);
}
}
