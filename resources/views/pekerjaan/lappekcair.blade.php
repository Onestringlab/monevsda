@extends('templates.app')

@section('title')
	Data Pencairan Dana Pekerjaan
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	@if(session()->get('role')=='Superman')
		<a href="#" id ="export"  class="btn btn-success btn-xs"><i class="fa fa-download"></i></a>
		<a href="#" id ="print"  class="btn btn-info btn-xs"><i class="fa fa-print"></i></a>
	@endif
	<div class="x_panel" id="cetak">
		<div>
			<img src="{{asset('/')}}images/kopSuratPUPR.jpeg" width="100%">
		</div>
		<div class="x_title text-primary">
			<h2>Data Pencairan Dana Pekerjaan</h2> 
			<div class="clearfix"></div>
		</div>
		<div id="caridata">
			<!-- <div class="form-group"> -->
				<form class="form-horizontal" action="{{ asset('/') }}lappekcair" method="get">
					<div class="col-xs-12 col-sm-12 col-md-12 tebal input-group" >
						<select class="form-control" name="pencarian">
							<option value="Belum Pencairan" 
								@if($pencarian == "Belum Pencairan") selected @endif>Belum Pencairan</option>
							<option value="Sudah Pencairan"
								@if($pencarian == "Sudah Pencairan") selected @endif>Sudah Pencairan</option>
						</select>
            <span class="input-group-btn">
               <button type="submit" class="btn btn-primary">	<i class="fa fa-search white"></i> Pencarian Data</button>
            </span>
					</div>
				</form>
			<!-- </div> -->
		</div>
		<div class="x_content" id="data">
			<table class="table table-striped jambo_table results">
				<thead>
					<tr>
						<th width="25px">#</th>
						<!-- <th>Kegiatan</th>
						<th>kabupaten</th>
						<th>satuankerja</th>
						<th>dpa</th>
						<th>norka</th> -->
						<th>Nama Pekerjaan</th>
						<!-- <th >No Kontrak</th> -->
						<th width="90px">Tgl Kontrak</th>
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
						<th width="90px">Tgl Selesai</th>
						<th width="150px">Nilai Kontrak</th>
						<!-- <th>sumberdana</th>
						<th>konpengawas</th>
						<th>konperencana</th>
						<th>konpelaksana</th>
						<th>idkecamatan</th>
						<th>iddesa</th> -->
						<th width="100px">Kemajuan</th>
						<!-- <th>created_at</th> -->
						<!-- <th>updated_at</th> -->
						<th width="120px">Status</th>
						<!-- <th width="180px"></th> -->
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
						<td>{{ $pekerjaan['namapekerjaan'] }} <br> No. Kontrak :{{ $pekerjaan['nokontrak'] }}</td>
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
					<!-- 	<td>{{ $pekerjaan['sumberdana'] }}</td>
						<td>{{ $pekerjaan['konpengawas'] }}</td>
						<td>{{ $pekerjaan['konperencana'] }}</td>
						<td>{{ $pekerjaan['konpelaksana'] }}</td>
						<td>{{ $pekerjaan['idkecamatan'] }}</td>
						<td>{{ $pekerjaan['iddesa'] }}</td> -->
						<td class="text-center">{{ $pekerjaan['realisasikemajuan'] }}%</td>
						<!-- <td>{{ $pekerjaan['created_at'] }}</td> -->
						<!-- <td>{{ $pekerjaan['updated_at'] }}</td> -->
						<td class="text-center">

							<!-- {{ $pekerjaan['statuskemajuan'] }} -->
							{{ $pekerjaan['statuskemajuan'] }}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
	$("#export").click(function (event) {
    // var outputFile = 'export'
    var outputFile = window.prompt("Tuliskan Nama File .csv :");
    if(outputFile != null && outputFile !=''){
	    outputFile = outputFile.replace('.csv','') + '.csv'
	    // CSV
	    exportTableToCSV.apply(this, [$('#data>table'), outputFile]);
	  }
  });
  $("#print").click(function () {
    $("#caridata").hide();
    printData("cetak");
    $("#caridata").shows();
	});
});
</script>
@endsection
