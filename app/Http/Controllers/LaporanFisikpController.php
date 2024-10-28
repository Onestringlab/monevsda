<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pekerjaan;
use App\LaporanFisik;
use App\LaporanFisikp;

class LaporanFisikpController extends Controller {

	public function index($idpekerjaan){
		$datalaporanfisikp = LaporanFisikp::where('idpekerjaan',$idpekerjaan) -> orderby('mingguke','asc') -> get();
		$pekerjaan = Pekerjaan::find($idpekerjaan);
		return view('laporanfisikp/laporanfisikplist',['idpekerjaan' => $idpekerjaan, 'datalaporanfisikp' => $datalaporanfisikp, 'pekerjaan' => $pekerjaan]);
	}

	public function insert($idpekerjaan){
		$rows = LaporanFisikp::where('idpekerjaan',$idpekerjaan)->orderby('tanggal','asc')->get();
		return view('laporanfisikp/laporanfisikpform',['action' => 'insert', 'rows' => $rows, 'idpekerjaan' => $idpekerjaan]);
	}

	public function update($idlaporanfisikp){
		$laporanfisikp = LaporanFisikp::find($idlaporanfisikp);
		$pekerjaan = Pekerjaan::find($laporanfisikp -> idpekerjaan);
		return view('laporanfisikp/laporanfisikpform',['row' => $laporanfisikp,'action' => 'update', 'idpekerjaan' => $laporanfisikp -> idpekerjaan, 'pekerjaan' => $pekerjaan]);
	}

	public function detail($idlaporanfisikp){
		$laporanfisikp = LaporanFisikp::find($idlaporanfisikp);
		return view('laporanfisikp/laporanfisikpform',['row' => $laporanfisikp,'action' => 'detail']);
	}

	public function delete($idlaporanfisikp){
		$laporanfisikp = LaporanFisikp::find($idlaporanfisikp);
		return view('laporanfisikp/laporanfisikpform',['row' => $laporanfisikp,'action' => 'delete', 'idpekerjaan' => $laporanfisikp -> idpekerjaan]);
	}

	public function getdatarencana($idpekerjaan){
		$datalaporanfisik = LaporanFisik::where('idpekerjaan',$idpekerjaan) -> orderby('mingguke','asc') -> get();
		foreach ($datalaporanfisik as $laporanfisik) {
			$laporanfisikp = LaporanFisikp::where('idlaporanfisikp', $laporanfisik->idlaporanfisik)->get();
			if(count($laporanfisikp) == 0){
				$laporanfisikp = new LaporanFisikp;
				$laporanfisikp -> idlaporanfisikp = $laporanfisik -> idlaporanfisik;
				$laporanfisikp -> idpekerjaan = $laporanfisik -> idpekerjaan;
				$laporanfisikp -> tanggal = $laporanfisik -> tanggal;
				$laporanfisikp -> mingguke = $laporanfisik -> mingguke;
				$laporanfisikp -> keterangan = $laporanfisik -> keterangan;
				$laporanfisikp -> target = $laporanfisik -> target;
				$laporanfisikp -> kemajuan = $laporanfisik -> kemajuan;
				$laporanfisikp -> status = "Diambil";
				$laporanfisikp -> modified_by = session() -> get('username');
				$laporanfisikp -> save();
			}
			elseif (count($laporanfisikp) == 1) {
				$laporanfisik = LaporanFisik::find($laporanfisik -> idlaporanfisik);
				$laporanfisikp = LaporanFisikp::find($laporanfisik -> idlaporanfisik);
				$laporanfisikp -> idlaporanfisikp = $laporanfisik -> idlaporanfisik;
				$laporanfisikp -> idpekerjaan = $laporanfisik -> idpekerjaan;
				$laporanfisikp -> tanggal = $laporanfisik -> tanggal;
				$laporanfisikp -> mingguke = $laporanfisik -> mingguke;
				$laporanfisikp -> keterangan = $laporanfisik -> keterangan;
				$laporanfisikp -> target = $laporanfisik -> target;
				$laporanfisikp -> status = "Diambil";
				$laporanfisikp -> modified_by = session() -> get('username');
				$laporanfisikp -> save();
			}
		}
		return redirect('/laporanfisikp/'.$idpekerjaan);
	}

	public function manage(Request $request){
		if($request -> action == 'insert'){
			$laporanfisikp = new LaporanFisikp;
			$laporanfisikp -> idlaporanfisikp = $request -> idlaporanfisikp;
			$laporanfisikp -> idpekerjaan = $request -> idpekerjaan;
			$laporanfisikp -> tanggal = $request -> tanggal;
			$laporanfisikp -> mingguke = $request -> mingguke;
			$laporanfisikp -> keterangan = $request -> keterangan;
			$laporanfisikp -> target = $request -> target;
			$laporanfisikp -> kemajuan = $request -> kemajuan;
			$laporanfisikp -> status = $request -> status;
			$laporanfisikp -> modified_by = $request -> modified_by;
			$laporanfisikp -> save();
		}
		else if($request -> action == 'update'){
			$laporanfisikp = LaporanFisikp::find($request -> idlaporanfisikp);
			$laporanfisikp -> idlaporanfisikp = $request -> idlaporanfisikp;
			$laporanfisikp -> idpekerjaan = $request -> idpekerjaan;
			$laporanfisikp -> tanggal = $request -> tanggal;
			$laporanfisikp -> mingguke = $request -> mingguke;
			$laporanfisikp -> keterangan = $request -> keterangan;
			$laporanfisikp -> target = $request -> target;
			$laporanfisikp -> kemajuan = $request -> kemajuan;
			$laporanfisikp -> status = "Diedit";
			$laporanfisikp -> modified_by = session() -> get('username');
			$laporanfisikp -> save();
		}
		else if($request -> action == 'delete'){
			$laporanfisikp = LaporanFisikp::find($request -> idlaporanfisikp);
			$laporanfisikp -> delete();
		}
		return redirect('/laporanfisikp/'.$request -> idpekerjaan);
	}
}
