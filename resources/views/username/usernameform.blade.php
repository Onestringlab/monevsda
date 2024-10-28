@extends('templates.app')

@section('title')
  Data Username
@endsection

@section('content')


<script>
function button_cancel(){
	location.replace('{{ asset('/') }}username');
}
</script>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Form Username</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}username/manage" method="post" enctype="multipart/form-data">
				@if($action == 'insert')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Username</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="username" value="" {!! fieldRequired('Masukkan Username Dengan Benar') !!}>
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="name" value="" {!! fieldRequired('Masukkan Nama Dengan Benar') !!}>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Email</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="email" name="email" value="" {!! fieldRequired('Masukkan Email Dengan Benar') !!}>
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Role</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datarole,'kode','value','role','')!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="file" name="photo" value="" {!! fieldRequired('Masukkan Photo') !!}>
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Password</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="password" name="password" value="" {!! fieldRequired('Masukkan Password') !!}>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-3">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<button type="submit" class="btn btn-success">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'update')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Username</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="username" value="{{ $row->username }}">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="name" value="{{ $row->name }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Email</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="email" value="{{ $row->email }}">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Role</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datarole,'kode','value','role',$row->role)!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="file" name="photo" value="">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Password</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="password" name="password" value="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idusername" value = "{{ $row->idusername }}"?>
							<input type = "hidden" name = "photolama" value = "{{ $row->photo }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Username</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->username }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->name }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Email</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->email }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Role</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->role }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Oleh</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->modified_by }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Waktu</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->updated_at }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idusername" value = "{{ $row->idusername }}"?>
							<button type="submit" class="btn btn-success">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@endif
					{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Pengguna</h2> 
			<a href="{{asset('/')}}username/insert" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped table-bordered ">
				<thead>
					<tr>
						<th>#</th>
						<th>Username</th>
						<th>Nama</th>
						<th>E-Mail</th>
						<th>Role</th>
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
</div>


@endsection
