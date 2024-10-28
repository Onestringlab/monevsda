<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\PhotoFisik;
use App\LaporanFisik;

class PhotoFisikController extends Controller {

public function index(){
	$dataphotofisik = PhotoFisik::all();
	return view('photofisik/photofisiklist',['dataphotofisik' => $dataphotofisik]);
}

public function insert($idlaporanfisik){
	$laporanfisik = LaporanFisik::where('idlaporanfisik', $idlaporanfisik)->first();
	return view('photofisik/photofisikform',['action' => 'insert', 'laporanfisik' => $laporanfisik, 'pekerjaan' => $laporanfisik->pekerjaan, 'edit' => 'Y']);
}

public function update($idphotofisik){
	$photofisik = PhotoFisik::find($idphotofisik);
	return view('photofisik/photofisikform',['row' => $photofisik,'action' => 'update', 'laporanfisik' => $photofisik->laporanfisik,'pekerjaan' => $photofisik->laporanfisik->pekerjaan, 'edit' => 'Y']);
}

public function delete($idphotofisik){
	$photofisik = PhotoFisik::find($idphotofisik);
	return view('photofisik/photofisikform',['row' => $photofisik,'action' => 'delete' , 'laporanfisik' => $photofisik->laporanfisik,'pekerjaan' => $photofisik->laporanfisik->pekerjaan, 'edit' => 'Y']);
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
	    ]
		);

	  $namafilebaru = time().'.'.$request->photofisik->getClientOriginalExtension();
    //proses upload
    $request->photofisik->move(public_path('dataunggah/gambar'), $namafilebaru);

		$photofisik = new PhotoFisik;
		// $photofisik -> idphotofisik = $request -> idphotofisik;
		$photofisik -> idlaporanfisik = $request -> idlaporanfisik;
		$photofisik -> judul = $request -> judul;
		$photofisik -> photofisik = $namafilebaru;
		$photofisik -> modified_by = session() -> get('username');
		// $photofisik -> created_at = $request -> created_at;
		// $photofisik -> updated_at = $request -> updated_at;
		$photofisik -> save();
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
		$photofisik = PhotoFisik::find($request -> idphotofisik);
		$photofisik -> idlaporanfisik = $request -> idlaporanfisik;
		$photofisik -> judul = $request -> judul;
		$photofisik -> photofisik = $namafilebaru;
		$photofisik -> modified_by = session() -> get('username');
		$photofisik -> save();
	}
	else if($request -> action == 'delete'){
		$photofisik = PhotoFisik::find($request -> idphotofisik);
		if (file_exists(public_path('dataunggah/gambar').'/'.$request->photofisiklama))
    {
      unlink(public_path('dataunggah/gambar').'/'.$request->photofisiklama);
    }
		$photofisik -> delete();
	}
	return redirect('/pekerjaanmonev/'.$request->idpekerjaan);
}
}
