
<div class="x_title text-success">
	<h2>Data Laporan Fisik</h2> 
	@if($edit != null && $edit =='Y')
		<a href="{{asset('/')}}laporanfisik/insert/{{ $pekerjaan -> idpekerjaan }}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
		<a href="{{asset('/')}}laporanfisik/getdatarealisasi/{{ $pekerjaan -> idpekerjaan }}" class="btn btn-info btn-xs" >Singkron</a>
	@endif
	<div class="clearfix"></div>
</div>
<div class="x_content">
	<table class="table table-striped jambo_table">
		<thead>
			<tr>
				<th width="30px" >#</th>
				<!-- <th>idpekerjaan</th> -->
				<th width="100px">Tanggal</th>
				<th width="100px">Minggu Ke</th>
				<th>Keterangan</th>
				<th width="50px">Rencana</th>
				<th width="50px">Realisasi</th>
				@if($edit != null && $edit =='Y')
				<th width="100px">Oleh</th>
				<!-- <th width="150px">Waktu</th> -->
				<th width="100px"></th>
				@endif
			</tr>
		</thead>
		<tbody>
			@php ($no = 1)
			@foreach ($datalaporanfisik as $laporanfisik)
			<tr>
				<td rowspan="2">{{ $no++ }}</td>
				<!-- <td>{{ $laporanfisik['idpekerjaan'] }}</td> -->
				<td>{{ formatTanggal($laporanfisik['tanggal']) }}</td>
				<td class="text-center">{{ $laporanfisik['mingguke'] }}</td>
				<td>{{ $laporanfisik['keterangan'] }}</td>
				<td class="text-center">{{ $laporanfisik['target'] }}%</td>
				<td class="text-center">{{ $laporanfisik['kemajuan'] }}%</td>
				@if($edit != null && $edit =='Y')
				<td>{{ $laporanfisik['modified_by'] }}</td>
				<!-- <td>{{ $laporanfisik['updated_at'] }}</td> -->
				<td align="center">
					<a href="{{asset('/')}}laporanfisik/{{ $laporanfisik->idlaporanfisik }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
					<a href="{{asset('/')}}laporanfisik/{{ $laporanfisik->idlaporanfisik }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
				</td>
				@endif
			</tr>
			<tr>
				<td colspan="7">
    			@include('photofisik/photofisikthumb')
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>


