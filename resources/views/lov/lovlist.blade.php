@extends('templates.app')

@section('title')
  Data Lov
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Lov</h2> 
			<a href="{{asset('/')}}lov/insert" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped jambo_table">
				<thead>
					<tr>
						<th>#</th>
						<th>Kategori</th>
						<th>Kode</th>
						<th>Value</th>
						<th>Status</th>
						<th width="100px">Oleh</th>
						<!-- <th>created_at</th> -->
						<th width="120px">Waktu</th>
						<th width="100px"></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($datalov as $lov)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $lov['kategori'] }}</td>
						<td>{{ $lov['kode'] }}</td>
						<td>{{ $lov['value'] }}</td>
						<td>{{ $lov['status'] }}</td>
						<td>{{ $lov['modified_by'] }}</td>
						<!-- <td>{{ $lov['created_at'] }}</td> -->
						<td>{{ $lov['updated_at'] }}</td>
						<td align="center">
							<a href="{{asset('/')}}lov/{{ $lov->idlov }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
							<a href="{{asset('/')}}lov/{{ $lov->idlov }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

