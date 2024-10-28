<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Log;
use App\Lov;
use App\Username;
use App\Pengawas;

class LoginController extends Controller {

public function index()
{
	$datatahun = Lov::where('kategori','ta')->orderby('value','desc')->get();
  return view('username/usernamelogin',['datatahun' => $datatahun]);
}

public function ceklogin(Request $request)
{
	# Cek Username dan LogicException
  $pengguna = Username::where('username',$request->username)->where('password',md5($request->password))->first();
  $pengawas = Pengawas::where('username',$request->username)->where('password',md5($request->password))->first();

  if($pengguna){
  // if(count($pengguna)>0){ diubah pada tanggal 21-05-22
    $request->session()->put('name',$pengguna->name);
    $request->session()->put('username',$pengguna->username);
    $request->session()->put('role',$pengguna->role);
    $request->session()->put('photo',$pengguna->photo);
    $request->session()->put('ta',$request->ta);

    //data log
    $log = new Log;
    $log -> aktivitas = $pengguna->username .' login ke aplikasi';
    $log -> keterangan = $pengguna->role;
    $log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
    return redirect('/dashboard1');

  }elseif($pengawas) {
  // }elseif (count($pengawas)>0) { diubah pada tanggal 21-05-22
    $request->session()->put('pengawas',$pengawas->konsultan['nama']);
    $request->session()->put('name',$pengawas->name);
    $request->session()->put('username',$pengawas->username);
    $request->session()->put('role','Pengawas');
    $request->session()->put('photo',$pengawas->photo);
    $request->session()->put('ta',$request->ta);
    return redirect('/app');

  }else{
    return redirect('/halamanlogin');
  }
}

public function keluar()
  {
    $username = '';
    if(session()->has('username')){
      $username = session()->get('username');
    }

    $log = new Log;
    $log -> aktivitas = $username .' logout dari aplikasi';
    $log -> keterangan = 'Berhasil';
    $log -> tahun = session() -> get('ta');
    $log -> modified_by = $username;
    $log -> save();

    session()->forget('name');
    session()->forget('username');
    session()->forget('photo');
    session()->forget('role');


    return redirect ('/halamanlogin');
  }
}