@extends('templates.app')

@section('title')
	Data Pekerjaan
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title text-primary">
			<h2>Data Pekerjaan</h2> 
			<div class="clearfix"></div>
		</div>
		<div><input type="text" class="search form-control" placeholder="Cari Disini..."></div>
		<div class="x_content">
			<table class="table table-striped jambo_table results">
				<thead>
					<tr>
						<th  width="30px">#</th>
						<!-- <th>Kegiatan</th>
						<th>kabupaten</th>
						<th>satuankerja</th>
						<th>dpa</th>
						<th>norka</th> -->
						<th>Nama Pekerjaan</th>
						<!-- <th >No Kontrak</th> -->
						<th width="100px">Tgl Kontrak</th>
						<!-- <th>tglselesaipemeliharaan</th>
						<th>jmlhhari</th>
						<th>tglspmk</th>
						<th>nospmk</th>
						<th>tglpa</th>
						<th>nopa</th>
						<th>namapa</th>
						<th>tglppk</th>
						<th>noppk</th>
						<th>namappk</th>
						<th>tglpptk</th>
						<th>nopptk</th>
						<th>namapptk</th>
						<th>tglpenerima</th>
						<th>nopenerima</th>
						<th>namapenerima</th>
						<th>tglpphp</th>
						<th>nopphp</th>
						<th>timpphp</th> -->
						<!-- <th>bidang</th>
						<th>jnspek</th>
						<th>katpek</th>
						<th>ta</th>
						<th>propeng</th>
						<th>tahunkontrak</th>
						<th>nilaipagu</th> -->
						<th width="100px">Tgl Selesai</th>
						<th width="140px">Nilai Kontrak</th>
						<!-- <th>sumberdana</th>
						<th>konpengawas</th>
						<th>konperencana</th>
						<th>konpelaksana</th>
						<th>idkecamatan</th>
						<th>iddesa</th>
						<th>status</th>
						<th>created_at</th>
						<th>updated_at</th> -->
						<!-- <th width="120px">Status Kemajuan</th> -->
						<th width="180px"></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($datapekerjaan as $pekerjaan)
						@php ($class = "")
						@if($pekerjaan['statuskemajuan'] != "" && $pekerjaan['statuskemajuan']== "Kritis")
							@php ($class = "danger")
						@elseif ($pekerjaan['statuskemajuan'] != "" && $pekerjaan['statuskemajuan']== "Dibawah Target")
							@php ($class = "warning")
						@endif
					<tr class="{{ $class }}">
						<td class="text-center">{{ $no++ }}.</td>
						<!-- <td>{{ $pekerjaan['idkegiatan'] }}</td>
						<td>{{ $pekerjaan['kabupaten'] }}</td>
						<td>{{ $pekerjaan['satuankerja'] }}</td>
						<td>{{ $pekerjaan['dpa'] }}</td>
						<td>{{ $pekerjaan['norka'] }}</td> -->
						<td>{{ $pekerjaan['namapekerjaan'] }}
							<br> No. Kontrak : {{ $pekerjaan['nokontrak'] }}</td>
						<!-- <td>{{ $pekerjaan['nokontrak'] }}</td> -->
						<td class="text-center">{{ formatTanggal($pekerjaan['tglkontrak']) }}</td>
						<!-- <td>{{ $pekerjaan['tglselesaipemeliharaan'] }}</td>
						<td>{{ $pekerjaan['jmlhhari'] }}</td>
						<td>{{ $pekerjaan['tglspmk'] }}</td>
						<td>{{ $pekerjaan['nospmk'] }}</td>
						<td>{{ $pekerjaan['tglpa'] }}</td>
						<td>{{ $pekerjaan['nopa'] }}</td>
						<td>{{ $pekerjaan['namapa'] }}</td>
						<td>{{ $pekerjaan['tglppk'] }}</td>
						<td>{{ $pekerjaan['noppk'] }}</td>
						<td>{{ $pekerjaan['namappk'] }}</td>
						<td>{{ $pekerjaan['tglpptk'] }}</td>
						<td>{{ $pekerjaan['nopptk'] }}</td>
						<td>{{ $pekerjaan['namapptk'] }}</td>
						<td>{{ $pekerjaan['tglpenerima'] }}</td>
						<td>{{ $pekerjaan['nopenerima'] }}</td>
						<td>{{ $pekerjaan['namapenerima'] }}</td>
						<td>{{ $pekerjaan['tglpphp'] }}</td>
						<td>{{ $pekerjaan['nopphp'] }}</td>
						<td>{{ $pekerjaan['timpphp'] }}</td> -->
						<!-- <td>{{ $pekerjaan['bidang'] }}</td>
						<td>{{ $pekerjaan['jnspek'] }}</td>
						<td>{{ $pekerjaan['katpek'] }}</td>
						<td>{{ $pekerjaan['ta'] }}</td>
						<td>{{ $pekerjaan['propeng'] }}</td>
						<td>{{ $pekerjaan['tahunkontrak'] }}</td>
						<td>{{ $pekerjaan['nilaipagu'] }}</td> -->
						<td class="text-center">{{ formatTanggal($pekerjaan['tglselesaikerja']) }}</td>
						<td class="text-right">{{ formatNumber($pekerjaan['nilaikontrak']) }}</td>
						<!-- <td>{{ $pekerjaan['sumberdana'] }}</td>
						<td>{{ $pekerjaan['konpengawas'] }}</td>
						<td>{{ $pekerjaan['konperencana'] }}</td>
						<td>{{ $pekerjaan['konpelaksana'] }}</td>
						<td>{{ $pekerjaan['idkecamatan'] }}</td>
						<td>{{ $pekerjaan['iddesa'] }}</td>
						<td>{{ $pekerjaan['status'] }}</td>
						<td>{{ $pekerjaan['created_at'] }}</td>
						<td>{{ $pekerjaan['updated_at'] }}</td> -->
						<!-- <td>{{ $pekerjaan['statuskemajuan'] }}</td> -->
						<td align="center">
							<a href="{{asset('/')}}alatp/{{ $pekerjaan->idpekerjaan }}" class="btn btn-dark btn-xs"><i class="fa fa-wrench"></i></a>
							<a href="{{asset('/')}}koordinatp/{{ $pekerjaan->idpekerjaan }}" class="btn btn-primary btn-xs"><i class="fa fa-map"></i></a>
							<a href="{{asset('/')}}laporanfisikp/{{ $pekerjaan->idpekerjaan }}" class="btn btn-primary btn-xs"><i class="fa fa-desktop"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
function printdiv(idpekerjaan) {
    var mywindow = window.open("https://monevsda-kkr.com/public/pekerjaandetailprint/"+idpekerjaan);
}
</script>
@endsection
