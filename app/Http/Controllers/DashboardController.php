<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Program;
use App\Kegiatan;
use App\Pekerjaan;
use App\LaporanKeuangan;



class DashboardController extends Controller {

	public function Dashboard1()
	{
		$ta = session() -> get('ta');
		$jumprogram = Program::where('tahun',$ta) -> get() ->count();
		$jumkegiatan = Kegiatan::where('tahun',$ta) -> get() ->count();
		$jumpekerjaan = Pekerjaan::where('ta',$ta) -> get() ->count();
		$totalpagu = Pekerjaan::where('ta',$ta) -> get() -> sum('nilaipagu');
		$totalkontrak = Pekerjaan::where('ta',$ta) -> get() -> sum('nilaikontrak');
		$totaldiatas = Pekerjaan::where('ta',$ta) -> where('statuskemajuan','Diatas Target')-> get() -> count('statuskemajuan');
		$totalsesuai = Pekerjaan::where('ta',$ta) -> where('statuskemajuan','Sesuai Target')-> get() -> count('statuskemajuan');
		$totaldibawah = Pekerjaan::where('ta',$ta) -> where('statuskemajuan','Dibawah Target')-> get() -> count('statuskemajuan');
		$totalkritis = Pekerjaan::where('ta',$ta) -> where('statuskemajuan','Kritis')-> get() -> count('statuskemajuan');
		$jumpekerjaanselesai = Pekerjaan::where('ta',$ta) -> where('statuspekerjaan','Selesai') -> get() ->count();
		$jumlahpekerjaanbelumkontrak = Pekerjaan::where('ta',$ta) -> whereNull('nokontrak') -> get() -> count();
		$jumlahpekerjaanbelummonitoring = Pekerjaan::where('ta',$ta) -> whereNull('statuskemajuan') -> whereNotNull('nokontrak') -> get() -> count();
		$jumlahpekerjaanexpired = Pekerjaan::where('ta', session()->get('ta')) -> where('statuspekerjaan','Belum Selesai') -> where('tglselesaikerja', '<=', date('Y-m-d')) -> orderby('namapekerjaan','asc') -> get() -> count();
  	$date = \Carbon\Carbon::today()->addDays(7);
		$jumlahpekerjaanakanexpired = Pekerjaan::where('ta', session()->get('ta')) -> where('statuspekerjaan','Belum Selesai') -> where('tglselesaikerja', '<=', date($date)) -> where('tglselesaikerja', '>', date('Y-m-d')) -> orderby('namapekerjaan','asc') -> get() -> count();

		$awalTahun = $ta.'-01-01';
		$akhirTahun = $ta.'-12-31';
		$jumdanacair = 0;
		$jumdanacair = LaporanKeuangan::whereBetween('tanggal',array($awalTahun,$akhirTahun)) -> get() -> sum('pembayaran');
		//dd($jumdanacair);

		$datapekerjaanKecamatan = Pekerjaan::where('ta',$ta)
				->join('tb_kecamatan', 'tb_pekerjaan.idkecamatan', '=', 'tb_kecamatan.idkecamatan')
				-> select('nama',DB::raw('count(*) as totalpekerjaan'))
				-> groupBy('nama')
				->get();
		// dd($datapekerjaanKecamatan);

		$dataprosespengadaan = Pekerjaan::where('ta',$ta)
				-> select('propeng',DB::raw('count(*) as totalpropeng'))
				-> groupBy('propeng')
				->get();
		// dd($dataprosespengadaan);

		$datajenispekerjaan = Pekerjaan::where('ta',$ta)
				-> select('jnspek',DB::raw('count(*) as totaljnspek'))
				-> groupBy('jnspek')
				->get();
		// dd($datajenispekerjaan);

		$datakatpekerjaan = Pekerjaan::where('ta',$ta)
				-> select('katpek',DB::raw('count(*) as totalkatpek'))
				-> groupBy('katpek')
				->get();
		// dd($datakatpekerjaan);

		$datasumberdanapekerjaan = Pekerjaan::where('ta',$ta)
				-> select('sumberdana',DB::raw('count(*) as totalsumberdana'))
				-> groupBy('sumberdana')
				->get();
		// dd($datakatpekerjaan);

		return view('dashboard/dashboard1',['jumprogram' => $jumprogram, 'jumkegiatan' => $jumkegiatan, 'jumpekerjaan' => $jumpekerjaan, 'totalpagu' => $totalpagu, 'totalkontrak' => $totalkontrak, 'totaldiatas' => $totaldiatas, 'totalsesuai' => $totalsesuai, 'totaldibawah' => $totaldibawah, 'totalkritis' => $totalkritis, 'jumpekerjaanselesai' => $jumpekerjaanselesai,'jumlahpekerjaanbelumkontrak' => $jumlahpekerjaanbelumkontrak,'jumlahpekerjaanbelummonitoring' => $jumlahpekerjaanbelummonitoring, 'jumlahpekerjaanexpired' => $jumlahpekerjaanexpired, 'jumlahpekerjaanakanexpired' => $jumlahpekerjaanakanexpired, 'jumdanacair' => $jumdanacair, 'datapekerjaanKecamatan' => $datapekerjaanKecamatan, 'dataprosespengadaan' => $dataprosespengadaan, 'datajenispekerjaan' => $datajenispekerjaan, 'datakatpekerjaan' => $datakatpekerjaan, 'datasumberdanapekerjaan' => $datasumberdanapekerjaan]);
	}

	public function Dashboard2()
	{
		$ta = session() -> get('ta');
		$jumprogram = Program::where('tahun',$ta) -> get() ->count();
		$jumkegiatan = Kegiatan::where('tahun',$ta) -> get() ->count();
		$jumpekerjaan = Pekerjaan::where('ta',$ta) -> get() ->count();
		$totalpagu = Pekerjaan::where('ta',$ta) -> get() -> sum('nilaipagu');
		$totalkontrak = Pekerjaan::where('ta',$ta) -> get() -> sum('nilaikontrak');
		$totaldiatas = Pekerjaan::where('ta',$ta) -> where('statuskemajuan','Diatas Target')-> get() -> count('statuskemajuan');
		$totalsesuai = Pekerjaan::where('ta',$ta) -> where('statuskemajuan','Sesuai Target')-> get() -> count('statuskemajuan');
		$totaldibawah = Pekerjaan::where('ta',$ta) -> where('statuskemajuan','Dibawah Target')-> get() -> count('statuskemajuan');
		$totalkritis = Pekerjaan::where('ta',$ta) -> where('statuskemajuan','Kritis')-> get() -> count('statuskemajuan');
		$jumpekerjaanselesai = Pekerjaan::where('ta',$ta) -> where('statuspekerjaan','Selesai') -> get() -> count();

		$awalTahun = $ta.'-01-01';
		$akhirTahun = $ta.'-12-31';
		$jumdanacair = 0;
		$jumdanacair = LaporanKeuangan::whereBetween('tanggal',array($awalTahun,$akhirTahun)) -> get() -> sum('pembayaran');
		//dd($jumdanacair);

		$jumlahpekerjaancair = LaporanKeuangan::select('idpekerjaan') 
				-> whereBetween('tanggal',array($awalTahun,$akhirTahun)) 
				-> distinct() 
				-> get();
		$jumlahpekerjaancair = count($jumlahpekerjaancair);
		// dd(count($jumlahpekerjaancair));

		$datadanaKecamatan = Pekerjaan::where('ta',$ta)
				->join('tb_kecamatan', 'tb_pekerjaan.idkecamatan', '=', 'tb_kecamatan.idkecamatan')
				-> select('nama',DB::raw('SUM(nilaikontrak) as totaldana'))
				-> groupBy('nama')
				-> get();
		// dd($datadanaKecamatan);

		$dataprosespengadaan = Pekerjaan::where('ta',$ta)
				-> select('propeng',DB::raw('SUM(nilaikontrak) as totalpropeng'))
				-> groupBy('propeng')
				-> get();
		// dd($dataprosespengadaan);

		$datajenispekerjaan = Pekerjaan::where('ta',$ta)
				-> select('jnspek',DB::raw('SUM(nilaikontrak) as totaljnspek'))
				-> groupBy('jnspek')
				-> get();
		// dd($datajenispekerjaan);

		$datakatpekerjaan = Pekerjaan::where('ta',$ta)
				-> select('katpek',DB::raw('SUM(nilaikontrak) as totalkatpek'))
				-> groupBy('katpek')
				-> get();
		// dd($datakatpekerjaan);

		$datasumberdanapekerjaan = Pekerjaan::where('ta',$ta)
				-> select('sumberdana',DB::raw('SUM(nilaikontrak) as totalsumberdana'))
				-> groupBy('sumberdana')
				-> get();
		// dd($datakatpekerjaan);

		return view('dashboard/dashboard2',['jumprogram' => $jumprogram, 'jumkegiatan' => $jumkegiatan, 'jumpekerjaan' => $jumpekerjaan, 'totalpagu' => $totalpagu, 'totalkontrak' => $totalkontrak, 'totaldiatas' => $totaldiatas, 'totalsesuai' => $totalsesuai, 'totaldibawah' => $totaldibawah, 'totalkritis' => $totalkritis, 'jumlahpekerjaancair' => $jumlahpekerjaancair, 'jumdanacair' => $jumdanacair, 'datadanaKecamatan' => $datadanaKecamatan, 'dataprosespengadaan' => $dataprosespengadaan, 'datajenispekerjaan' => $datajenispekerjaan, 'datakatpekerjaan' => $datakatpekerjaan, 'datasumberdanapekerjaan' => $datasumberdanapekerjaan]);
	}

}