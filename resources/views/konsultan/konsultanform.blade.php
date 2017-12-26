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
						<label class="col-sm-2 control-label">Nama Konsultan</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="nama" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Alamat</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="alamat" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Penanggung Jawab</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="penanggungjawab" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">No Telp</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="notelp" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">E-Mail</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="email" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Status</label>
						<div class="col-sm-10">
							{!!selectForm($datastatus,'kode','value','status','')!!}
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
						<label class="col-sm-2 control-label">Nama Konsultan</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="nama" value="{{ $row->nama }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Alamat</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="alamat" value="{{ $row->alamat }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Penanggung Jawab</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="penanggungjawab" value="{{ $row->penanggungjawab }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">No Telp</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="notelp" value="{{ $row->notelp }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">E-Mail</label>
						<div class="col-sm-10">
	   					<input class="form-control" type="text" name="email" value="{{ $row->email }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Status</label>
						<div class="col-sm-10">
							{!!selectForm($datastatus,'kode','value','status',$row->status)!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idkonsultan" value = "{{ $row->idkonsultan }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Konsultan</label>
						<div class="col-sm-10">
							{{ $row->nama }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Alamat</label>
						<div class="col-sm-10">
							{{ $row->alamat }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Penanggung Jawab</label>
						<div class="col-sm-10">
							{{ $row->penanggungjawab }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">No Telp</label>
						<div class="col-sm-10">
							{{ $row->notelp }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">E-Mail</label>
						<div class="col-sm-10">
							{{ $row->email }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Oleh</label>
						<div class="col-sm-10">
							{{ $row->modified_by }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Waktu</label>
						<div class="col-sm-10">
							{{ $row->updated_at }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Status</label>
						<div class="col-sm-10">
							{{ $row->status }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
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
