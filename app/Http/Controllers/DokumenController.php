<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Lov;
use App\Log;
use App\Dokumen;
use App\Pekerjaan;

class DokumenController extends Controller {

public function index(){
	$datadokumen = Dokumen::all();
	return view('dokumen/dokumenlist',['datadokumen' => $datadokumen]);
}

public function insert($idpekerjaan){
	$datastatus = Lov::where('kategori','status') -> get();
	$pekerjaan = Pekerjaan::find($idpekerjaan);
	$datadokumen = Dokumen::where('idpekerjaan',$idpekerjaan)->get();
	return view('dokumen/dokumenform',['action' => 'insert', 'pekerjaan' => $pekerjaan, 'datastatus' => $datastatus, 'datadokumen' => $datadokumen, 'edit' => 'Y']);
}

public function update($iddokumen){
	$dokumen = Dokumen::find($iddokumen);
	$datastatus = Lov::where('kategori','status') -> get();
	$pekerjaan = Pekerjaan::find($dokumen->idpekerjaan);
	$datadokumen = Dokumen::where('idpekerjaan',$dokumen->idpekerjaan)->get();
	return view('dokumen/dokumenform',['row' => $dokumen,'action' => 'update', 'datastatus' => $datastatus, 'pekerjaan' => $pekerjaan, 'datadokumen' => $datadokumen, 'edit' => 'Y']);
}

public function delete($iddokumen){
	$dokumen = Dokumen::find($iddokumen);
	$pekerjaan = Pekerjaan::find($dokumen->idpekerjaan);
	$datadokumen = Dokumen::where('idpekerjaan',$dokumen->idpekerjaan)->get();
	return view('dokumen/dokumenform',['row' => $dokumen,'action' => 'delete', 'pekerjaan' => $pekerjaan, 'datadokumen' => $datadokumen, 'edit' => 'Y']);
}

public function manage(Request $request)
{
	if($request -> action == 'insert'){
		$request->validate([
		    'juduldokumen' => 'required',
		    'namafile' => 'required|mimes:xlsx,xls,docx,doc,pdf'
		  ],
	    [
	      'juduldokumen.required' => "Harus Diisi",
	      'namafile.required' => "Harus Diisi",
	      'namafile.mimes' => "File Excel, Word, PDF"
	    ]
		);

	  $namafilebaru = time().'.'.$request->namafile->getClientOriginalExtension();
    //proses upload
    $request->namafile->move(public_path('dataunggah/dokumen'), $namafilebaru);

		$dokumen = new Dokumen;
		// $dokumen -> iddokumen = $request -> iddokumen;
		$dokumen -> idpekerjaan = $request -> idpekerjaan;
		$dokumen -> juduldokumen = $request -> juduldokumen;
		$dokumen -> namafile = $namafilebaru;
		$dokumen -> status = $request -> status;
		$dokumen -> modified_by = session()->get('username');
		// $dokumen -> created_at = $request -> created_at;
		// $dokumen -> updated_at = $request -> updated_at;
		$dokumen -> save();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menambah data dokumen';
    $log -> keterangan = json_encode($dokumen);
		$log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	else if($request -> action == 'update'){
		if(isset($request->namafile) && $request->namafile!="")
		{
      $namafilebaru = time().'.'.$request->namafile->getClientOriginalExtension();
      $request->namafile->move(public_path('dataunggah/dokumen'), $namafilebaru);
      if (file_exists(public_path('dataunggah/dokumen').'/'.$request->namafilelama))
      {
        unlink(public_path('dataunggah/dokumen').'/'.$request->namafilelama);
      }
    }
    else
    {
      $namafilebaru = $request->namafilelama;
    }
		$dokumen = Dokumen::find($request -> iddokumen);
		// $dokumen -> iddokumen = $request -> iddokumen;
		$dokumen -> idpekerjaan = $request -> idpekerjaan;
		$dokumen -> juduldokumen = $request -> juduldokumen;
		$dokumen -> namafile = $namafilebaru;
		$dokumen -> status = $request -> status;
		$dokumen -> modified_by = session()->get('username');
		// $dokumen -> created_at = $request -> created_at;
		// $dokumen -> updated_at = $request -> updated_at;
		$dokumen -> save();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Mengedit data dokumen';
    $log -> keterangan = json_encode($dokumen);
		$log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	else if($request -> action == 'delete'){
		$dokumen = Dokumen::find($request -> iddokumen);
		if (file_exists(public_path('dataunggah/dokumen').'/'.$request->namafilelama))
    {
      unlink(public_path('dataunggah/dokumen').'/'.$request->namafilelama);
    }
		$dokumen -> delete();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menghapus data dokumen';
    $log -> keterangan = json_encode($dokumen);
		$log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	return redirect('/pekerjaanmonev/'.$request -> idpekerjaan);
}

}
