@extends('templates.app')

@section('title')
	Data Program Kegiatan Pekerjaan
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
			<h2>Program - Kegiatan - Pekerjaan Tahun Anggaran {{session()->get('ta')}}</h2> 
			<div class="clearfix"></div>
		</div>
		<div class="x_content" id="data">
			<table class="table table-striped jambo_table">
				<thead>
					<tr>
						<th width="120px">No Rekening</th>
						<th>Program Kegiatan Pekerjaan</th>
						<th width="140px">Nilai Pagu</th>
						<th width="140px">Nilai Kontrak</th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@php ($totalAllPagu = 0)
					@php ($totalAllKontrak = 0)
					@foreach ($dataprogram as $program)
					<tr class="info">
						<td>{{ $program['norekening'] }}</td>
						<td>{{ $program['namaprogram'] }}</td>
						<td></td>
						<td></td>
					</tr>
						@foreach ($program->datakegiatan as $kegiatan)
						<tr class="success">
							<td>{{ $kegiatan['norekening'] }}</td>
							<td>&nbsp;&nbsp;&nbsp;{{ $kegiatan['namakegiatan'] }}</td>
							<td></td>
							<td></td>
						</tr>
							@php ($totalpagu = 0)
							@php ($totalkontrak = 0)
							@foreach ($kegiatan->datapekerjaan as $pekerjaan)
								<tr>
									<td></td>
									<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $pekerjaan['namapekerjaan'] }}</td>
									<td class="text-right">{{ formatNumber($pekerjaan['nilaipagu']) }}</td>
									<td class="text-right">{{ formatNumber($pekerjaan['nilaikontrak']) }}</td>
								</tr>
								@php ($totalpagu += $pekerjaan['nilaipagu'])
								@php ($totalkontrak += $pekerjaan['nilaikontrak'])
							@endforeach
							<tr class="warning">
								<td></td>
								<td><strong>Sub Total</strong></td>
								<td class="text-right"><strong>{{ formatNumber($totalpagu) }}</strong></td>
								<td class="text-right"><strong>{{ formatNumber($totalkontrak) }}</strong></td>
							</tr>
							@php ($totalAllPagu += $totalpagu)
							@php ($totalAllKontrak += $totalkontrak)
						@endforeach
					@endforeach
					<tr class="danger">
						<td></td>
						<td><strong>Total</strong></td>
						<td class="text-right"><strong>{{ formatNumber($totalAllPagu) }}</strong></td>
						<td class="text-right"><strong>{{ formatNumber($totalAllKontrak) }}</strong></td>
					</tr>
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
    printData("cetak");
	});
});
</script>
@endsection
