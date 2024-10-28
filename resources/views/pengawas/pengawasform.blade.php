@extends('templates.app')

@section('title')
Data Pengawas 
@endsection

@section('content')
<script>
	function button_cancel(){
		location.replace('{{ asset('/') }}pengawas');
	}
</script>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Data Pengawas </h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<form class="form-horizontal" action="{{ asset('/') }}pengawas/manage" method="post" enctype="multipart/form-data">
					@if($action == 'insert')
					<!-- <div class="form-group row">
						<label for="idpengawas" class="col-xs-12 col-sm-2 col-md-2 tebal">idpengawas</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="idpengawas" value="">
						</div>
					</div> -->
					<div class="form-group row">
						<label for="idkonsultan" class="col-xs-12 col-sm-2 col-md-2 tebal">Perusahaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datakonsultan,'idkonsultan','nama','idkonsultan','','Y')!!}
						</div>
						<label for="name" class="col-xs-12 col-sm-2 col-md-2 tebal">Nama</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="name" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="username" class="col-xs-12 col-sm-2 col-md-2 tebal">Username</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="username" value="">
						</div>
						<label for="email" class="col-xs-12 col-sm-2 col-md-2 tebal">Email</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="email" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-xs-12 col-sm-2 col-md-2 tebal">Password</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="password" name="password" value="">
						</div>
						<label for="photo" class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="file" name="photo" value="" {!! fieldRequired('Masukkan Photo') !!}>
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="modified_by" class="col-xs-12 col-sm-2 col-md-2 tebal">modified_by</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="modified_by" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="created_at" class="col-xs-12 col-sm-2 col-md-2 tebal">created_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="created_at" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="updated_at" class="col-xs-12 col-sm-2 col-md-2 tebal">updated_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="updated_at" value="">
						</div>
					</div> -->
					<div class="form-group">
						<div class="offset-sm-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<button type="submit" class="btn btn-primary">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
					@elseif($action == 'update')
					<!-- <div class="form-group row">
						<label for="idpengawas" class="col-xs-12 col-sm-2 col-md-2 tebal">idpengawas</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="idpengawas" value="{{ $row->idpengawas }}">
						</div>
					</div> -->
					<div class="form-group row">
						<label for="idkonsultan" class="col-xs-12 col-sm-2 col-md-2 tebal">Perusahaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datakonsultan,'idkonsultan','nama','idkonsultan',$row->idkonsultan,'Y')!!}
						</div>
						<label for="name" class="col-xs-12 col-sm-2 col-md-2 tebal">Nama</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="name" value="{{ $row->name }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="username" class="col-xs-12 col-sm-2 col-md-2 tebal">Username</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="username" value="{{ $row->username }}">
						</div>
						<label for="email" class="col-xs-12 col-sm-2 col-md-2 tebal">Email</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="email" value="{{ $row->email }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-xs-12 col-sm-2 col-md-2 tebal">Password</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="password" name="password" value="">
						</div>
						<label for="photo" class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="file" name="photo" value="">
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="modified_by" class="col-xs-12 col-sm-2 col-md-2 tebal">modified_by</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="modified_by" value="{{ $row->modified_by }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="created_at" class="col-xs-12 col-sm-2 col-md-2 tebal">created_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="created_at" value="{{ $row->created_at }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="updated_at" class="col-xs-12 col-sm-2 col-md-2 tebal">updated_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="updated_at" value="{{ $row->updated_at }}">
						</div>
					</div> -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idpengawas" value = "{{ $row->idpengawas }}"?>
							<input type = "hidden" name = "photolama" value = "{{ $row->photo }}"?>
							<button type="submit" class="btn btn-primary">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
					@elseif($action == 'delete')
					<div class="form-group row">
						<label for="idkonsultan" class="col-xs-12 col-sm-2 col-md-2 tebal">Perusahaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->konsultan['nama'] }}
						</div>
						<label for="name" class="col-xs-12 col-sm-2 col-md-2 tebal">Nama</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->name }}
						</div>
					</div>
					<div class="form-group row">
						<label for="username" class="col-xs-12 col-sm-2 col-md-2 tebal">Username</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->username }}
						</div>
						<label for="email" class="col-xs-12 col-sm-2 col-md-2 tebal">Email</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->email }}
						</div>
						
					</div>
					<div class="form-group row">
						<label for="password" class="col-xs-12 col-sm-2 col-md-2 tebal">Password</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							
						</div>
						<label for="photo" class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<img width="120" src="{{asset('/dataunggah/gambar')}}/{{ $row['photo'] }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idpengawas" value = "{{ $row->idpengawas }}"?>
							<input type = "hidden" name = "photo" value = "{{ $row->photo }}"?>
							<button type="submit" class="btn btn-primary">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
					@elseif($action == 'detail')
					<div class="form-group row">
						<label for="idkonsultan" class="col-xs-12 col-sm-2 col-md-2 tebal">Perusahaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->konsultan['nama'] }}
						</div>
						<label for="name" class="col-xs-12 col-sm-2 col-md-2 tebal">Nama</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->name }}
						</div>
					</div>
					<div class="form-group row">
						<label for="username" class="col-xs-12 col-sm-2 col-md-2 tebal">Username</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->username }}
						</div>
						<label for="email" class="col-xs-12 col-sm-2 col-md-2 tebal">Email</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->email }}
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-xs-12 col-sm-2 col-md-2 tebal">Password</label>
						<div class="col-xs-12 col-sm-4 col-md-4">	
						</div>
						<label for="photo" class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<img width="120" src="{{asset('/dataunggah/gambar')}}/{{ $row['photo'] }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Back</button>
						</div>
					</div>
					@endif
					{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>
</div>
@endsection	
