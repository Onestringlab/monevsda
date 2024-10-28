@extends('templates.app')

@section('title')
  Data Username
@endsection

@section('content')
<style>
th{
    text-align:center;
}
</style>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Pengguna</h2> 
			<a href="{{asset('/')}}username/insert" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped jambo_table">
				<thead>
					<tr>
						<th>#</th>
						<th>Username</th>
						<th>Nama</th>
						<th>E-Mail</th>
						<th>Role</th>
						<th>Photo</th>
						<th>Oleh</th>
						{{--  <th>created_at</th>  --}}
						<th>Waktu</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($datausername as $username)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $username['username'] }}</td>
						<td>{{ $username['name'] }}</td>
						<td>{{ $username['email'] }}</td>
						<td>{{ $username['role'] }}</td>
						<td> <img src="{{asset('/')}}dataunggah/gambar/{{ $username['photo']}}" width="50px"></td>
						<td>{{ $username['modified_by'] }}</td>
						{{--  <td>{{ $username['created_at'] }}</td>  --}}
						<td>{{ $username['updated_at'] }}</td>
						<td align="center">
							<a href="{{asset('/')}}username/{{ $username->idusername }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
							<a href="{{asset('/')}}username/{{ $username->idusername }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>



@endsection


