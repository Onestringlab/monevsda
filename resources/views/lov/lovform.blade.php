@extends('templates.app')

@section('title')
  Data Username
@endsection

@section('content')
<script>
function button_cancel(){
	location.replace('{{ asset('/') }}lov');
}
</script>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Form Lov</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}lov/manage" method="post">
				@if($action == 'insert')
					<div class="form-group">
						<label class="col-sm-2 control-label">Kategori</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="kategori" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Kode</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="kode" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Value</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="value" value="">
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
						<label class="col-sm-2 control-label">Kategori</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="kategori" value="{{ $row->kategori }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Kode</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="kode" value="{{ $row->kode }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Value</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="value" value="{{ $row->value }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idlov" value = "{{ $row->idlov }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-sm-2 control-label">Kategori</label>
						<div class="col-sm-10">
							{{ $row->kategori }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Kode</label>
						<div class="col-sm-10">
							{{ $row->kode }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Value</label>
						<div class="col-sm-10">
							{{ $row->value }}
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
							<input type = "hidden" name = "idlov" value = "{{ $row->idlov }}"?>
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

