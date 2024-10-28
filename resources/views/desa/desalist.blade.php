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
			<table class="table table-striped jambo_table">
				<thead>
					<tr class="headings">
						<th >#</th>
						<th>Kecamatan</th>
						<th>Nama Desa</th>
						<th>Kode</th>
						<th width="80px">Status</th>
						<th width="80px">Oleh</th>
						<!-- <th>created_by</th> -->
						<th width="140px">Waktu</th>
						<th width="140px"></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($datadesa as $desa)
					<tr>
						<td class="text-center">{{ $no++ }}</td>
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
