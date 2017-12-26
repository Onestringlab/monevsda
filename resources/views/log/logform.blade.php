@extends('templates.app')

@section('title')
  Data Username
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
						<label class="col-sm-2 control-label">idlog</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="idlog" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">aktivitas</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="aktivitas" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">keterangan</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="keterangan" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">modified_by</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="modified_by" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">created_at</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="created_at" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">updated_at</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="updated_at" value="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<button type="submit" class="btn btn-success">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'update')
					<div class="form-group">
						<label class="col-sm-2 control-label">idlog</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="idlog" value="{{ $row->idlog }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">aktivitas</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="aktivitas" value="{{ $row->aktivitas }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">keterangan</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="keterangan" value="{{ $row->keterangan }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">modified_by</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="modified_by" value="{{ $row->modified_by }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">created_at</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="created_at" value="{{ $row->created_at }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">updated_at</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="updated_at" value="{{ $row->updated_at }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idlog" value = "{{ $row->idlog }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-sm-2 control-label">idlog</label>
						<div class="col-sm-10">
							{{ $row->idlog }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">aktivitas</label>
						<div class="col-sm-10">
							{{ $row->aktivitas }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">keterangan</label>
						<div class="col-sm-10">
							{{ $row->keterangan }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">modified_by</label>
						<div class="col-sm-10">
							{{ $row->modified_by }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">created_at</label>
						<div class="col-sm-10">
							{{ $row->created_at }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">updated_at</label>
						<div class="col-sm-10">
							{{ $row->updated_at }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
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
