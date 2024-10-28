@extends('templates.app')

@section('title')
  Data Konsultan
@endsection

@section('content')
<script>
function button_cancel(){
	location.replace('{{ asset('/') }}konsultan');
}
</script>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Form Konsultan</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}konsultan/manage" method="post">
				@if($action == 'insert')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama Konsultan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="nama" value="">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Alamat</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="alamat" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Penanggung Jawab</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="penanggungjawab" value="">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">No Telp</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="notelp" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">E-Mail</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="email" value="">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datastatus,'kode','value','status','')!!}
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
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama Konsultan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="nama" value="{{ $row->nama }}">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Alamat</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="alamat" value="{{ $row->alamat }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Penanggung Jawab</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="penanggungjawab" value="{{ $row->penanggungjawab }}">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">No Telp</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="notelp" value="{{ $row->notelp }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">E-Mail</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="email" value="{{ $row->email }}">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datastatus,'kode','value','status',$row->status)!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idkonsultan" value = "{{ $row->idkonsultan }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama Konsultan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->nama }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Alamat</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->alamat }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Penanggung Jawab</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->penanggungjawab }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">No Telp</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->notelp }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">E-Mail</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->email }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Oleh</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->modified_by }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Waktu</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->updated_at }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->status }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idkonsultan" value = "{{ $row->idkonsultan }}"?>
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
