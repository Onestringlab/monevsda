@extends('templates.app')

@section('title')
Data Pengawas 
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Pengawas&nbsp;</h2> 
			<a href="{{asset('/')}}pengawas/insert" class="btn btn-success btn-xs" > <i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped jambo_table" style="table-layout: fixed;">
				<thead>
					<tr>
						<th width="30px">#</th>
						<th width="180px">Perusahaan</th>
						<th>Username</th>
						<th>Name</th>
						<th>email</th>
						<!-- <th>password</th> -->
						<th>photo</th>
						<!-- <th>modified_by</th> -->
						<!-- <th>created_at</th> -->
						<!-- <th>updated_at</th> -->
						<th></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($rows as $row)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $row->konsultan['nama'] }}</td>
						<td>{{ $row['username'] }}</td>
						<td>{{ $row['name'] }}</td>
						<td>{{ $row['email'] }}</td>
						<!-- <td>{{ $row['password'] }}</td> -->
						<td><img width="120" src="{{asset('/dataunggah/gambar')}}/{{ $row['photo'] }}"></td>
						<!-- <td>{{ $row['modified_by'] }}</td> -->
						<!-- <td>{{ $row['created_at'] }}</td> -->
						<!-- <td>{{ $row['updated_at'] }}</td> -->
						<td align="center">
							<a href="{{asset('/')}}pengawas/{{ $row->idpengawas }}/detail" class="btn btn-dark btn-xs"><i class="fa fa-desktop"></i></a>
							<a href="{{asset('/')}}pengawas/{{ $row->idpengawas }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
							<a href="{{asset('/')}}pengawas/{{ $row->idpengawas }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

