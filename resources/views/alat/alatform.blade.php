@extends('templates.app')

@section('title')
Data Alat
@endsection

@section('content')
<script>
	function button_cancel(idpekerjaan){
		location.replace('{{ asset('/') }}pekerjaanmonev/' + idpekerjaan);

	}
</script>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			@include('pekerjaan/pekerjaaninfo')
			<div class="x_title">
				<h2>Form Alat</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<form class="form-horizontal" action="{{ asset('/') }}alat/manage" method="post" enctype="multipart/form-data">
					@if($action == 'insert')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Jenis</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="jenis" value="" {!! fieldRequired('Harap Diisi') !!}>
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Merk</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="merk" value="" {!! fieldRequired('Harap Diisi') !!}>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Tipe</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="tipe" value="" {!! fieldRequired('Harap Diisi') !!}>
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="keterangan" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="file" name="photo" value="" {!! fieldRequired('Harap Diisi') !!}>
							@if($errors->has('photo'))
							<p>{{ $errors->first('photo')}}</p>
							@endif
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $pekerjaan -> idpekerjaan }}"?>
							<button type="submit" class="btn btn-primary">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $pekerjaan -> idpekerjaan }})">Cancel</button>
						</div>
					</div>
					@elseif($action == 'update')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Jenis</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="jenis" value="{{ $row->jenis }}" {!! fieldRequired('Harap Diisi') !!}>
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Merk</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="merk" value="{{ $row->merk }}" {!! fieldRequired('Harap Diisi') !!}>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Tipe</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="tipe" value="{{ $row->tipe }}" {!! fieldRequired('Harap Diisi') !!}>
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="keterangan" value="{{ $row->keterangan }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="file" name="photo" value="{{ $row->photo }}">
							@if($errors->has('photo'))
							<p>{{ $errors->first('photo')}}</p>
							@endif
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Photo Sekarang</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<img style="width : 200px; display: block;" src="{{ asset('/dataunggah/gambar')}}/{{ $row['photo'] }}"/>
						</div>

					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idalat" value = "{{ $row ->idalat}}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $row ->idpekerjaan}}"?>
							<input type = "hidden" name = "photolama" value = "{{ $row->photo }}"?>
							<button type="submit" class="btn btn-primary">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row -> idpekerjaan }})">Cancel</button>
						</div>
					</div>
					@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Jenis</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->jenis }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Merk</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->merk }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Tipe</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->tipe }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->keterangan }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<img style="width : 200px; display: block;" src="{{ asset('/dataunggah/gambar')}}/{{ $row['photo'] }}"/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idalat" value = "{{ $row->idalat }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $row->idpekerjaan}}"?>
							<input type = "hidden" name = "photolama" value = "{{ $row->photo }}"?>
							<button type="submit" class="btn btn-primary">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row -> idpekerjaan }})">Cancel</button>
						</div>
					</div>
					@endif
					{{ csrf_field() }}
				</form>
			</div>
			@include('alat/alatlist')
		</div>
	</div>
</div>
@endsection
