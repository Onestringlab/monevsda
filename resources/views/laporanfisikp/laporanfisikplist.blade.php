@extends('templates.app')

@section('title')
Data LaporanFisikp 
@endsection

@section('content')
<div class="x_content text-info">
	<div class="x_panel">
		@include('pekerjaan/pekerjaaninfo')
		@include('laporanfisikp/kurvasinfo')
		<div class="x_title">
			<h2>Data Laporan Fisik&nbsp;</h2> 
			<!-- <a href="{{asset('/')}}laporanfisikp/insert/{{$idpekerjaan}}" class="btn btn-success btn-xs" > <i class="fa fa-plus"></i></a> -->
			<a href="{{asset('/')}}laporanfisikp/getdatarencana/{{$idpekerjaan}}" class="btn btn-success btn-xs" >Ambil Data Rencana Pekerjaan</a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped jambo_table" style="table-layout: fixed;">
				<thead>
					<tr>
						<th width="30px">#</th>
						<!-- <th>idpekerjaan</th> -->
						<th width="100px">Tanggal</th>
						<th width="100px">Minggu Ke</th>
						<th>Keterangan</th>
						<th width="100px">Rencana</th>
						<th width="100px">Realisasi</th>
						<th width="100px">Status</th>
						<!-- <th>modified_by</th> -->
						<!-- <th>created_at</th> -->
						<!-- <th>updated_at</th> -->
						<th width="50px"></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($datalaporanfisikp as $laporanfisikp)
					<tr>
						<td>{{ $no++ }}</td>
						<!-- <td>{{ $laporanfisikp['idpekerjaan'] }}</td> -->
						<td class="text-center">{{ formatTanggal($laporanfisikp['tanggal']) }}</td>
						<td class="text-center">{{ $laporanfisikp['mingguke'] }}</td>
						<td>{{ $laporanfisikp['keterangan'] }}</td>
						<td class="text-center">{{ $laporanfisikp['target'] }}</td>
						<td class="text-center">{{ $laporanfisikp['kemajuan'] }}</td>
						<td class="text-center">{{ $laporanfisikp['status'] }}</td>
						<!-- <td>{{ $laporanfisikp['modified_by'] }}</td> -->
						<!-- <td>{{ $laporanfisikp['created_at'] }}</td> -->
						<!-- <td>{{ $laporanfisikp['updated_at'] }}</td> -->
						<td align="center">
							<!-- <a href="{{asset('/')}}laporanfisikp/{{ $laporanfisikp->idlaporanfisikp }}/detail" class="btn btn-dark btn-xs"><i class="fa fa-desktop"></i></a> -->
							<a href="{{asset('/')}}laporanfisikp/{{ $laporanfisikp->idlaporanfisikp }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
							<!-- <a href="{{asset('/')}}laporanfisikp/{{ $laporanfisikp->idlaporanfisikp }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a> -->
						</td>
					</tr>
					<tr>
						<td colspan="8">
		    			@include('photofisikp/photofisikpthumb')
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

