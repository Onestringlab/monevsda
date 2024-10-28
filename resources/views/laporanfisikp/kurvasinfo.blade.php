<div class="x_title text-primary">
	<h2>Data Kurva S</h2> 
	<div class="clearfix"></div>
</div>
<div  class="col-md-12 col-sm-12 col-xs-12">
	<table class="table table-striped jambo_table" style="font-size: 10px">
		<tr>
			<th class="text-left bg-primary" width="100px">Minggu Ke</th>
			@foreach ($datalaporanfisikp as $laporanfisikp)
			<td class="text-center bg-info">{{ $laporanfisikp["mingguke"] }}</td>
			@endforeach
		</tr>
		<tr>
			<th class="text-left bg-primary" width="100px">Tanggal</th>
			@foreach ($datalaporanfisikp as $laporanfisikp)
			<td class="text-center bg-info">{{ formatTanggal($laporanfisikp["tanggal"]) }}</td>
			@endforeach
		</tr>
		<tr>
			<th class="text-left bg-primary">Rencana (%)</th>
			@foreach ($datalaporanfisikp as $laporanfisikp)
			<td class="text-center ">{{ $laporanfisikp["target"] }}</td>
			@endforeach
		</tr>
		<tr>
			<th class="text-left bg-primary">Realisasi (%)</th>
			@foreach ($datalaporanfisikp as $laporanfisikp)
			<td class="text-center ">{{ $laporanfisikp["kemajuan"] }}</td>
			@endforeach
		</tr>
		<tr>
			<th class="text-left bg-primary">Deviasi (%)</th>
			@php ($class = "")
			@foreach ($datalaporanfisikp as $laporanfisikp)
			@php($selisih = $laporanfisikp["kemajuan"] - $laporanfisikp["target"])
			@if($selisih >= 0)
			@php ($class = "")
			@elseif($selisih >= -5)
			@php ($class = "warning")
			@elseif($selisih < -5)
			@php ($class = "danger")
			@endif
			<td class="text-center {{$class}}">{{ $selisih }}</td>
			@endforeach
		</tr>
	</table>
</div>