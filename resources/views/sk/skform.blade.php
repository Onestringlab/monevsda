@extends('templates.app')

@section('title')
  Data SK
@endsection

@section('content')

<script>
function button_cancel(){
	location.replace('{{ asset('/') }}sk');
}
</script>
<div class="row">
<div class="col-md-12 col-xs-12 col-sm-4 col-md-42 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Form SK</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}sk/manage" method="post">
				@if($action == 'insert')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">No. SK</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="nosk" value="">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama SK</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="namask" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Tanggal SK</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="date" name="tglsk" value="">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Tahun</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datata,'kode','value','tahun', session() -> get('ta'))!!}
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
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">No SK</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="nosk" value="{{ $row->nosk }}">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama SK</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="namask" value="{{ $row->namask }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Tanggal SK</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="date" name="tglsk" value="{{ $row->tglsk }}">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Tahun</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datata,'kode','value','tahun', session() -> get('ta'))!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idsk" value = "{{ $row->idsk }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">No SK</label>
						<div class="col-xs-12 col-sm-4 col-md-40">
							: {{ $row->nosk }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama SK</label>
						<div class="col-xs-12 col-sm-4 col-md-40">
							: {{ $row->namask }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Tanggal SK</label>
						<div class="col-xs-12 col-sm-4 col-md-40">
							: {{ $row->tglsk }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Tahun</label>
						<div class="col-xs-12 col-sm-4 col-md-40">
							: {{ $row->tahun }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Oleh</label>
						<div class="col-xs-12 col-sm-4 col-md-40">
							: {{ $row->modified_by }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Waktu</label>
						<div class="col-xs-12 col-sm-4 col-md-40">
							: {{ $row->updated_at }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idsk" value = "{{ $row->idsk }}"?>
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
