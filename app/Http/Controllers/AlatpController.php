<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Alatp;
use App\Pekerjaan;

class AlatpController extends Controller {

	public function index($idpekerjaan){
		$rows = Alatp::where('idpekerjaan',$idpekerjaan)->orderby('jenis','asc')->get();
		$pekerjaan = Pekerjaan::find($idpekerjaan);
		return view('alatp/alatplist',['rows' => $rows,'idpekerjaan' => $idpekerjaan, 'pekerjaan' => $pekerjaan]);
	}

	public function insert($idpekerjaan){
		$pekerjaan = Pekerjaan::find($idpekerjaan);
		$rows = Alatp::where('idpekerjaan',$idpekerjaan)->orderby('jenis','asc')->get();
		return view('alatp/alatpform',['action' => 'insert', 'pekerjaan' => $pekerjaan,'idpekerjaan' => $idpekerjaan, 'rows' => $rows, 'edit' => 'Y']);
	}

	public function update($idalatp){
		$alatp = Alatp::find($idalatp);
		$pekerjaan = Pekerjaan::find($alatp->idpekerjaan);
		return view('alatp/alatpform',['row' => $alatp,'action' => 'update', 'pekerjaan' => $pekerjaan]);
	}

	public function detail($idalatp){
		$alatp = Alatp::find($idalatp);
		$pekerjaan = Pekerjaan::find($alatp->idpekerjaan);
		return view('alatp/alatpform',['row' => $alatp,'action' => 'detail', 'pekerjaan' => $pekerjaan]);
	}

	public function delete($idalatp){
		$alatp = Alatp::find($idalatp);
		$pekerjaan = Pekerjaan::find($alatp->idpekerjaan);
		return view('alatp/alatpform',['row' => $alatp,'action' => 'delete', 'pekerjaan' => $pekerjaan]);
	}

	public function manage(Request $request){
		if($request -> action == 'insert'){
			$request->validate(['photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
			['photo.image' => 'Isi dengan file gambar!']);
		  $namafilebaru = time().'.'.$request->photo->getClientOriginalExtension();
	    //proses upload
	    $request->photo->move(public_path('dataunggah/gambar'), $namafilebaru);

			$alatp = new Alatp;
			$alatp -> idalatp = $request -> idalatp;
			$alatp -> idpekerjaan = $request -> idpekerjaan;
			$alatp -> jenis = $request -> jenis;
			$alatp -> merk = $request -> merk;
			$alatp -> tipe = $request -> tipe;
			$alatp -> keterangan = $request -> keterangan;
			$alatp -> photo = $namafilebaru;
			$alatp -> status = $request -> status;
			$alatp -> modified_by = session() -> get('username');
			// $alatp -> created_at = $request -> created_at;
			// $alatp -> updated_at = $request -> updated_at;
			$alatp -> save();
		}
		else if($request -> action == 'update'){
			if(isset($request->photo) && $request->photo!="")
			{
	      $request->validate(['photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
				['photo.image' => 'Isi dengan file gambar!']);
	      $namafilebaru = time().'.'.$request->photo->getClientOriginalExtension();
	      $request->photo->move(public_path('dataunggah/gambar'), $namafilebaru);
	      if (file_exists(public_path('dataunggah/gambar').'/'.$request->photolama))
	      {
	        unlink(public_path('dataunggah/gambar').'/'.$request->photolama);
	      }
	    }
	    else
	    {
	      $namafilebaru = $request->photolama;
	    }
			$alatp = Alatp::find($request -> idalatp);
			$alatp -> idalatp = $request -> idalatp;
			$alatp -> idpekerjaan = $request -> idpekerjaan;
			$alatp -> jenis = $request -> jenis;
			$alatp -> merk = $request -> merk;
			$alatp -> tipe = $request -> tipe;
			$alatp -> keterangan = $request -> keterangan;
			$alatp -> photo = $namafilebaru;
			$alatp -> status = $request -> status;
			$alatp -> modified_by = session() -> get('username');
			// $alatp -> created_at = $request -> created_at;
			// $alatp -> updated_at = $request -> updated_at;
			$alatp -> save();
		}
		else if($request -> action == 'delete'){
			$alatp = Alatp::find($request -> idalatp);
			if (file_exists(public_path('dataunggah/gambar').'/'.$request->photolama))
    	{
     		unlink(public_path('dataunggah/gambar').'/'.$request->photolama);
	    }
				$alatp -> delete();
			}
		return redirect('/alatp/'.$alatp -> idpekerjaan);
	}
}
