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
	$datarole = Lov::where('kategori','role')->orderby('value')->get();
	$datausername = Username::orderby('username')->get();
	return view('username/usernameform',['action' => 'insert','datarole' => $datarole,'datausername' => $datausername]);
}

public function update($idusername){
	$username = Username::find($idusername);
	$datarole = Lov::where('kategori','role')->orderby('value')->get();
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
		$namafilebaru = time().'.'.$request->photo->getClientOriginalExtension();
    //proses upload
    $request->photo->move(public_path('dataunggah/gambar'), $namafilebaru);

		$username = new Username;
		// $username -> idusername = $request -> idusername;
		$username -> username = $request -> username;
		$username -> name = $request -> name;
		$username -> email = $request -> email;
		$username -> role = $request -> role;
		$username -> photo = $namafilebaru;
		$username -> modified_by = session()->get('username');
		$username -> password = md5($request -> password);
		// $username -> created_at = $request -> created_at;
		// $username -> updated_at = $request -> updated_at;
		$username -> save();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menambahkan data pengguna';
    $log -> keterangan = json_encode($username);
    $log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();


	}
	else if($request -> action == 'update'){
		if(isset($request->photo) && $request->photo!="")
		{
      $namafilebaru = time().'.'.$request->photo->getClientOriginalExtension();
      $request->photo->move(public_path('dataunggah/gambar'), $namafilebaru);
      if (file_exists(public_path('dataunggah/gambar').'/'.$request->photolama) && is_file(public_path('dataunggah/gambar').'/'.$request->photolama))
      {
        unlink(public_path('dataunggah/gambar').'/'.$request->photolama);
      }
    }
    else
    {
      $namafilebaru = $request->photolama;
    }

		$username = Username::find($request -> idusername);
		$keterangan = "Data Lama :<br>" . json_encode($username);
		// $username -> idusername = $request -> idusername;
		$username -> username = $request -> username;
		$username -> name = $request -> name;
		$username -> email = $request -> email;
		$username -> role = $request -> role;
		$username -> photo = $namafilebaru;
		$username -> modified_by = session()->get('username');
		if($request -> password != ""){
			$username -> password = md5($request -> password);
		}
		// $username -> created_at = $request -> created_at;
		// $username -> updated_at = $request -> updated_at;
		$username -> save();

		$keterangan .= "<br>Data Baru :<br>" . json_encode($username);

		$log = new Log;
    $log -> aktivitas = 'Mengedit data pengguna';
    $log -> keterangan = $keterangan;
    $log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();

	}
	else if($request -> action == 'delete'){
		$username = Username::find($request -> idusername);

		$log = new Log;
    $log -> aktivitas = 'Menghapus data pengguna';
    $log -> keterangan = json_encode($username);
    $log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();

    $username -> delete();
	}
	return redirect('/username');
}
}
