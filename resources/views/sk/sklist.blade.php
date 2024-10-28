@extends('templates.app')

@section('title')
  Data SK
@endsection

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data SK</h2> 
			<a href="{{asset('/')}}sk/insert" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped jambo_table">
				<thead>
					<tr>
						<th>#</th>
						<th>No SK</th>
						<th>Nama SK</th>
						<th>Tanggal</th>
						<th>Tahun</th>
						<!-- <th>Oleh</th> -->
						<!-- <th>created_at</th> -->
						<!-- <th>Waktu</th> -->
						<th width="150px"></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($datask as $sk)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $sk['nosk'] }}</td>
						<td>{{ $sk['namask'] }}</td>
						<td class="text-center">{{ formatTanggal($sk['tglsk']) }}</td>
						<td class="text-center">{{ $sk['tahun'] }}</td>
						<!-- <td>{{ $sk['modified_by'] }}</td> -->
						<!-- <td>{{ $sk['created_at'] }}</td> -->
						<!-- <td>{{ $sk['updated_at'] }}</td> -->
						<td class="text-center">
							<a href="{{asset('/')}}sk/{{ $sk->idsk }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
							<a href="{{asset('/')}}sk/{{ $sk->idsk }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
							<a href="{{asset('/')}}penjabat/{{ $sk->idsk }}" class="btn btn-primary btn-xs">Pejabat</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

