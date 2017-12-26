<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Log;
use App\Username;

class LoginController extends Controller {

public function index()
{
	return view('username/usernamelogin');
}

public function ceklogin(Request $request)
{
	# Cek Username dan LogicException
    $pengguna = Username::where('username',$request->username)->where('password',md5($request->password))->first();

    if(count($pengguna)>0){
      $request->session()->put('name',$pengguna->name);
      $request->session()->put('username',$pengguna->username);
      $request->session()->put('role',$pengguna->role);

      //data log
      $log = new Log;
      $log -> aktivitas = $pengguna->username .' login ke aplikasi';
      $log -> keterangan = $pengguna->role;
      $log -> modified_by = $request->session()->get('username');
      $log -> save();

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
    $log -> modified_by = $username;
    $log -> save();

    session()->forget('name');
    session()->forget('username');
    session()->forget('role');


    return redirect ('/halamanlogin');
  }

}