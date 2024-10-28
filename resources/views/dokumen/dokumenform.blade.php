@extends('templates.app')

@section('title')
  Data Dokumen
@endsection

@section('content')
<script>
function button_cancel(idpekerjaan){
	location.replace('{{ asset('/') }}pekerjaanmonev/'+idpekerjaan);
}
</script>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		@include('pekerjaan/pekerjaaninfo')
		<div class="x_title">
			<h2>Form Dokumen</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}dokumen/manage" method="post" enctype="multipart/form-data">
				@if($action == 'insert')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Dokumen</label>
						<div class="col-xs-12 col-sm-10 col-md-10">
							<input class="form-control" type="text" name="juduldokumen" value="" {!!fieldRequired('Harap Diisi')!!}>
							@if($errors->has('juduldokumen'))
          			- {{ $errors->first('juduldokumen')}}
        			@endif
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">File</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="file" name="namafile" value="" {!!fieldRequired('Harap Diisi')!!}>
								@if($errors->has('namafile'))
          				- {{ $errors->first('namafile') }}
        				@endif
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datastatus,'kode','value','status','')!!}
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
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Dokumen</label>
						<div class="col-xs-12 col-sm-10 col-md-10">
	   					<input class="form-control" type="text" name="juduldokumen" value="{{ $row->juduldokumen }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">File</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="file" name="namafile">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datastatus,'kode','value','status',$row->status)!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "iddokumen" value = "{{ $row->iddokumen }}"?>
							<input type = "hidden" name = "namafilelama" value = "{{ $row->namafile }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $row->idpekerjaan }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row->idpekerjaan }})">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Dokumen</label>
						<div class="col-xs-12 col-sm-10 col-md-10">
							{{ $row->juduldokumen }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">File</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->namafile }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->status }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Oleh</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->modified_by }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Waktu</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->updated_at }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "iddokumen" value = "{{ $row->iddokumen }}"?>
							<input type = "hidden" name = "namafilelama" value = "{{ $row->namafile }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $row->idpekerjaan }}"?>
							<button type="submit" class="btn btn-success">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row->idpekerjaan }})">Cancel</button>
						</div>
					</div>
				@endif
					{{ csrf_field() }}
				</form>
			</div>
			@include('dokumen/dokumenlist')
		</div>
	</div>
</div>
@endsection
