@extends('templates.app')

@section('title')
	Data Pekerjaan
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title text-primary">
			<h2>Data Pekerjaan</h2> 
			<a href="{{asset('/')}}pekerjaan/insert/{{ $idkegiatan }}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped jambo_table">
				<thead>
					<tr>
						<th width="30px">#</th>
						<!-- <th>Kegiatan</th>
						<th>kabupaten</th>
						<th>satuankerja</th>
						<th>dpa</th>
						<th>norka</th> -->
						<th width="250px">Nama Pekerjaan</th>
						<!-- <th>No Kontrak</th> -->
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
						<th width="180px"></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($datapekerjaan as $pekerjaan)
					<tr>
						<td>{{ $no++ }}.</td>
						<!-- <td>{{ $pekerjaan['idkegiatan'] }}</td>
						<td>{{ $pekerjaan['kabupaten'] }}</td>
						<td>{{ $pekerjaan['satuankerja'] }}</td>
						<td>{{ $pekerjaan['dpa'] }}</td>
						<td>{{ $pekerjaan['norka'] }}</td> -->
						<td>{{ $pekerjaan['namapekerjaan'] }} <br> No. Kontrak :{{ $pekerjaan['nokontrak'] }}</td>
						<!-- <td>{{ $pekerjaan['nokontrak'] }}</td> -->
						<td class="text-center">{{ $pekerjaan['tglkontrak'] }}</td>
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
						<td align="center">
							<a href="{{asset('/')}}pekerjaanmonev/{{ $pekerjaan->idpekerjaan }}" class="btn btn-dark btn-xs"><i class="fa fa-desktop"></i></a>
							<a href="{{asset('/')}}pekerjaandetail/{{ $pekerjaan->idpekerjaan }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></a>
							<a id="myLink" href="#" onclick="printdiv({{ $pekerjaan->idpekerjaan }});" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-print"></i></a>
							<a href="{{asset('/')}}pekerjaan/{{ $pekerjaan->idpekerjaan }}/update/n" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
							<a href="{{asset('/')}}pekerjaan/{{ $pekerjaan->idpekerjaan }}/delete/n" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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
