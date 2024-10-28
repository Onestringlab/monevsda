@extends('templates.app')

@section('title')
Data Koordinat Pekerjaan
@endsection

@section('content')
<script>
	function button_cancel(idpekerjaan){
		location.replace('{{ asset('/') }}koordinatp/'+idpekerjaan);
	}
</script>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			@include('pekerjaan/pekerjaaninfo')
			<div class="x_title">
				<h2> Data Koordinat Pekerjaan</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<form class="form-horizontal" action="{{ asset('/') }}koordinatp/manage" method="post">
					@if($action == 'insert')
					<!-- <div class="form-group row">
						<label for="idkoordinatp" class="col-xs-12 col-sm-2 col-md-2 tebal">idkoordinatp</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="idkoordinatp" value="">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="idpekerjaan" class="col-xs-12 col-sm-2 col-md-2 tebal">idpekerjaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="idpekerjaan" value="">
						</div>
					</div> -->
					<div class="form-group row">
						<label for="grup" class="col-xs-12 col-sm-2 col-md-2 tebal">Grup</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="grup" value="">
						</div>
						<label for="latkoor" class="col-xs-12 col-sm-2 col-md-2 tebal">Latitude</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="latkoor" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="lngkoor" class="col-xs-12 col-sm-2 col-md-2 tebal">Langitude</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="lngkoor" value="">
						</div>
						<label for="status" class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="status" readonly value="Diajukan">
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
							<button type="submit" class="btn btn-primary">Insert</button>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $idpekerjaan }}"?>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $idpekerjaan }})">Cancel</button>
						</div>
					</div>
					@elseif($action == 'update')
					<!-- <div class="form-group row">
						<label for="idkoordinatp" class="col-xs-12 col-sm-2 col-md-2 tebal">idkoordinatp</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="idkoordinatp" value="{{ $row->idkoordinatp }}">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="idpekerjaan" class="col-xs-12 col-sm-2 col-md-2 tebal">idpekerjaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="idpekerjaan" value="{{ $row->idpekerjaan }}">
						</div>
					</div> -->
					<div class="form-group row">
						<label for="grup" class="col-xs-12 col-sm-2 col-md-2 tebal">Grup</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="grup" value="{{ $row->grup }}">
						</div>
						<label for="latkoor" class="col-xs-12 col-sm-2 col-md-2 tebal">Latitude</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="latkoor" value="{{ $row->latkoor }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="lngkoor" class="col-xs-12 col-sm-2 col-md-2 tebal">Langitude</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="lngkoor" value="{{ $row->lngkoor }}">
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
							<input type = "hidden" name = "idkoordinatp" value = "{{ $row->idkoordinatp }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $row->idpekerjaan }}"?>
							<button type="submit" class="btn btn-primary">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row->idpekerjaan }})">Cancel</button>
						</div>
					</div>
					@elseif($action == 'delete')
					<!-- <div class="form-group row">
						<label for="idkoordinatp" class="col-xs-12 col-sm-2 col-md-2 tebal">idkoordinatp</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->idkoordinatp }}
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="idpekerjaan" class="col-xs-12 col-sm-2 col-md-2 tebal">idpekerjaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->idpekerjaan }}
						</div>
					</div> -->
					<div class="form-group row">
						<label for="grup" class="col-xs-12 col-sm-2 col-md-2 tebal">Grup</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->grup }}
						</div>
						<label for="latkoor" class="col-xs-12 col-sm-2 col-md-2 tebal">Latitude</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->latkoor }}
						</div>
					</div>
					<div class="form-group row">
						<label for="lngkoor" class="col-xs-12 col-sm-2 col-md-2 tebal">Langitude</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->lngkoor }}
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
							<input type = "hidden" name = "idkoordinatp" value = "{{ $row->idkoordinatp }}"?>
							<button type="submit" class="btn btn-primary">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row->idpekerjaan }})">Cancel</button>
						</div>
					</div>
					@elseif($action == 'detail')
					<div class="form-group row">
						<label for="idkoordinatp" class="col-xs-12 col-sm-2 col-md-2 tebal">idkoordinatp</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->idkoordinatp }}
						</div>
					</div>
					<div class="form-group row">
						<label for="idpekerjaan" class="col-xs-12 col-sm-2 col-md-2 tebal">idpekerjaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->idpekerjaan }}
						</div>
					</div>
					<div class="form-group row">
						<label for="grup" class="col-xs-12 col-sm-2 col-md-2 tebal">Grup</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->grup }}
						</div>
					</div>
					<div class="form-group row">
						<label for="latkoor" class="col-xs-12 col-sm-2 col-md-2 tebal">Latitude</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->latkoor }}
						</div>
					</div>
					<div class="form-group row">
						<label for="lngkoor" class="col-xs-12 col-sm-2 col-md-2 tebal">Langitude</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->lngkoor }}
						</div>
					</div>
					<div class="form-group row">
						<label for="status" class="col-xs-12 col-sm-2 col-md-2 tebal">status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->status }}
						</div>
					</div>
					<div class="form-group row">
						<label for="modified_by" class="col-xs-12 col-sm-2 col-md-2 tebal">modified_by</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->modified_by }}
						</div>
					</div>
					<div class="form-group row">
						<label for="created_at" class="col-xs-12 col-sm-2 col-md-2 tebal">created_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->created_at }}
						</div>
					</div>
					<div class="form-group row">
						<label for="updated_at" class="col-xs-12 col-sm-2 col-md-2 tebal">updated_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->updated_at }}
						</div>
					</div>
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
