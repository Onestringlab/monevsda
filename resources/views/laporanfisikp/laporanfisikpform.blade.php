@extends('templates.app')

@section('title')
Data LaporanFisikp 
@endsection

@section('content')
<script>
	function button_cancel(idpekerjaan){
		location.replace('{{ asset('/') }}laporanfisikp/'+idpekerjaan);
	}
</script>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2> Data Laporan Fisik</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<form class="form-horizontal" action="{{ asset('/') }}laporanfisikp/manage" method="post">
					@if($action == 'insert')
					<!-- <div class="form-group row">
						<label for="idlaporanfisikp" class="col-xs-12 col-sm-2 col-md-2 tebal">idlaporanfisikp</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="idlaporanfisikp" value="">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="idpekerjaan" class="col-xs-12 col-sm-2 col-md-2 tebal">idpekerjaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="idpekerjaan" value="">
						</div>
					</div> -->
					<div class="form-group row">
						<label for="tanggal" class="col-xs-12 col-sm-2 col-md-2 tebal">Tanggal</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="tanggal" value="">
						</div>
						<label for="mingguke" class="col-xs-12 col-sm-2 col-md-2 tebal">Minggu ke</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="mingguke" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="target" class="col-xs-12 col-sm-2 col-md-2 tebal">Rencana</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="target" value="">
						</div>
						<label for="kemajuan" class="col-xs-12 col-sm-2 col-md-2 tebal">Realisasi</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="kemajuan" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="keterangan" class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="keterangan" value="">
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="status" class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="status" value="">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="modified_by" class="col-xs-12 col-sm-2 col-md-2 tebal">modified_by</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="modified_by" value="">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="created_at" class="col-xs-12 col-sm-2 col-md-2 tebal">created_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="created_at" value="">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="updated_at" class="col-xs-12 col-sm-2 col-md-2 tebal">updated_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="updated_at" value="">
						</div>
					</div> -->
					<div class="form-group">
						<div class="offset-sm-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<button type="submit" class="btn btn-primary">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $idpekerjaan }})">Cancel</button>
						</div>
					</div>
					@elseif($action == 'update')
					<!-- <div class="form-group row">
						<label for="idlaporanfisikp" class="col-xs-12 col-sm-2 col-md-2 tebal">idlaporanfisikp</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="idlaporanfisikp" value="{{ $row->idlaporanfisikp }}">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="idpekerjaan" class="col-xs-12 col-sm-2 col-md-2 tebal">idpekerjaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="idpekerjaan" value="{{ $row->idpekerjaan }}">
						</div>
					</div> -->
					<div class="form-group row">
						<label for="tanggal" class="col-xs-12 col-sm-2 col-md-2 tebal">Tanggal</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="tanggal" value="{{ $row->tanggal }}" readonly>
						</div>
						<label for="mingguke" class="col-xs-12 col-sm-2 col-md-2 tebal">Minggu ke</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="mingguke" value="{{ $row->mingguke }}" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="target" class="col-xs-12 col-sm-2 col-md-2 tebal">Rencana</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="target" value="{{ $row->target }}" readonly>
						</div>
						<label for="kemajuan" class="col-xs-12 col-sm-2 col-md-2 tebal">Realisasi</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="kemajuan" value="{{ $row->kemajuan }}">
						</div>
					</div>
					<div class="form-group row">
						<label for="keterangan" class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-10 col-md-10">
							<input class="form-control" type="text" name="keterangan" value="{{ $row->keterangan }}" readonly>
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="status" class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="status" value="{{ $row->status }}">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="modified_by" class="col-xs-12 col-sm-2 col-md-2 tebal">modified_by</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="modified_by" value="{{ $row->modified_by }}">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="created_at" class="col-xs-12 col-sm-2 col-md-2 tebal">created_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="created_at" value="{{ $row->created_at }}">
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="updated_at" class="col-xs-12 col-sm-2 col-md-2 tebal">updated_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="updated_at" value="{{ $row->updated_at }}">
						</div>
					</div> -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idlaporanfisikp" value = "{{ $row->idlaporanfisikp }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $row->idpekerjaan }}"?>
							<button type="submit" class="btn btn-primary">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $idpekerjaan }})">Cancel</button>
						</div>
					</div>
					@elseif($action == 'delete')
					<!-- <div class="form-group row">
						<label for="idlaporanfisikp" class="col-xs-12 col-sm-2 col-md-2 tebal">idlaporanfisikp</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->idlaporanfisikp }}
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="idpekerjaan" class="col-xs-12 col-sm-2 col-md-2 tebal">idpekerjaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->idpekerjaan }}
						</div>
					</div> -->
					<div class="form-group row">
						<label for="tanggal" class="col-xs-12 col-sm-2 col-md-2 tebal">Tanggal</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->tanggal }}
						</div>
						<label for="mingguke" class="col-xs-12 col-sm-2 col-md-2 tebal">Minggu ke</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->mingguke }}
						</div>
					</div>
					<div class="form-group row">
						<label for="target" class="col-xs-12 col-sm-2 col-md-2 tebal">Rencana</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->target }}
						</div>
						<label for="kemajuan" class="col-xs-12 col-sm-2 col-md-2 tebal">Realisasi</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->kemajuan }}
						</div>
					</div>
					<div class="form-group row">
						<label for="keterangan" class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->keterangan }}
						</div>
						<label for="status" class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->status }}
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="modified_by" class="col-xs-12 col-sm-2 col-md-2 tebal">modified_by</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->modified_by }}
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="created_at" class="col-xs-12 col-sm-2 col-md-2 tebal">created_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->created_at }}
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="updated_at" class="col-xs-12 col-sm-2 col-md-2 tebal">updated_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->updated_at }}
						</div>
					</div> -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idlaporanfisikp" value = "{{ $row->idlaporanfisikp }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $idpekerjaan }}"?>
							<button type="submit" class="btn btn-primary">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $idpekerjaan }})">Cancel</button>
						</div>
					</div>
					@elseif($action == 'detail')
					<!-- <div class="form-group row">
						<label for="idlaporanfisikp" class="col-xs-12 col-sm-2 col-md-2 tebal">idlaporanfisikp</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->idlaporanfisikp }}
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="idpekerjaan" class="col-xs-12 col-sm-2 col-md-2 tebal">idpekerjaan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->idpekerjaan }}
						</div>
					</div> -->
					<div class="form-group row">
						<label for="tanggal" class="col-xs-12 col-sm-2 col-md-2 tebal">Tanggal</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->tanggal }}
						</div>
						<label for="mingguke" class="col-xs-12 col-sm-2 col-md-2 tebal">Minggu ke</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->mingguke }}
						</div>
					</div>
					<div class="form-group row">
						<label for="target" class="col-xs-12 col-sm-2 col-md-2 tebal">Rencana</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->target }}
						</div>
						<label for="kemajuan" class="col-xs-12 col-sm-2 col-md-2 tebal">Realisasi</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->kemajuan }}
						</div>
					</div>
					<div class="form-group row">
						<label for="keterangan" class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->keterangan }}
						</div>
						<label for="status" class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->status }}
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="modified_by" class="col-xs-12 col-sm-2 col-md-2 tebal">modified_by</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->modified_by }}
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="created_at" class="col-xs-12 col-sm-2 col-md-2 tebal">created_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->created_at }}
						</div>
					</div> -->
					<!-- <div class="form-group row">
						<label for="updated_at" class="col-xs-12 col-sm-2 col-md-2 tebal">updated_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->updated_at }}
						</div>
					</div> -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $idpekerjaan }})">Back</button>
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
