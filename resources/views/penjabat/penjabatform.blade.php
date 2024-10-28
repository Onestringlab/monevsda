@extends('templates.app')

@section('title')
  Data Username
@endsection

@section('content')

<script>
function button_cancel(idsk){
	location.replace('{{ asset('/') }}penjabat/'+idsk);
}
</script>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Form Pejabat</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}penjabat/manage" method="post">
				@if($action == 'insert')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama Pejabat</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="namapenjabat" value="">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">NIM</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="nip" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datastatus,'kode','value','status','')!!}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Jabatan SK</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="jabatan" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Tahun</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datata,'kode','value','tahun',session()->get('ta'))!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idsk" value = "{{ $idsk }}"?>
							<button type="submit" class="btn btn-success">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $idsk }})">Cancel</button>
						</div>
					</div>
				@elseif($action == 'update')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama Pejabat</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="namapenjabat" value="{{ $row->namapenjabat }}">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">NIM</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="nip" value="{{ $row->nip }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datastatus,'kode','value','status',$row->status)!!}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Jabatan SK</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="jabatan" value="{{ $row->jabatan }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Tahun</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datata,'kode','value','tahun', $row->tahun)!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idpenjabat" value = "{{ $row->idpenjabat }}"?>
							<input type = "hidden" name = "idsk" value = "{{ $row->idsk }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row->idsk }})">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama Pejabat</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->namapenjabat }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">NIM</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->nip }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->status }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Jabatan SK</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->jabatan }}
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
							<input type = "hidden" name = "idpenjabat" value = "{{ $row->idpenjabat }}"?>
							<input type = "hidden" name = "idsk" value = "{{ $row->idsk }}"?>
							<button type="submit" class="btn btn-success">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row->idsk }})">Cancel</button>
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
