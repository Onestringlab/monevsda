<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Pekerjaan;
use App\PhotoFisik;
use App\PhotoFisikp;
use App\LaporanFisik;
use App\LaporanFisikp;

class LaporanFisikController extends Controller {

	public function index(){
		$datalaporanfisik = LaporanFisik::all();
		return view('laporanfisik/laporanfisiklist',['datalaporanfisik' => $datalaporanfisik]);
	}

	public function insert($idpekerjaan){
		$pekerjaan = Pekerjaan::find($idpekerjaan);
		$datalaporanfisik = LaporanFisik::where('idpekerjaan', $idpekerjaan) -> orderby('tanggal','asc') -> get();
		return view('laporanfisik/laporanfisikform',['action' => 'insert', 'datalaporanfisik' => $datalaporanfisik, 'pekerjaan' => $pekerjaan, 'edit' => 'Y']);
	}

	public function update($idlaporanfisik){
		$laporanfisik = LaporanFisik::find($idlaporanfisik);
		$pekerjaan = Pekerjaan::find($laporanfisik->idpekerjaan);
		$datalaporanfisik = LaporanFisik::where('idpekerjaan', $laporanfisik->idpekerjaan)-> orderby('tanggal','asc') -> get();
		return view('laporanfisik/laporanfisikform',['row' => $laporanfisik,'action' => 'update', 'datalaporanfisik' => $datalaporanfisik, 'pekerjaan' => $pekerjaan, 'edit' => 'Y']);
	}

	public function delete($idlaporanfisik){
		$laporanfisik = LaporanFisik::find($idlaporanfisik);
		$pekerjaan = Pekerjaan::find($laporanfisik->idpekerjaan);
		$datalaporanfisik = LaporanFisik::where('idpekerjaan', $laporanfisik->idpekerjaan)-> orderby('tanggal','asc') -> get();
		return view('laporanfisik/laporanfisikform',['row' => $laporanfisik,'action' => 'delete', 'datalaporanfisik' => $datalaporanfisik, 'pekerjaan' => $pekerjaan, 'edit' => 'Y']);
	}

	public function getdatarealisasi($idpekerjaan){
		$datalaporanfisikp = LaporanFisikp::where('idpekerjaan', $idpekerjaan)-> orderby('mingguke','asc') -> get();
		foreach ($datalaporanfisikp as $laporanfisikp) {
			$laporanfisik = LaporanFisik::where('idlaporanfisik', $laporanfisikp -> idlaporanfisikp) -> orderby('mingguke','asc') -> get();
			if(count($laporanfisik) > 0 && $laporanfisikp -> status = "Diedit"){
				$laporanfisik = LaporanFisik::find($laporanfisikp -> idlaporanfisikp);
				if($laporanfisikp -> kemajuan != ''){
					$laporanfisik -> kemajuan = $laporanfisikp -> kemajuan;
					$laporanfisikp -> status = "Singkron";
				}
				$laporanfisik -> save();
				$laporanfisikp -> save();
			}

			// singkron data photo fisik
			$dataphotofisik = PhotoFisik::where('idlaporanfisik', $laporanfisikp -> idlaporanfisikp) -> delete();
			$dataphotofisikp = PhotoFisikp::where('idlaporanfisikp', $laporanfisikp -> idlaporanfisikp) -> get();
			foreach ($dataphotofisikp as $photofisikp) {
				$photofisik = new PhotoFisik;
				$photofisik -> idlaporanfisik = $laporanfisikp -> idlaporanfisikp;
				$photofisik -> judul = $photofisikp -> judul;
				$photofisik -> photofisik = $photofisikp -> photofisik;
				$photofisik -> modified_by = session() -> get('username');
				$photofisik -> save();
			}
		}
		return redirect('/pekerjaanmonev/'.$idpekerjaan);
	}

	public function manage(Request $request){
		if($request -> action == 'insert'){
			$pekerjaan = Pekerjaan::find($request -> idpekerjaan);
			$laporanfisik = new LaporanFisik;
			$laporanfisik -> idpekerjaan = $request -> idpekerjaan;
			$laporanfisik -> tanggal = $request -> tanggal;
			$laporanfisik -> mingguke = $request -> mingguke;
			$laporanfisik -> keterangan = $request -> keterangan;
			$laporanfisik -> target = $request -> target;
			$laporanfisik -> kemajuan = $request -> kemajuan;
			$laporanfisik -> modified_by = session() -> get('username');
			$laporanfisik -> save();

			$pekerjaan = Pekerjaan::find($request -> idpekerjaan);
			$kemajuan = LaporanFisik::where('idpekerjaan',$request -> idpekerjaan) -> max('kemajuan');
			$tanggal =  LaporanFisik::select('tanggal')->where('idpekerjaan',$request -> idpekerjaan) -> where('kemajuan', '=', $kemajuan ) -> first();
			$sekarang = date('Y-m-d');
			$target = LaporanFisik::select('target')
			-> where('tanggal','<=',$sekarang)
			-> where('idpekerjaan',$request -> idpekerjaan)
			-> orderby('tanggal','desc')
			-> first()
			-> toArray(); //ditambahkan 18 Agustus 2022
			if(count($target) < 1){
				$target['target'] = LaporanFisik::where('idpekerjaan',$request -> idpekerjaan) -> max('target');
			}
			$statusKemajuan = "";
			$faktorKemajuan = $kemajuan - $target['target'];
			if($faktorKemajuan > 0){
				$statusKemajuan = "Diatas Target";
			}else if($faktorKemajuan == 0){
				$statusKemajuan = "Sesuai Target";
			}else if($faktorKemajuan > -10){
				$statusKemajuan = "Dibawah Target";
			}else if($faktorKemajuan < -10){
				$statusKemajuan = "Kritis";
			}

			$pekerjaan -> tgllaporan =  $tanggal['tanggal'];
			$pekerjaan -> targetkemajuan = $target['target'];
			$pekerjaan -> realisasikemajuan = $kemajuan;
			$pekerjaan -> statusKemajuan = $statusKemajuan;
			$pekerjaan -> save();

		}
		else if($request -> action == 'update'){
			$laporanfisik = LaporanFisik::find($request -> idlaporanfisik);
			$laporanfisik -> idpekerjaan = $request -> idpekerjaan;
			$laporanfisik -> tanggal = $request -> tanggal;
			$laporanfisik -> mingguke = $request -> mingguke;
			$laporanfisik -> keterangan = $request -> keterangan;
			$laporanfisik -> target = $request -> target;
			$laporanfisik -> kemajuan = $request -> kemajuan;
			$laporanfisik -> modified_by = session() -> get('username');
			$laporanfisik -> save();

			$pekerjaan = Pekerjaan::find($request -> idpekerjaan);
			$kemajuan = LaporanFisik::where('idpekerjaan',$request -> idpekerjaan) -> max('kemajuan');
			$tanggal =  LaporanFisik::select('tanggal')->where('idpekerjaan',$request -> idpekerjaan) -> where('kemajuan', '=', $kemajuan ) -> first();
			$sekarang = date('Y-m-d');
			$target = LaporanFisik::select('target')
			-> where('tanggal','<=',$sekarang)
			-> where('idpekerjaan',$request -> idpekerjaan)
			-> orderby('tanggal','desc')
			-> first()
			-> toArray(); // ditambahkan pada 18 Agustus 2022
			if(count($target) < 1){
				$target['target'] = LaporanFisik::where('idpekerjaan',$request -> idpekerjaan) -> max('target');
			}
			$faktorKemajuan = $kemajuan - $target['target'];
			$statusKemajuan = "";
			if($faktorKemajuan > 0){
				$statusKemajuan = "Diatas Target";
			}else if($faktorKemajuan == 0){
				$statusKemajuan = "Sesuai Target";
			}else if($faktorKemajuan >= -5){
				$statusKemajuan = "Dibawah Target";
			}else if($faktorKemajuan < -5){
				$statusKemajuan = "Kritis";
			}
			$pekerjaan -> tgllaporan = $tanggal['tanggal'];
			$pekerjaan -> targetkemajuan = $target['target'];
			$pekerjaan -> realisasikemajuan = $kemajuan;
			$pekerjaan -> statusKemajuan = $statusKemajuan;
			$pekerjaan -> save();

		}
		else if($request -> action == 'delete'){
			$laporanfisik = LaporanFisik::find($request -> idlaporanfisik);
			$laporanfisik -> delete();
			$pekerjaan = Pekerjaan::find($request -> idpekerjaan);
			$laporanfisik = LaporanFisik::where('idpekerjaan',$request -> idpekerjaan) -> orderby('kemajuan','desc')->first()
				-> toArray(); //ditambahkan 18 Agustus 2022;
			if(count($laporanfisik)>0){
				$kemajuan = LaporanFisik::where('idpekerjaan',$request -> idpekerjaan) -> max('kemajuan');
				$tanggal =  LaporanFisik::select('tanggal')->where('idpekerjaan',$request -> idpekerjaan) -> where('kemajuan', '=', $kemajuan ) -> first();
				$sekarang = date('Y-m-d');
				$target = LaporanFisik::select('target')
				-> where('tanggal','<=',$sekarang)
				-> where('idpekerjaan',$request -> idpekerjaan)
				-> orderby('tanggal','desc')
				-> first()
				-> toArray(); //ditambahkan 18 Agustus 2022

				if(count($target) < 1){
					$target['target'] = LaporanFisik::where('idpekerjaan',$request -> idpekerjaan) -> max('target');
				}
				// dd($target['target']);
				$faktorKemajuan = $kemajuan - $target['target'];
				$statusKemajuan = "";
				if($faktorKemajuan > 0){
					$statusKemajuan = "Diatas Target";
				}else if($faktorKemajuan == 0){
					$statusKemajuan = "Sesuai Target";
				}else if($faktorKemajuan >= -5){
					$statusKemajuan = "Dibawah Target";
				}else if($faktorKemajuan < -5){
					$statusKemajuan = "Kritis";
				}
				$pekerjaan -> tgllaporan = $tanggal['tanggal'];
				$pekerjaan -> targetkemajuan = $target['target'];
				$pekerjaan -> realisasikemajuan = $kemajuan;
				$pekerjaan -> statusKemajuan = $statusKemajuan;
				$pekerjaan -> save();
			}else{
				$pekerjaan -> tgllaporan = null;
				$pekerjaan -> targetkemajuan = 0;
				$pekerjaan -> realisasikemajuan = 0;
				$pekerjaan -> statusKemajuan = null;
				$pekerjaan -> save();
			}
		}
		return redirect('/pekerjaanmonev/'.$request -> idpekerjaan);

	}
}
