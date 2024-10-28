@extends('templates.app')

@section('title')
	Data Koordinat
@endsection

@section('content')
<script>
function button_cancel(idpekerjaan){
	location.replace('{{asset('/')}}' + 'pekerjaanmonev/' + idpekerjaan);
}
</script>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		@include('pekerjaan/pekerjaaninfo')
		<div class="x_title">
			<h2>Form Koordinat</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}koordinat/manage" method="post">
				@if($action == 'insert')
					<div class="form-group">
						<label class="col-xs-12 col-sm-1 col-md-1 tebal">Grup</label>
						<div class="col-xs-12 col-sm-3 col-md-3">
							<input class="form-control" type="text" name="grup" value="" {!! fieldRequired('Harap Diisi') !!}>
						</div>
						<label class="col-xs-12 col-sm-1 col-md-1 tebal">Latitude</label>
						<div class="col-xs-12 col-sm-3 col-md-3">
							<input class="form-control" type="text" name="latkoor" value="" {!! fieldRequired('Harap Diisi') !!}>
						</div>
						<label class="col-xs-12 col-sm-1 col-md-1 tebal">Langitude</label>
						<div class="col-xs-12 col-sm-3 col-md-3">
							<input class="form-control" type="text" name="lngkoor" value="" {!! fieldRequired('Harap Diisi') !!}>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $pekerjaan -> idpekerjaan }}"?>
							<button type="submit" class="btn btn-success">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $pekerjaan -> idpekerjaan }})">Cancel</button>
						</div>
					</div>
				@elseif($action == 'update')
					<div class="form-group">
						<label class="col-xs-12 col-sm-1 col-md-1 tebal">Grup</label>
						<div class="col-xs-12 col-sm-3 col-md-3">
	   					<input class="form-control" type="text" name="grup" value="{{ $row->grup }}" {!! fieldRequired('Harap Diisi') !!}>
						</div>
						<label class="col-xs-12 col-sm-1 col-md-1 tebal">Latitude</label>
						<div class="col-xs-12 col-sm-3 col-md-3">
	   					<input class="form-control" type="text" name="latkoor" value="{{ $row->latkoor }}" {!! fieldRequired('Harap Diisi') !!}>
						</div>
						<label class="col-xs-12 col-sm-1 col-md-1 tebal">Langitude</label>
						<div class="col-xs-12 col-sm-3 col-md-3">
	   					<input class="form-control" type="text" name="lngkoor" value="{{ $row->lngkoor }}" {!! fieldRequired('Harap Diisi') !!}>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idkoordinat" value = "{{ $row->idkoordinat }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $row->idpekerjaan }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{$row->idpekerjaan}})">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-xs-12 col-sm-1 col-md-1 tebal">Grup</label>
						<div class="col-xs-12 col-sm-3 col-md-3">
							: {{ $row->grup }}
						</div>
						<label class="col-xs-12 col-sm-1 col-md-1 tebal">Latitude</label>
						<div class="col-xs-12 col-sm-3 col-md-3">
							: {{ $row->latkoor }}
						</div>
						<label class="col-xs-12 col-sm-1 col-md-1 tebal">Langitude</label>
						<div class="col-xs-12 col-sm-3 col-md-3">
							: {{ $row->lngkoor }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idkoordinat" value = "{{ $row->idkoordinat }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $row->idpekerjaan }}"?>
							<button type="submit" class="btn btn-success">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{$row->idpekerjaan}})">Cancel</button>
						</div>
					</div>
				@endif
					{{ csrf_field() }}
				</form>
			</div>
			@include('koordinat/koordinatlist')
		</div>
	</div>
</div>
@endsection

