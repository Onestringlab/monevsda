@extends('templates.app')

@section('title')
  Data Log
@endsection

@section('content')
<script>
function button_cancel(){
	location.replace('{{ asset('/') }}log');
}
</script>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Form Log</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}log/manage" method="post">
				@if($action == 'insert')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Aktivitas</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="aktivitas" value="">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="keterangan" value="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<button type="submit" class="btn btn-success">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'update')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Aktivitas</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="aktivitas" value="{{ $row->aktivitas }}">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="keterangan" value="{{ $row->keterangan }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idlog" value = "{{ $row->idlog }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Aktivitas</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->aktivitas }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->keterangan }}
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
							<input type = "hidden" name = "idlog" value = "{{ $row->idlog }}"?>
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
@endsection
