<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\SK;
use App\Lov;
use App\Penjabat;

class SKController extends Controller {

public function index(){
	$datask = SK::where('tahun', session()->get('ta'))->orderby('tglsk','asc')->get();
	return view('sk/sklist',['datask' => $datask]);
}

public function insert(){
	$datata = Lov::where('kategori','ta')->orderby('value','desc')->get();
	return view('sk/skform',['action' => 'insert', 'datata' => $datata ]);
}

public function update($idsk){
	$sk = SK::find($idsk);
	$datata = Lov::where('kategori','ta')->orderby('value','desc')->get();
	return view('sk/skform',['row' => $sk,'action' => 'update', 'datata' => $datata]);
}

public function delete($idsk){
	$sk = SK::find($idsk);
	return view('sk/skform',['row' => $sk,'action' => 'delete']);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$sk = new SK;
		// $sk -> idsk = $request -> idsk;
		$sk -> nosk = $request -> nosk;
		$sk -> namask = $request -> namask;
		$sk -> tglsk = $request -> tglsk;
		$sk -> tahun = $request -> tahun;
		$sk -> modified_by = $request -> session() -> get('username');
		// $sk -> created_at = $request -> created_at;
		// $sk -> updated_at = $request -> updated_at;
		$sk -> save();
	}
	else if($request -> action == 'update'){
		$sk = SK::find($request -> idsk);
		// $sk -> idsk = $request -> idsk;
		$sk -> nosk = $request -> nosk;
		$sk -> namask = $request -> namask;
		$sk -> tglsk = $request -> tglsk;
		$sk -> tahun = $request -> tahun;
		$sk -> modified_by = session() -> get('username');
		// $sk -> created_at = $request -> created_at;
		// $sk -> updated_at = $request -> updated_at;
		$sk -> save();
	}
	else if($request -> action == 'delete'){
		$sk = SK::find($request -> idsk);
		Penjabat::where('idsk', $request -> idsk)->delete();
		$sk -> delete();
	}
	return redirect('/sk');
}
}
