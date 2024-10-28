<?php
namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\SK;
use App\Lov;
use App\Log;
use App\Alat;
use App\Alatp;
use App\Desa;
use App\Dokumen;
use App\Penjabat;
use App\Pekerjaan;
use App\Konsultan;
use App\Kecamatan;
use App\Koordinat;
use App\Koordinatp;
use App\PhotoFisik;
use App\PhotoFisikp;
use App\LaporanFisik;
use App\LaporanKeuangan;



class PekerjaanController extends Controller {

public function index($idkegiatan){
	$datapekerjaan = Pekerjaan::where('ta', session()->get('ta'))->where('idkegiatan',$idkegiatan)->orderby('namapekerjaan','asc')->get();
	return view('pekerjaan/pekerjaanlist',['datapekerjaan' => $datapekerjaan, 'idkegiatan' => $idkegiatan]);
}

public function insert($idkegiatan){
	$kabupaten = Lov::where('kategori','kabupaten')->first();
	$satuankerja = Lov::where('kategori','satuankerja')->where('status','aktif')->first();
	$tgldpa = Lov::where('kategori','tgldpa')->where('status','aktif')->first();
	$tglrka = Lov::where('kategori','tglrka')->where('status','aktif')->first();
	$skpa = SK::where('namask','PA')->where('tahun',session()->get('ta'))->first();
	$ppk = SK::where('namask','PPK')->where('tahun',session()->get('ta'))->first();
	$pptk = SK::where('namask','PPTK')->where('tahun',session()->get('ta'))->first();
	$pphp = SK::where('namask','PPHP')->where('tahun',session()->get('ta'))->first();
	$pp = SK::where('namask','PP')->where('tahun',session()->get('ta'))->first();
	$databidang = Lov::where('kategori','bidang')->where('status','aktif')->get();
	$datajnspek = Lov::where('kategori','jnspek')->where('status','aktif')->get();
	$datakatpek = Lov::where('kategori','katpek')->where('status','aktif')->get();
	$datata = Lov::where('kategori','ta')->where('status','aktif')->get();
	$datapropeng = Lov::where('kategori','propeng')->where('status','aktif')->get();
	$datathnkon = Lov::where('kategori','thnkon')->where('status','aktif')->get();
	$datasumberdana = Lov::where('kategori','sbrdana')->where('status','aktif')->get();
	$datastatus = Lov::where('kategori','status')->where('status','aktif')->get();
	$datastapek = Lov::where('kategori','stapek')->where('status','aktif')->get();
	$datakonsultan = Konsultan::orderby('nama','asc')->where('status','aktif')->get();
	$datakecamatan = Kecamatan::orderby('nama','asc')->where('status','aktif')->get();
	$datadesa= Desa::orderby('nama','asc')->where('status','aktif')->get();

	return view('pekerjaan/pekerjaanform',['action' => 'insert', 'idkegiatan' => $idkegiatan, 'kabupaten' => $kabupaten, 'satuankerja' => $satuankerja, 'tgldpa' => $tgldpa, 'tglrka' => $tglrka, 'skpa' => $skpa, 'ppk' => $ppk, 'pptk' => $pptk, 'pphp' => $pphp, 'pp' => $pp, 'databidang' => $databidang, 'datajnspek' => $datajnspek, 'datakatpek' => $datakatpek, 'datata' => $datata, 'datapropeng' => $datapropeng, 'datathnkon' => $datathnkon, 'datasumberdana' => $datasumberdana, 'datakonsultan' => $datakonsultan, 'datakecamatan' => $datakecamatan, 'datadesa' => $datadesa, 'datastapek' => $datastapek, 'datastatus' => $datastatus  ]);
}

public function update($idpekerjaan,$data){
	$kabupaten = Lov::where('kategori','kabupaten')->first();
	$satuankerja = Lov::where('kategori','satuankerja')->where('status','aktif')->first();
	$tgldpa = Lov::where('kategori','tgldpa')->where('status','aktif')->first();
	$tglrka = Lov::where('kategori','tglrka')->where('status','aktif')->first();
	$skpa = SK::where('namask','PA')->where('tahun',session()->get('ta'))->first();
	$ppk = SK::where('namask','PPK')->where('tahun',session()->get('ta'))->first();
	$pptk = SK::where('namask','PPTK')->where('tahun',session()->get('ta'))->first();
	$pphp = SK::where('namask','PPHP')->where('tahun',session()->get('ta'))->first();
	$pp = SK::where('namask','PP')->where('tahun',session()->get('ta'))->first();
	$databidang = Lov::where('kategori','bidang')->where('status','aktif')->get();
	$datajnspek = Lov::where('kategori','jnspek')->where('status','aktif')->get();
	$datakatpek = Lov::where('kategori','katpek')->where('status','aktif')->get();
	$datata = Lov::where('kategori','ta')->where('status','aktif')->get();
	$datapropeng = Lov::where('kategori','propeng')->where('status','aktif')->get();
	$datathnkon = Lov::where('kategori','thnkon')->where('status','aktif')->get();
	$datasumberdana = Lov::where('kategori','sbrdana')->where('status','aktif')->get();
	$datastatus = Lov::where('kategori','status')->where('status','aktif')->get();
	$datastapek = Lov::where('kategori','stapek')->where('status','aktif')->get();
	$datakonsultan = Konsultan::orderby('nama','asc')->where('status','aktif')->get();
	$datakecamatan = Kecamatan::orderby('nama','asc')->where('status','aktif')->get();
	$datadesa= Desa::orderby('nama','asc')->where('status','aktif')->get();


	$pekerjaan = Pekerjaan::find($idpekerjaan);
	return view('pekerjaan/pekerjaanform',['row' => $pekerjaan,'action' => 'update', 'kabupaten' => $kabupaten, 'satuankerja' => $satuankerja, 'tgldpa' => $tgldpa, 'tglrka' => $tglrka, 'skpa' => $skpa, 'ppk' => $ppk, 'pptk' => $pptk, 'pphp' => $pphp, 'pp' => $pp, 'databidang' => $databidang, 'datajnspek' => $datajnspek, 'datakatpek' => $datakatpek, 'datata' => $datata, 'datapropeng' => $datapropeng, 'datathnkon' => $datathnkon, 'datasumberdana' => $datasumberdana, 'datakonsultan' => $datakonsultan, 'datakecamatan' => $datakecamatan, 'datadesa' => $datadesa, 'datastapek' => $datastapek, 'datastatus' => $datastatus, 'data' => $data]);
}

public function delete($idpekerjaan,$data){
	$pekerjaan = Pekerjaan::find($idpekerjaan);
	return view('pekerjaan/pekerjaanform',['row' => $pekerjaan,'action' => 'delete', 'data' => $data]);
}

public function detail($idpekerjaan){
	$pekerjaan = Pekerjaan::find($idpekerjaan);
	$datakoordinat = Koordinat::where('idpekerjaan',$idpekerjaan) -> orderby('grup','asc') -> get();
	$dataalat = Alat::where('idpekerjaan',$idpekerjaan)->get();
	$datalaporanfisik = LaporanFisik::where('idpekerjaan',$idpekerjaan) -> orderby('mingguke','asc') -> get();
	$datadokumen = Dokumen::where('idpekerjaan',$idpekerjaan)->get();
	$datalaporankeuangan = LaporanKeuangan::where('idpekerjaan',$idpekerjaan) -> orderby('tanggal','asc') -> get();
	$datakoordinatp = Koordinatp::where('idpekerjaan',$idpekerjaan)->orderby('grup','asc')->get();
	// dd($datakoordinatp);	
	$dataalatp = Alatp::where('idpekerjaan',$idpekerjaan)->orderby('jenis','asc')->get();
	return view('pekerjaan/pekerjaandetail',['pekerjaan' => $pekerjaan,'datakoordinat' => $datakoordinat, 'datakoordinatp' => $datakoordinatp, 'datalaporanfisik' => $datalaporanfisik,'dataalat' => $dataalat,'dataalatp' => $dataalatp,  'datalaporankeuangan' => $datalaporankeuangan, 'datadokumen' => $datadokumen, 'edit' => 'N']);
}

public function detailPDF($idpekerjaan){
	$pekerjaan = Pekerjaan::find($idpekerjaan);
	$datakoordinat = Koordinat::where('idpekerjaan',$idpekerjaan) -> orderby('grup','asc') -> get();
	$dataalat = Alat::where('idpekerjaan',$idpekerjaan) -> get();
	$datalaporanfisik = LaporanFisik::where('idpekerjaan',$idpekerjaan) -> orderby('mingguke','asc') -> get();
	$datadokumen = Dokumen::where('idpekerjaan',$idpekerjaan)->get();
	$datalaporankeuangan = LaporanKeuangan::where('idpekerjaan',$idpekerjaan) -> orderby('tanggal','asc') -> get();
	$dataalatp = Alatp::where('idpekerjaan',$idpekerjaan)->orderby('jenis','asc')->get();
	$pdf = PDF::loadView('pekerjaan/pekerjaandetailpdf',['pekerjaan' => $pekerjaan,'datakoordinat' => $datakoordinat, 'datalaporanfisik' => $datalaporanfisik, 'dataalat' => $dataalat,'dataalatp' => $dataalatp, 'datalaporankeuangan' => $datalaporankeuangan, 'datadokumen' => $datadokumen, 'edit' => 'N']);
	$pdf = $pdf->setOptions(['dpi' => 150]);
	$namafile = $pekerjaan->ta .'-' .$pekerjaan->namapekerjaan;
	return $pdf->setPaper('a4', 'landscape')->setWarnings(false)->stream($namafile);
}

public function detailPrint($idpekerjaan){
	$pekerjaan = Pekerjaan::find($idpekerjaan);
	$datakoordinat = Koordinat::where('idpekerjaan',$idpekerjaan) -> orderby('grup','asc') -> get();
	$dataalat = Alat::where('idpekerjaan',$idpekerjaan)->get();
	$datalaporanfisik = LaporanFisik::where('idpekerjaan',$idpekerjaan) -> orderby('mingguke','asc') -> get();
	$datadokumen = Dokumen::where('idpekerjaan',$idpekerjaan)->get();
	$datalaporankeuangan = LaporanKeuangan::where('idpekerjaan',$idpekerjaan) -> orderby('tanggal','asc') -> get();
	$datakoordinatp = Koordinatp::where('idpekerjaan',$idpekerjaan)->orderby('grup','asc')->get();
	$dataalatp = Alatp::where('idpekerjaan',$idpekerjaan)->orderby('jenis','asc')->get();
	return view('pekerjaan/pekerjaandetailprint',['pekerjaan' => $pekerjaan,'datakoordinat' => $datakoordinat, 'datakoordinatp' => $datakoordinatp, 'datalaporanfisik' => $datalaporanfisik, 'dataalat' => $dataalat,'dataalatp' => $dataalatp, 'datalaporankeuangan' => $datalaporankeuangan, 'datadokumen' => $datadokumen, 'edit' => 'N']);
}

public function monev($idpekerjaan){
	$pekerjaan = Pekerjaan::find($idpekerjaan);
	$datakoordinat = Koordinat::where('idpekerjaan',$idpekerjaan)->orderby('grup','asc') -> get();
	$datadokumen = Dokumen::where('idpekerjaan',$idpekerjaan)->get();
	$dataalat = Alat::where('idpekerjaan',$idpekerjaan)->orderby('jenis','asc')->get();
	$datalaporanfisik = LaporanFisik::where('idpekerjaan',$idpekerjaan) -> orderby('mingguke','asc') -> get();
	$datalaporankeuangan = LaporanKeuangan::where('idpekerjaan',$idpekerjaan) -> orderby('tanggal','asc') -> get();
	$datastatus = Lov::where('kategori','status') -> get();
	$datakoordinatp = Koordinatp::where('idpekerjaan',$idpekerjaan)->orderby('grup','asc')->get();
	$dataalatp = Alatp::where('idpekerjaan',$idpekerjaan)->orderby('jenis','asc')->get();
	return view('pekerjaan/pekerjaanmonev',['pekerjaan' => $pekerjaan, 'datakoordinat' => $datakoordinat, 'datadokumen' => $datadokumen, 'datastatus' => $datastatus, 'dataalat' => $dataalat,'dataalatp' => $dataalatp, 'datalaporanfisik' => $datalaporanfisik, 'datalaporankeuangan' => $datalaporankeuangan, 'datakoordinatp' => $datakoordinatp, 'edit' => 'Y']);
}

public function pekerjaanall(){
	$datapekerjaan = Pekerjaan::where('ta', session()->get('ta'))->orderBy('namapekerjaan','asc')->get();
	return view('pekerjaan/pekerjaanall',['datapekerjaan' => $datapekerjaan]);
}

public function pekerjaancari(Request $request){
	$variable1 = $request -> pencarian;
	$variable2 = '%'.$variable1.'%';
	$query = Pekerjaan::query();
	$query -> where('ta', session()->get('ta'));
	if ($variable1 == 'Belum Kontrak'){
		$query -> whereNull('nokontrak');
	}
	else if($variable1 == 'Belum Monitoring'){
		$query -> whereNull('statuskemajuan');
		$query -> whereNotNull('nokontrak');
	}else{
		$query -> where(function($query) use ($variable1,$variable2){
      $query->where('namapekerjaan','like',$variable2)
     -> orWhere('statuskemajuan','like',$variable2)
     -> orWhere('propeng','like',$variable2)
     -> orWhere('jnspek','like',$variable2)
     -> orWhere('statuspekerjaan','=',$variable1)
     -> orWhere('sumberdana','=',$variable1)
     -> orWhere('katpek','like',$variable2);
 			})
			-> orderBy('namapekerjaan','asc');
	}
	$datapekerjaan = $query -> get();
	// dd($datapekerjaan);
	return view('pekerjaan/pekerjaancari',['datapekerjaan' => $datapekerjaan,'pencarian' => $variable1]);
}

public function lapstatkemajuan()
{
	$datapekerjaan = Pekerjaan::where('ta', session()->get('ta')) -> orderby('namapekerjaan','asc') -> get();
	return view('pekerjaan/lapstatkemajuan',['datapekerjaan' => $datapekerjaan]);
}

public function lappekstat()
{
	$datapekerjaan = Pekerjaan::where('ta', session()->get('ta')) -> orderby('namapekerjaan','asc') -> get();
	return view('pekerjaan/lappekstat',['datapekerjaan' => $datapekerjaan]);
}

public function lappekexpired()
{
	$datapekerjaanexpired = Pekerjaan::where('ta', session()->get('ta')) -> where('statuspekerjaan','Belum Selesai') -> where('tglselesaikerja', '<=', date('Y-m-d')) -> orderby('namapekerjaan','asc') -> get();

	return view('pekerjaan/lappekexpired',['datapekerjaanexpired' => $datapekerjaanexpired]);
}

public function lappekakanexpired()
{
  $date = \Carbon\Carbon::today()->addDays(7);
  // dd($date);
	$datapekerjaanakanexpired = Pekerjaan::where('ta', session()->get('ta')) -> where('statuspekerjaan','Belum Selesai') -> where('tglselesaikerja', '<=', date($date)) -> where('tglselesaikerja', '>', date('Y-m-d')) -> orderby('namapekerjaan','asc') -> get();
	return view('pekerjaan/lappekakanexpired',['datapekerjaanakanexpired' => $datapekerjaanakanexpired]);
}

public function lappeklok(Request $request)
{
	$pencarian = '';
	if($request->pencarian != null){
		$pencarian = $request->pencarian;
	}
	$datapekerjaan = Pekerjaan::join('tb_kecamatan', 'tb_pekerjaan.idkecamatan', '=', 'tb_kecamatan.idkecamatan')
		-> orwhere('tb_kecamatan.nama','like','%'.$pencarian.'%') 
		-> where('ta', session()->get('ta')) 
		-> orderby('namapekerjaan','asc') 
		-> get();
	return view('pekerjaan/lappeklok',['datapekerjaan' => $datapekerjaan, 'pencarian' => $pencarian]);
}

public function lappekkon()
{
	$datapekerjaan = Pekerjaan::where('ta', session()->get('ta')) -> get();
	return view('pekerjaan/lappekkon',['datapekerjaan' => $datapekerjaan]);
}

public function laphasilpro()
{
	$datapekerjaan = Pekerjaan::where('ta', session()->get('ta')) -> orderby('namapekerjaan','asc') -> get();
	return view('pekerjaan/laphasilpro',['datapekerjaan' => $datapekerjaan]);
}

public function lappekpej()
{
	$datapekerjaan = Pekerjaan::where('ta', session()->get('ta')) -> orderby('namapekerjaan','asc') -> get();
	return view('pekerjaan/lappekpej',['datapekerjaan' => $datapekerjaan]);
}

public function lappekcair(Request $request)
{
	$variable1 = $request -> pencarian;
	$idpekerjaan = LaporanKeuangan::distinct() 
		->get(['idpekerjaan'])
		->pluck('idpekerjaan') -> toArray();
	$datapekerjaan = null;
	if($variable1 == null && $variable1 == ""){
		$variable1 = "Sudah Pencairan";
	}
	if($variable1 == "Sudah Pencairan"){
		$datapekerjaan = Pekerjaan::where('ta', session()->get('ta'))
			-> whereIn('idpekerjaan',$idpekerjaan) 
			-> orderby('namapekerjaan','asc') -> get();
	}else{
		$datapekerjaan = Pekerjaan::where('ta', session()->get('ta'))
			-> whereNotIn('idpekerjaan',$idpekerjaan) 
			-> orderby('namapekerjaan','asc') -> get();	
	}
	// dd($variable1);
	return view('pekerjaan/lappekcair',['datapekerjaan' => $datapekerjaan,'pencarian' => $variable1]);
}

public function manage(Request $request){
	if($request -> action == 'insert'){
		$pekerjaan = new Pekerjaan;
		// $pekerjaan -> idpekerjaan = $request -> idpekerjaan;
		$pekerjaan -> idkegiatan = $request -> idkegiatan;
		$pekerjaan -> kabupaten = $request -> kabupaten;
		$pekerjaan -> satuankerja = $request -> satuankerja;
		$pekerjaan -> tgldpa = $request -> tgldpa;
		$pekerjaan -> tglrka = $request -> tglrka;
		$pekerjaan -> tglkontrak = $request -> tglkontrak;
		$pekerjaan -> nokontrak = $request -> nokontrak;
		$pekerjaan -> tglselesaikerja = $request -> tglselesaikerja;
		$pekerjaan -> tglselesaipemeliharaan = $request -> tglselesaipemeliharaan;
		$pekerjaan -> jmlhhari = $request -> jmlhhari;
		// $pekerjaan -> tglspmk = $request -> tglspmk;
		// $pekerjaan -> nospmk = $request -> nospmk;
		$pekerjaan -> tglpa = $request -> tglpa;
		$pekerjaan -> nopa = $request -> nopa;
		$pekerjaan -> namapa = $request -> namapa;
		$pekerjaan -> tglppk = $request -> tglppk;
		$pekerjaan -> noppk = $request -> noppk;
		$pekerjaan -> namappk = $request -> namappk;
		$pekerjaan -> tglpptk = $request -> tglpptk;
		$pekerjaan -> nopptk = $request -> nopptk;
		$pekerjaan -> namapptk = $request -> namapptk;
		$pekerjaan -> tglpp = $request -> tglpp;
		$pekerjaan -> nopp = $request -> nopp;
		$pekerjaan -> namapp = $request -> namapp;
		$pekerjaan -> tglpphp = $request -> tglpphp;
		$pekerjaan -> nopphp = $request -> nopphp;
		$pekerjaan -> timpphp = $request -> timpphp;
		$pekerjaan -> kodelelang = $request -> kodelelang;
		$pekerjaan -> tgllelang = $request -> tgllelang;
		$pekerjaan -> namapekerjaan = $request -> namapekerjaan;
		$pekerjaan -> bidang = $request -> bidang;
		$pekerjaan -> jnspek = $request -> jnspek;
		$pekerjaan -> katpek = $request -> katpek;
		$pekerjaan -> ta = $request -> ta;
		$pekerjaan -> propeng = $request -> propeng;
		$pekerjaan -> tahunkontrak = $request -> tahunkontrak;
		$pekerjaan -> nilaipagu = $request -> nilaipagu;
		$pekerjaan -> nilaikontrak = $request -> nilaikontrak;
		$pekerjaan -> sumberdana = $request -> sumberdana;
		$pekerjaan -> jmlpintuairbangun = $request -> jmlpintuairbangun;
		$pekerjaan -> pjgsungai = $request -> pjgsungai;
		$pekerjaan -> jmlpintuairpelihara = $request -> jmlpintuairpelihara;
		$pekerjaan -> pjgsaluranrehab = $request -> pjgsaluranrehab;
		$pekerjaan -> jawarehab = $request -> jawarehab;
		$pekerjaan -> pjgjawa = $request -> pjgjawa;
		$pekerjaan -> tangguljaringan = $request -> tangguljaringan;
		$pekerjaan -> pstkendalibanjir = $request -> pstkendalibanjir;
		$pekerjaan -> kanalbanjir = $request -> kanalbanjir;
		$pekerjaan -> peliharaparit = $request -> peliharaparit;
		$pekerjaan -> pembersihansungai = $request -> pembersihansungai;
		$pekerjaan -> rehabairbaku = $request -> rehabairbaku;
		$pekerjaan -> rehabdas = $request -> rehabdas;
		$pekerjaan -> konpengawas = $request -> konpengawas;
		$pekerjaan -> konperencana = $request -> konperencana;
		$pekerjaan -> konpelaksana = $request -> konpelaksana;
		$pekerjaan -> ktrpelaksana = $request -> ktrpelaksana;
		$pekerjaan -> idkecamatan = $request -> idkecamatan;
		$pekerjaan -> iddesa = $request -> iddesa;
		$pekerjaan -> statuspekerjaan = $request -> statuspekerjaan;
		$pekerjaan -> status = $request -> status;
		$pekerjaan -> modified_by = session() -> get('username');
		// $pekerjaan -> created_at = $request -> created_at;
		// $pekerjaan -> updated_at = $request -> updated_at;
		$pekerjaan -> save();

		//data log
    $log = new Log;
    $log -> aktivitas = 'Menambahkan data pekerjaan';
    $log -> keterangan = json_encode($pekerjaan);
		$log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	else if($request -> action == 'update'){
		// dd(hitungPresen($request -> tglkontrak, $request -> tglselesaikerja));
		$pekerjaan = Pekerjaan::find($request -> idpekerjaan);
		$keterangan = "Data Lama : "."<br>".json_encode($pekerjaan);
		// $pekerjaan -> idpekerjaan = $request -> idpekerjaan;
		$pekerjaan -> idkegiatan = $request -> idkegiatan;
		$pekerjaan -> kabupaten = $request -> kabupaten;
		$pekerjaan -> satuankerja = $request -> satuankerja;
		$pekerjaan -> tgldpa = $request -> tgldpa;
		$pekerjaan -> tglrka = $request -> tglrka;
		$pekerjaan -> tglkontrak = $request -> tglkontrak;
		$pekerjaan -> nokontrak = $request -> nokontrak;
		$pekerjaan -> tglselesaikerja = $request -> tglselesaikerja;
		$pekerjaan -> tglselesaipemeliharaan = $request -> tglselesaipemeliharaan;
		$pekerjaan -> jmlhhari = $request -> jmlhhari;
		// $pekerjaan -> tglspmk = $request -> tglspmk;
		// $pekerjaan -> nospmk = $request -> nospmk;
		$pekerjaan -> tglpa = $request -> tglpa;
		$pekerjaan -> nopa = $request -> nopa;
		$pekerjaan -> namapa = $request -> namapa;
		$pekerjaan -> tglppk = $request -> tglppk;
		$pekerjaan -> noppk = $request -> noppk;
		$pekerjaan -> namappk = $request -> namappk;
		$pekerjaan -> tglpptk = $request -> tglpptk;
		$pekerjaan -> nopptk = $request -> nopptk;
		$pekerjaan -> namapptk = $request -> namapptk;
		$pekerjaan -> tglpp = $request -> tglpp;
		$pekerjaan -> nopp = $request -> nopp;
		$pekerjaan -> namapp = $request -> namapp;
		$pekerjaan -> tglpphp = $request -> tglpphp;
		$pekerjaan -> nopphp = $request -> nopphp;
		$pekerjaan -> timpphp = $request -> timpphp;
		$pekerjaan -> kodelelang = $request -> kodelelang;
		$pekerjaan -> tgllelang = $request -> tgllelang;
		$pekerjaan -> namapekerjaan = $request -> namapekerjaan;
		$pekerjaan -> bidang = $request -> bidang;
		$pekerjaan -> jnspek = $request -> jnspek;
		$pekerjaan -> katpek = $request -> katpek;
		$pekerjaan -> ta = $request -> ta;
		$pekerjaan -> propeng = $request -> propeng;
		$pekerjaan -> tahunkontrak = $request -> tahunkontrak;
		$pekerjaan -> nilaipagu = $request -> nilaipagu;
		$pekerjaan -> nilaikontrak = $request -> nilaikontrak;
		$pekerjaan -> sumberdana = $request -> sumberdana;
		$pekerjaan -> jmlpintuairbangun = $request -> jmlpintuairbangun;
		$pekerjaan -> pjgsungai = $request -> pjgsungai;
		$pekerjaan -> jmlpintuairpelihara = $request -> jmlpintuairpelihara;
		$pekerjaan -> pjgsaluranrehab = $request -> pjgsaluranrehab;
		$pekerjaan -> jawarehab = $request -> jawarehab;
		$pekerjaan -> pjgjawa = $request -> pjgjawa;
		$pekerjaan -> tangguljaringan = $request -> tangguljaringan;
		$pekerjaan -> pstkendalibanjir = $request -> pstkendalibanjir;
		$pekerjaan -> kanalbanjir = $request -> kanalbanjir;
		$pekerjaan -> peliharaparit = $request -> peliharaparit;
		$pekerjaan -> pembersihansungai = $request -> pembersihansungai;
		$pekerjaan -> rehabairbaku = $request -> rehabairbaku;
		$pekerjaan -> rehabdas = $request -> rehabdas;
		$pekerjaan -> konpengawas = $request -> konpengawas;
		$pekerjaan -> konperencana = $request -> konperencana;
		$pekerjaan -> konpelaksana = $request -> konpelaksana;
		$pekerjaan -> ktrpelaksana = $request -> ktrpelaksana;
		$pekerjaan -> idkecamatan = $request -> idkecamatan;
		$pekerjaan -> iddesa = $request -> iddesa;
		$pekerjaan -> statuspekerjaan = $request -> statuspekerjaan;
		$pekerjaan -> status = $request -> status;
		$pekerjaan -> modified_by = session() -> get('username');
		// $pekerjaan -> created_at = $request -> created_at;
		// $pekerjaan -> updated_at = $request -> updated_at;
		$pekerjaan -> save();
		$keterangan .= "<br>Data Baru : <br>".json_encode($pekerjaan);


		//data log
		$log = new Log;
    $log -> aktivitas = 'Mengedit data pekerjaan';
    $log -> keterangan = $keterangan;
		$log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	else if($request -> action == 'delete'){
		$pekerjaan = Pekerjaan::find($request -> idpekerjaan);
		$pekerjaan -> delete();

		//data log
		$log = new Log;
    $log -> aktivitas = 'Menghapus data pekerjaan';
    $log -> keterangan = json_encode($pekerjaan);
		$log -> tahun = session() -> get('ta');
    $log -> modified_by = $request->session()->get('username');
    $log -> save();
	}
	if($request -> data == 'n'){
		return redirect('/pekerjaan/'.$request -> idkegiatan);
	}else if($request -> data == 'y'){
		return redirect('/pekerjaanall');
	}else if($request -> action == 'insert'){
		return redirect('/pekerjaan/'.$request -> idkegiatan);
	}
}
}
