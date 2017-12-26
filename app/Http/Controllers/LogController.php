<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Log;

class LogController extends Controller {

public function index(){
	$datalog = Log::orderBy('updated_at', 'desc')->paginate(15);
	return view('log/loglist',['datalog' => $datalog]);
}

public function insert(){
	return view('log/logform',['action' => 'insert']);
}

public function update($idlog){
	$log = Log::find($idlog);
	return view('log/logform',['row' => $log,'action' => 'update']);
}

public function delete($idlog){
	$log = Log::find($idlog);
	return view('log/logform',['row' => $log,'action' => 'delete']);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$log = new Log;
		// $log -> idlog = $request -> idlog;
		$log -> aktivitas = $request -> aktivitas;
		$log -> keterangan = $request -> keterangan;
		$log -> modified_by = session()->get('username');
		// $log -> created_at = $request -> created_at;
		// $log -> updated_at = $request -> updated_at;
		$log -> save();
	}
	else if($request -> action == 'update'){
		$log = Log::find($request -> idlog);
		// $log -> idlog = $request -> idlog;
		$log -> aktivitas = $request -> aktivitas;
		$log -> keterangan = $request -> keterangan;
		$log -> modified_by = session()->get('username');
		// $log -> created_at = $request -> created_at;
		// $log -> updated_at = $request -> updated_at;
		$log -> save();
	}
	else if($request -> action == 'delete'){
		$log = Log::find($request -> idlog);
		$log -> delete();
	}
	return redirect('/log');
}
}
