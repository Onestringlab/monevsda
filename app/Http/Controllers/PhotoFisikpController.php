<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PhotoFisikp;
use App\LaporanFisikp;

class PhotoFisikpController extends Controller {

	public function index(){
		$rows = PhotoFisikp::all();
		return view('photofisikp/photofisikplist',['rows' => $rows]);
	}

	public function insert($idlaporanfisikp){
		$laporanfisikp = LaporanFisikp::where('idlaporanfisikp', $idlaporanfisikp)->first();
		return view('photofisikp/photofisikpform',['action' => 'insert', 'laporanfisikp' => $laporanfisikp, 'pekerjaan' => $laporanfisikp->pekerjaan ]);
	}

	public function update($idphotofisikp){
		$photofisikp = PhotoFisikp::find($idphotofisikp);
		$laporanfisikp = LaporanFisikp::where('idlaporanfisikp', $photofisikp -> idlaporanfisikp)->first();
		return view('photofisikp/photofisikpform',['photofisikp' => $photofisikp, 'laporanfisikp' => $laporanfisikp, 'pekerjaan' => $laporanfisikp->pekerjaan, 'action' => 'update']);
	}

	public function delete($idphotofisikp){
		$photofisikp = PhotoFisikp::find($idphotofisikp);
		$laporanfisikp = LaporanFisikp::where('idlaporanfisikp', $photofisikp -> idlaporanfisikp)->first();
		return view('photofisikp/photofisikpform',['photofisikp' => $photofisikp, 'laporanfisikp' => $laporanfisikp, 'pekerjaan' => $laporanfisikp -> pekerjaan, 'action' => 'delete']);
	}

	public function manage(Request $request){
		if($request -> action == 'insert'){
			$request->validate([
		    'judul' => 'required',
		    'photofisik' => 'required'
		  ],
	    [
	      'judul.required' => "Harus Diisi",
	      'photofisik.required' => "Harus Diisi",
	      // 'photofisik.mimes' => "File Gambar"
	    ]);
	  	$namafilebaru = time().'.'.$request -> photofisik -> getClientOriginalExtension();
    	$request -> photofisik -> move(public_path('dataunggah/gambar'), $namafilebaru);

			$photofisikp = new PhotoFisikp;
			$photofisikp -> idlaporanfisikp = $request -> idlaporanfisikp;
			$photofisikp -> judul = $request -> judul;
			$photofisikp -> photofisik = $namafilebaru;
			$photofisikp -> status = 'Diunggah';
			$photofisikp -> modified_by = session() -> get('username');
			$photofisikp -> save();
		}
		else if($request -> action == 'update'){
			if(isset($request->photofisik) && $request->photofisik!="")
			{
	      $namafilebaru = time().'.'.$request->photofisik->getClientOriginalExtension();
	      $request->photofisik->move(public_path('dataunggah/gambar'), $namafilebaru);
	      if (file_exists(public_path('dataunggah/gambar').'/'.$request->photofisiklama))
	      {
	        unlink(public_path('dataunggah/gambar').'/'.$request->photofisiklama);
	      }
	    }
	    else
	    {
	      $namafilebaru = $request->photofisiklama;
	    }
			$photofisikp = PhotoFisikp::find($request -> idphotofisikp);
			$photofisikp -> idlaporanfisikp = $request -> idlaporanfisikp;
			$photofisikp -> judul = $request -> judul;
			$photofisikp -> photofisik = $namafilebaru;
			$photofisikp -> status = 'Diunggah';
			$photofisikp -> modified_by = session() -> get('username');
			$photofisikp -> save();
		}
		else if($request -> action == 'delete'){
			$photofisikp = PhotoFisikp::find($request -> idphotofisikp);
			if (file_exists(public_path('dataunggah/gambar').'/'.$request->photofisiklama))
	    {
	      unlink(public_path('dataunggah/gambar').'/'.$request->photofisiklama);
	    }
			$photofisikp -> delete();
		}
		return redirect('/laporanfisikp/'. $photofisikp -> laporanfisikp -> idpekerjaan);
	}
}
