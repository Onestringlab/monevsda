<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Log;
use App\Lov;
use App\Username;

class UsernameController extends Controller {

public function index(){
	$datausername = Username::orderby('username')->get();
	return view('username/usernamelist',['datausername' => $datausername]);
}

public function insert(){
	$datarole = Lov::where('kategori','role')->get();
	$datausername = Username::orderby('username')->get();
	return view('username/usernameform',['action' => 'insert','datarole' => $datarole,'datausername' => $datausername]);
}

public function update($idusername){
	$username = Username::find($idusername);
	$datarole = Lov::where('kategori','role')->get();
	$datausername = Username::orderby('username')->get();
	return view('username/usernameform',['row' => $username,'action' => 'update','datarole' => $datarole, 'datausername' => $datausername]);
}

public function delete($idusername){
	$username = Username::find($idusername);
	$datausername = Username::orderby('username')->get();
	return view('username/usernameform',['row' => $username, 'action' => 'delete', 'datausername' => $datausername]);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$username = new Username;
		// $username -> idusername = $request -> idusername;
		$username -> username = $request -> username;
		$username -> name = $request -> name;
		$username -> email = $request -> email;
		$username -> role = $request -> role;
		$username -> modified_by = session()->get('username');
		$username -> password = md5($request -> password);
		// $username -> created_at = $request -> created_at;
		// $username -> updated_at = $request -> updated_at;
		$username -> save();



		//data log
    $log = new Log;
    $log -> aktivitas = 'Menambahkan data pengguna';
    $log -> keterangan = 'Data : '.$request -> username.', '.$request -> name;
    $log -> modified_by = $request->session()->get('username');
    $log -> save();


	}
	else if($request -> action == 'update'){
		$username = Username::find($request -> idusername);
		// $username -> idusername = $request -> idusername;
		$username -> username = $request -> username;
		$username -> name = $request -> name;
		$username -> email = $request -> email;
		$username -> role = $request -> role;
		$username -> modified_by = session()->get('username');
		if($request -> password != ""){
			$username -> password = md5($request -> password);
		}
		// $username -> created_at = $request -> created_at;
		// $username -> updated_at = $request -> updated_at;
		$username -> save();

		$log = new Log;
    $log -> aktivitas = 'Merubah data pengguna';
    $log -> keterangan = 'Data : '.$request -> username.', '.$request -> name;
    $log -> modified_by = $request->session()->get('username');
    $log -> save();

	}
	else if($request -> action == 'delete'){
		$username = Username::find($request -> idusername);

		$log = new Log;
    $log -> aktivitas = 'Menghapus data pengguna';
    $log -> keterangan = 'Data : '.$username -> username.', '.$username -> name;
    $log -> modified_by = $request->session()->get('username');
    $log -> save();

    $username -> delete();
	}
	return redirect('/username');
}
}
