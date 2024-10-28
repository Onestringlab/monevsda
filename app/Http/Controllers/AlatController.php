<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Alat;
use App\Alatp;
use App\Pekerjaan;


class AlatController extends Controller {

public function index(){
	$rows = Alat::all();
	return view('alat/alatlist',['rows' => $rows]);
}

public function insert($idpekerjaan){
	$pekerjaan = Pekerjaan::find($idpekerjaan);
	$dataalat = Alat::where('idpekerjaan', $idpekerjaan)->get();
	return view('alat/alatform',['action' => 'insert', 'pekerjaan' => $pekerjaan, 'dataalat' => $dataalat, 'edit' => 'Y']);
}

public function update($idalat){
	$alat = Alat::find($idalat);
	$pekerjaan = Pekerjaan::find($alat->idpekerjaan);
	$dataalat = Alat::where('idpekerjaan', $alat->idpekerjaan)->get();
	$dataalatp = Alatp::where('idpekerjaan',$alat -> idpekerjaan)->orderby('jenis','asc')->get();
	return view('alat/alatform',['row' => $alat,'action' => 'update','pekerjaan' => $pekerjaan, 'dataalat' => $dataalat, 'dataalatp' => $dataalatp, 'edit' => 'Y']);
}

public function delete($idalat){
	$alat = Alat::find($idalat);
	$pekerjaan = Pekerjaan::find($alat->idpekerjaan);
	$dataalat = Alat::where('idpekerjaan', $alat -> idpekerjaan)->get();
	$dataalatp = Alatp::where('idpekerjaan',$alat -> idpekerjaan)->orderby('jenis','asc')->get();
	return view('alat/alatform',['row' => $alat,'action' => 'delete','pekerjaan' => $pekerjaan, 'dataalat' => $dataalat, 'dataalatp' => $dataalatp, 'edit' => 'Y']);
}

public function singkronalat($idpekerjaan){
	Alat::where('idpekerjaan',$idpekerjaan)->delete();
	$dataalatp = Alatp::where('idpekerjaan', $idpekerjaan)->get();
	foreach ($dataalatp as $alatp) {
		$alat = Alat::where('photo', $alatp->photo)->get();
		if(count($alat) == 0){
			$alat = new Alat;
			$alat -> idpekerjaan = $alatp -> idpekerjaan;
			$alat -> jenis = $alatp -> jenis;
			$alat -> merk = $alatp -> merk;
			$alat -> tipe = $alatp -> tipe;
			$alat -> keterangan = $alatp -> keterangan;
			$alat -> photo = $alatp -> photo;
			$alat -> modified_by = session() -> get('username');
			$alat -> save();

			$alatp = Alatp::find($alatp -> idalatp);
			$alatp -> status = 'Singkron';
			$alatp -> save();
		}
	}
	return redirect('/pekerjaanmonev/'.$idpekerjaan);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$request->validate([
		  'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		],
		[
			'photo.image' => 'Isi dengan file gambar!'
		]
		);
	  $namafilebaru = time().'.'.$request->photo->getClientOriginalExtension();
    //proses upload
    $request->photo->move(public_path('dataunggah/gambar'), $namafilebaru);
		$alat = new Alat;
		// $alat -> idalat = $request -> idalat;
		$alat -> idpekerjaan = $request -> idpekerjaan;
		$alat -> jenis = $request -> jenis;
		$alat -> merk = $request -> merk;
		$alat -> tipe = $request -> tipe;
		$alat -> keterangan = $request -> keterangan;
		$alat -> photo = $namafilebaru;
		$alat -> modified_by = session() -> get('username');
		// $alat -> created_at = $request -> created_at;
		// $alat -> updated_at = $request -> updated_at;
		$alat -> save();
	}
	else if($request -> action == 'update'){
		if(isset($request->photo) && $request->photo!="")
		{
      $request->validate([
			  	'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
				],
				[
					'photo.image' => 'Isi dengan file gambar!'
				]
			);
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
		$alat = Alat::find($request -> idalat);
		// $alat -> idalat = $request -> idalat;
		$alat -> idpekerjaan = $request -> idpekerjaan;
		$alat -> jenis = $request -> jenis;
		$alat -> merk = $request -> merk;
		$alat -> tipe = $request -> tipe;
		$alat -> keterangan = $request -> keterangan;
		$alat -> photo = $namafilebaru;
		$alat -> modified_by = session() -> get('username');
		// $alat -> created_at = $request -> created_at;
		// $alat -> updated_at = $request -> updated_at;
		$alat -> save();
	}
	else if($request -> action == 'delete'){
		$alat = Alat::find($request -> idalat);
		if (file_exists(public_path('dataunggah/gambar').'/'.$request->photolama))
    {
      unlink(public_path('dataunggah/gambar').'/'.$request->photolama);
    }
		$alat -> delete();
	}
	return redirect('/pekerjaanmonev/'.$request -> idpekerjaan);
}
}
