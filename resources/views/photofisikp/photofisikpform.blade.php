@extends('templates.app')

@section('title')
Data Photo Fisik
@endsection

@section('content')
<script>
	function button_cancel(idpekerjaan){
		location.replace('{{ asset('/') }}laporanfisikp/'+idpekerjaan);
	}
</script>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			@include('pekerjaan/pekerjaaninfo')
			<div class="x_title">
				<h2> Data Photo Fisik</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<form class="form-horizontal" action="{{ asset('/') }}photofisikp/manage" method="post" enctype="multipart/form-data">
					@if($action == 'insert')
					<div class="form-group row">
						<label for="judul" class="col-xs-12 col-sm-2 col-md-2 tebal">Judul</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="judul" value="">
						</div>
						<label for="photofisik" class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="file" name="photofisik" value="">
						</div>
					</div>
					<div class="form-group">
						<div class="offset-sm-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<button type="submit" class="btn btn-primary">Insert</button>
							<input type = "hidden" name = "idlaporanfisikp" value = "{{ $laporanfisikp -> idlaporanfisikp }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $laporanfisikp -> idpekerjaan }}"?>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $laporanfisikp -> idpekerjaan }})">Cancel</button>
						</div>
					</div>
					@elseif($action == 'update')
					<div class="form-group row">
						<label for="judul" class="col-xs-12 col-sm-2 col-md-2 tebal">Judul</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="judul" value="{{ $photofisikp->judul }}">
						</div>
						<label for="photofisik" class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="file" name="photofisik" value="{{ $photofisikp->photofisik }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idphotofisikp" value = "{{ $photofisikp->idphotofisikp }}"?>
							<input type = "hidden" name = "idlaporanfisikp" value = "{{ $photofisikp -> idlaporanfisikp }}"?>
							<input type = "hidden" name = "photofisiklama" value = "{{ $photofisikp->photofisik }}"?>
							<button type="submit" class="btn btn-primary">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $laporanfisikp -> idpekerjaan }})">Cancel</button>
						</div>
					</div>
					@elseif($action == 'delete')
					<div class="form-group row">
						<label for="judul" class="col-xs-12 col-sm-2 col-md-2 tebal">Judul</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $photofisikp->judul }}
						</div>
						<label for="photofisik" class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $photofisikp->photofisik }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idphotofisikp" value = "{{ $photofisikp->idphotofisikp }}"?>
							<input type = "hidden" name = "photofisiklama" value = "{{ $photofisikp -> photofisik }}"?>
							<button type="submit" class="btn btn-primary">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $laporanfisikp -> idpekerjaan }})">Cancel</button>
						</div>
					</div>
					@elseif($action == 'detail')
					<div class="form-group row">
						<label for="idphotofisikp" class="col-xs-12 col-sm-2 col-md-2 tebal">idphotofisikp</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $photofisikp->idphotofisikp }}
						</div>
					</div>
					<div class="form-group row">
						<label for="idlaporanfisikp" class="col-xs-12 col-sm-2 col-md-2 tebal">idlaporanfisikp</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $photofisikp->idlaporanfisikp }}
						</div>
					</div>
					<div class="form-group row">
						<label for="judul" class="col-xs-12 col-sm-2 col-md-2 tebal">Judul</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $photofisikp->judul }}
						</div>
					</div>
					<div class="form-group row">
						<label for="photofisik" class="col-xs-12 col-sm-2 col-md-2 tebal">Photo</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $photofisikp->photofisik }}
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $photofisikp->status }}
						</div>
					</div>
					<div class="form-group row">
						<label for="modified_by" class="col-xs-12 col-sm-2 col-md-2 tebal">modified_by</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $photofisikp->modified_by }}
						</div>
					</div>
					<div class="form-group row">
						<label for="created_at" class="col-xs-12 col-sm-2 col-md-2 tebal">created_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $photofisikp->created_at }}
						</div>
					</div>
					<div class="form-group row">
						<label for="updated_at" class="col-xs-12 col-sm-2 col-md-2 tebal">updated_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $photofisikp->updated_at }}
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
