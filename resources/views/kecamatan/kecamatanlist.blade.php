@extends('templates.app')

@section('title')
  Data Kecamatan
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Kecamatan</h2> 
			<a href="{{asset('/')}}kecamatan/insert" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped jambo_table">
				<thead>
					<tr class="headings">
						<th width="30px">#</th>
						<th>Nama Kecamatan</th>
						<th width="140px">Kode Kecamatan</th>
						<th width="80px">Status</th>
						<th width="80px">Oleh</th>
						<!-- <th>created_by</th> -->
						<th width="140px">Waktu</th>
						<th width="140px"></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($datakecamatan as $kecamatan)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $kecamatan['nama'] }}</td>
						<td>{{ $kecamatan['kode'] }}</td>
						<td class="text-center">{{ $kecamatan['status'] }}</td>
						<td>{{ $kecamatan['modified_by'] }}</td>
						<!-- <td>{{ $kecamatan['created_by'] }}</td> -->
						<td>{{ $kecamatan['updated_at'] }}</td>
						<td align="center">
							<a href="{{asset('/')}}kecamatan/{{ $kecamatan->idkecamatan }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
							<a href="{{asset('/')}}kecamatan/{{ $kecamatan->idkecamatan }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
							<a href="{{asset('/')}}desa/{{ $kecamatan->idkecamatan }}" class="btn btn-primary btn-xs">Desa</i></a>

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
