@extends('templates.app')

@section('title')
Data Alat Pekerjaan 
@endsection

@section('content')
<script>
	function button_cancel(idpekerjaan){
		location.replace('{{ asset('/') }}alatp/'+idpekerjaan);
	}
</script>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			@include('pekerjaan/pekerjaaninfo')
			<div class="x_title">
				<h2> Data Alat Pekerjaan</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<form class="form-horizontal" action="{{ asset('/') }}alatp/manage" method="post" enctype="multipart/form-data">
					@if($action == 'insert')
					<!-- <div class="form-group row">
						<label for="idalat" class="col-xs-12 col-sm-2 col-md-2 tebal">idalat</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="idalat" value="">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="idpekerjaan" class="col-xs-12 col-sm-2 col-md-2 tebal">idpekerjaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="idpekerjaan" value="">
						</div>
					</div> -->
					<div class="form-group row">
						<label for="jenis" class="col-xs-12 col-sm-2 col-md-2 tebal">Jenis</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="jenis" value="">
						</div>
						<label for="merk" class="col-xs-12 col-sm-2 col-md-2 tebal">Merk</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="merk" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="tipe" class="col-xs-12 col-sm-2 col-md-2 tebal">Tipe</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="tipe" value="">
						</div>
						<label for="keterangan" class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="keterangan" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="photo" class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="file" name="photo" value="">
						</div>
						<label for="status" class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="status" value="Diajukan" readonly>
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="modified_by" class="col-xs-12 col-sm-2 col-md-2 tebal">modified_by</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="modified_by" value="">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="created_at" class="col-xs-12 col-sm-2 col-md-2 tebal">created_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="created_at" value="">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="updated_at" class="col-xs-12 col-sm-2 col-md-2 tebal">updated_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="updated_at" value="">
						</div>
					</div> -->
					<div class="form-group">
						<div class="offset-sm-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $idpekerjaan }}"?>
							<button type="submit" class="btn btn-primary">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $idpekerjaan }})">Cancel</button>
						</div>
					</div>
					@elseif($action == 'update')
					<!-- <div class="form-group row">
						<label for="idalat" class="col-xs-12 col-sm-2 col-md-2 tebal">idalat</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="idalat" value="{{ $row->idalat }}">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="idpekerjaan" class="col-xs-12 col-sm-2 col-md-2 tebal">idpekerjaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="idpekerjaan" value="{{ $row->idpekerjaan }}">
						</div>
					</div> -->
					<div class="form-group row">
						<label for="jenis" class="col-xs-12 col-sm-2 col-md-2 tebal">Jenis</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="jenis" value="{{ $row->jenis }}">
						</div>
						<label for="merk" class="col-xs-12 col-sm-2 col-md-2 tebal">Merk</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="merk" value="{{ $row->merk }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="tipe" class="col-xs-12 col-sm-2 col-md-2 tebal">Tipe</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="tipe" value="{{ $row->tipe }}">
						</div>
						<label for="keterangan" class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="keterangan" value="{{ $row->keterangan }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="photo" class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="file" name="photo" value=""><br>
							<img style="width : 100px; display: block;" src="{{ asset('/dataunggah/gambar')}}/{{ $row['photo'] }}"/>
						</div>
						<label for="status" class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="status" readonly value="{{ $row->status }}">
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="modified_by" class="col-xs-12 col-sm-2 col-md-2 tebal">modified_by</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="modified_by" value="{{ $row->modified_by }}">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="created_at" class="col-xs-12 col-sm-2 col-md-2 tebal">created_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="created_at" value="{{ $row->created_at }}">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="updated_at" class="col-xs-12 col-sm-2 col-md-2 tebal">updated_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="updated_at" value="{{ $row->updated_at }}">
						</div>
					</div> -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idalatp" value = "{{ $row->idalatp }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $row->idpekerjaan }}"?>
							<input type = "hidden" name = "photolama" value = "{{ $row->photo }}"?>
							<button type="submit" class="btn btn-primary">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row->idpekerjaan }})">Cancel</button>
						</div>
					</div>
					@elseif($action == 'delete')
					<!-- <div class="form-group row">
						<label for="idalat" class="col-xs-12 col-sm-2 col-md-2 tebal">idalat</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->idalat }}
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="idpekerjaan" class="col-xs-12 col-sm-2 col-md-2 tebal">idpekerjaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->idpekerjaan }}
						</div>
					</div> -->
					<div class="form-group row">
						<label for="jenis" class="col-xs-12 col-sm-2 col-md-2 tebal">Jenis</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->jenis }}
						</div>
						<label for="merk" class="col-xs-12 col-sm-2 col-md-2 tebal">Merk</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->merk }}
						</div>
					</div>
					<div class="form-group row">
						<label for="tipe" class="col-xs-12 col-sm-2 col-md-2 tebal">Tipe</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->tipe }}
						</div>
						<label for="keterangan" class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->keterangan }}
						</div>
					</div>
					<div class="form-group row">
						<label for="photo" class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<img style="width : 200px; display: block;" src="{{ asset('/dataunggah/gambar')}}/{{ $row['photo'] }}"/>
						</div>
						<label for="status" class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->status }}
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="modified_by" class="col-xs-12 col-sm-2 col-md-2 tebal">modified_by</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->modified_by }}
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="created_at" class="col-xs-12 col-sm-2 col-md-2 tebal">created_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->created_at }}
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="updated_at" class="col-xs-12 col-sm-2 col-md-2 tebal">updated_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->updated_at }}
						</div>
					</div> -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idalatp" value = "{{ $row->idalatp }}"?>
							<input type = "hidden" name = "photolama" value = "{{ $row->photo }}"?>
							<button type="submit" class="btn btn-primary">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row->idpekerjaan }})">Cancel</button>
						</div>
					</div>
					@elseif($action == 'detail')
					<!-- <div class="form-group row">
						<label for="idalat" class="col-xs-12 col-sm-2 col-md-2 tebal">idalat</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->idalat }}
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="idpekerjaan" class="col-xs-12 col-sm-2 col-md-2 tebal">idpekerjaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->idpekerjaan }}
						</div>
					</div> -->
					<div class="form-group row">
						<label for="jenis" class="col-xs-12 col-sm-2 col-md-2 tebal">Jenis</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->jenis }}
						</div>
						<label for="merk" class="col-xs-12 col-sm-2 col-md-2 tebal">Merk</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->merk }}
						</div>
					</div>
					<div class="form-group row">
						<label for="tipe" class="col-xs-12 col-sm-2 col-md-2 tebal">Tipe</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->tipe }}
						</div>
						<label for="keterangan" class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->keterangan }}
						</div>
					</div>
					<div class="form-group row">
						<label for="photo" class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<img style="width : 200px; display: block;" src="{{ asset('/dataunggah/gambar')}}/{{ $row['photo'] }}"/>
						</div>
						<label for="status" class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->status }}
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="modified_by" class="col-xs-12 col-sm-2 col-md-2 tebal">modified_by</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->modified_by }}
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="created_at" class="col-xs-12 col-sm-2 col-md-2 tebal">created_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->created_at }}
						</div>
					</div> -->
				<!-- 	<div class="form-group row">
						<label for="updated_at" class="col-xs-12 col-sm-2 col-md-2 tebal">updated_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->updated_at }}
						</div>
					</div> -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row->idpekerjaan }})">Back</button>
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
