<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pengawas;
use App\Konsultan;
use App\Pekerjaan;

class PengawasController extends Controller {

	public function index(){
		$rows = Pengawas::all();
		return view('pengawas/pengawaslist',['rows' => $rows]);
	}

	public function insert(){
		$datakonsultan = Konsultan::orderby('nama','asc')->where('status','aktif')->get();
		return view('pengawas/pengawasform',['action' => 'insert','datakonsultan' => $datakonsultan]);
	}

	public function update($idpengawas){
		$pengawas = Pengawas::find($idpengawas);
	// dd($pengawas);
		$datakonsultan = Konsultan::orderby('nama','asc')->where('status','aktif')->get();
		return view('pengawas/pengawasform',['row' => $pengawas,'action' => 'update','datakonsultan' => $datakonsultan]);
	}

	public function detail($idpengawas){
		$pengawas = Pengawas::find($idpengawas);
		return view('pengawas/pengawasform',['row' => $pengawas,'action' => 'detail']);
	}

	public function delete($idpengawas){
		$pengawas = Pengawas::find($idpengawas);
		return view('pengawas/pengawasform',['row' => $pengawas,'action' => 'delete']);
	}

	public function manage(Request $request){
		if($request -> action == 'insert'){
			$namafilebaru = time().'.'.$request->photo->getClientOriginalExtension();
    //proses upload
			$request->photo->move(public_path('dataunggah/gambar'), $namafilebaru);
			$pengawas = new Pengawas;
			$pengawas -> idpengawas = $request -> idpengawas;
			$pengawas -> idkonsultan = $request -> idkonsultan;
			$pengawas -> username = $request -> username;
			$pengawas -> name = $request -> name;
			$pengawas -> email = $request -> email;
			$pengawas -> password = md5($request -> password);
			$pengawas -> photo = $namafilebaru;
			$pengawas -> modified_by = $request->session()->get('username');
		// $pengawas -> created_at = $request -> created_at;
		// $pengawas -> updated_at = $request -> updated_at;
			$pengawas -> save();
		// dd($pengawas);
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
			$pengawas = Pengawas::find($request -> idpengawas);
		// $pengawas -> idpengawas = $request -> idpengawas;
			$pengawas -> idkonsultan = $request -> idkonsultan;
			$pengawas -> username = $request -> username;
			$pengawas -> name = $request -> name;
			$pengawas -> email = $request -> email;
			if($request -> password != ""){
				$pengawas -> password = md5($request -> password);
			}
			$pengawas -> photo = $namafilebaru;
			$pengawas -> modified_by = $request->session()->get('username');
		// $pengawas -> created_at = $request -> created_at;
		// $pengawas -> updated_at = $request -> updated_at;
			$pengawas -> save();
		// dd($pengawas);
		}
		else if($request -> action == 'delete'){
			$pengawas = Pengawas::find($request -> idpengawas);

			if (file_exists(public_path('dataunggah/gambar').'/'.$request->photo))
			{
				unlink(public_path('dataunggah/gambar').'/'.$request->photo);
			}

			$pengawas -> delete();
		}
		return redirect('/pengawas');
	}

	public function pekerjaanpengawas(){
		$datapekerjaan = Pekerjaan::where('ta', session()->get('ta'))->where('konpengawas',session()->get('pengawas'))->orderBy('namapekerjaan','asc')->get();
		return view('pengawaspekerjaan/pekerjaanlist',['datapekerjaan' => $datapekerjaan]);
	}
}
