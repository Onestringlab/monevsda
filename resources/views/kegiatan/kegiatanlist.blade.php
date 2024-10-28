@extends('templates.app')

@section('title')
	Data Kegiatan
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Kegiatan</h2> 
			<a href="{{asset('/')}}kegiatan/insert/{{ $idprogram }}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped jambo_table">
				<thead>
					<tr>
						<th>#</th>
						<!-- <th>Program</th> -->
						<th width="120">No Rekening</th>
						<th>Nama Kegiatan</th>
						<th>Tahun</th>
						<!-- <th width="100px">Oleh</th> -->
						<!-- <th width="150px">Waktu</th> -->
						<th width="160px"></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($datakegiatan as $kegiatan)
					<tr>
						<td>{{ $no++ }}</td>
						<!-- <td>{{ $kegiatan -> program -> namaprogram }}</td> -->
						<td class="text-center">{{ $kegiatan['norekening'] }}</td>
						<td>{{ $kegiatan['namakegiatan'] }}</td>
						<td class="text-center">{{ $kegiatan['tahun'] }}</td>
						<!-- <td>{{ $kegiatan['modified_by'] }}</td> -->
						<!-- <td>{{ $kegiatan['created_at'] }}</td> -->
						<!-- <td>{{ $kegiatan['updated_at'] }}</td> -->
						<td align="center">
							<a href="{{asset('/')}}kegiatan/{{ $kegiatan->idkegiatan }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
							<a href="{{asset('/')}}kegiatan/{{ $kegiatan->idkegiatan }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
							<a href="{{asset('/')}}pekerjaan/{{ $kegiatan->idkegiatan }}" class="btn btn-primary btn-xs">Pekerjaan</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

