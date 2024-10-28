@extends('templates.app')

@section('title')
	Data Program
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Program</h2> 
			<a href="{{asset('/')}}program/insert" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped jambo_table">
				<thead>
					<tr>
						<th>#</th>
						<th width="120px">Bidang</th>
						<th width="120px" >No Rekening</th>
						<th>Nama Program</th>
						<th>Tahun</th>
						<!-- <th>Oleh</th> -->
						<!-- <th>created_at</th> -->
						<!-- <th width="150px">Waktu</th> -->
						<th width="160px"></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($dataprogram as $program)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $program['bidang'] }}</td>
						<td class="text-center">{{ $program['norekening'] }}</td>
						<td>{{ $program['namaprogram'] }}</td>
						<td class="text-center">{{ $program['tahun'] }}</td>
						<!-- <td>{{ $program['modified_by'] }}</td> -->
						<!-- <td>{{ $program['created_at'] }}</td> -->
						<!-- <td>{{ $program['updated_at'] }}</td> -->
						<td align="text-center">
							<a href="{{asset('/')}}program/{{ $program->idprogram }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
							<a href="{{asset('/')}}program/{{ $program->idprogram }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
							<a href="{{asset('/')}}kegiatan/{{ $program->idprogram }}" class="btn btn-primary btn-xs">Kegiatan</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
