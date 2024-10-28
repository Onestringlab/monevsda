@extends('templates.app')

@section('title')
	Data Program
@endsection

@section('content')

<script>
function button_cancel(){
	location.replace('{{ asset('/') }}program');
}
</script>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Form Program</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}program/manage" method="post">
				@if($action == 'insert')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Bidang</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($databidang,'kode','value','bidang','')!!}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">No Rekening</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="norekening" value="" {!!fieldRequired('Harap Diisi!')!!}}>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama Program</label>
						<div class="col-xs-12 col-sm-10 col-md-10">
							<input class="form-control" type="text" name="namaprogram" value="" {!!fieldRequired('Harap Diisi!')!!}}>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "tahun" value = "{{session()->get('ta')}}"?>
							<button type="submit" class="btn btn-success">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'update')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Bidang</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($databidang,'kode','value','bidang', $row->bidang)!!}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">No Rekening</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="norekening" value="{{ $row->norekening }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama Program</label>
						<div class="col-xs-12 col-sm-10 col-md-10">
	   					<input class="form-control" type="text" name="namaprogram" value="{{ $row->namaprogram }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idprogram" value = "{{ $row->idprogram }}"?>
							<input type = "hidden" name = "tahun" value = "{{ $row->tahun }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Bidang</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->bidang }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">No Rekening</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->norekening }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama Program</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->namaprogram }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Tahun</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->tahun }}
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
							<input type = "hidden" name = "idprogram" value = "{{ $row->idprogram }}"?>
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