<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Username;

class UsernameController extends Controller {

public function index(){
	$rows = Username::all();
	return view('username/usernamelist',['rows' => $rows]);
}

public function insert(){
	return view('username/usernameform',['action' => 'insert']);
}

public function update($idusername){
	$username = Username::find($idusername);
	return view('username/usernameform',['row' => $username,'action' => 'update']);
}

public function delete($idusername){
	$username = Username::find($idusername);
	return view('username/usernameform',['row' => $username,'action' => 'delete']);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$username = new Username;
		// $username -> idusername = $request -> idusername;
		$username -> username = $request -> username;
		$username -> name = $request -> name;
		$username -> email = $request -> email;
		$username -> role = $request -> role;
		$username -> password = $request -> password;
		// $username -> created_at = $request -> created_at;
		// $username -> updated_at = $request -> updated_at;
		$username -> save();
	}
	else if($request -> action == 'update'){
		$username = Username::find($request -> idusername);
		// $username -> idusername = $request -> idusername;
		$username -> username = $request -> username;
		$username -> name = $request -> name;
		$username -> email = $request -> email;
		$username -> role = $request -> role;
		$username -> password = $request -> password;
		// $username -> created_at = $request -> created_at;
		// $username -> updated_at = $request -> updated_at;
		$username -> save();
	}
	else if($request -> action == 'delete'){
		$username = Username::find($request -> idusername);
		$username -> delete();
	}
	return redirect('/username');
}
}
