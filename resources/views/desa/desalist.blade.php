@extends('templates.app')

@section('title')
  Data Desa
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Desa</h2> 
			<a href="{{asset('/')}}desa/insert/{{$idkecamatan}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped table-bordered ">
				<thead>
					<tr>
						<th>#</th>
						<th>Kecamatan</th>
						<th>Nama Desa</th>
						<th>Kode</th>
						<th>Status</th>
						<th>Oleh</th>
						<!-- <th>created_at</th> -->
						<th>Waktu</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($datadesa as $desa)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $desa->kecamatan['nama'] }}</td>
						<td>{{ $desa['nama'] }}</td>
						<td>{{ $desa['kode'] }}</td>
						<td>{{ $desa['status'] }}</td>
						<td>{{ $desa['modified_by'] }}</td>
						<!-- <td>{{ $desa['created_at'] }}</td> -->
						<td>{{ $desa['updated_at'] }}</td>
						<td align="center">
							<a href="{{asset('/')}}desa/{{ $desa->iddesa }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
							<a href="{{asset('/')}}desa/{{ $desa->iddesa }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
