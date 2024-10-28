@extends('templates.app')

@section('title')
Data Photo Fisik
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data PhotoFisikp </h2> 
			<a href="{{asset('/')}}photofisikp/insert" class="btn btn-success btn-xs" > <i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped jambo_table" style="table-layout: fixed;">
				<thead>
					<tr>
						<th>idphotofisikp</th>
						<th>idlaporanfisikp</th>
						<th>judul</th>
						<th>photofisik</th>
						<th>status</th>
						<th>modified_by</th>
						<th>created_at</th>
						<th>updated_at</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($rows as $row)
					<tr>
						<td>{{ $row['idphotofisikp'] }}</td>
						<td>{{ $row['idlaporanfisikp'] }}</td>
						<td>{{ $row['judul'] }}</td>
						<td>{{ $row['photofisik'] }}</td>
						<td>{{ $row['status'] }}</td>
						<td>{{ $row['modified_by'] }}</td>
						<td>{{ $row['created_at'] }}</td>
						<td>{{ $row['updated_at'] }}</td>
						<td align="center">
							<a href="{{asset('/')}}photofisikp/{{ $row->idphotofisikp }}/detail" class="btn btn-dark btn-xs"><i class="fa fa-desktop"></i></a>
							<a href="{{asset('/')}}photofisikp/{{ $row->idphotofisikp }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
							<a href="{{asset('/')}}photofisikp/{{ $row->idphotofisikp }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

