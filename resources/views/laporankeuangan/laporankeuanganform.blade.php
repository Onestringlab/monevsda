@extends('templates.app')

@section('title')
  Data Laporan Keuangan
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
			<h2>Form LaporanKeuangan</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}laporankeuangan/manage" method="post">
				@if($action == 'insert')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Tanggal</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="date" name="tanggal" value="">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Pembayaran Rp.</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="pembayaran" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-10 col-md-10">
							<input class="form-control" type="text" name="keterangan" value="">
						</div>
					</div>
					<!-- <div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">kemajuan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="kemajuan" value="">
						</div>
					</div> -->
					<!-- <div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">buktiba</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="buktiba" value="">
						</div>
					</div> -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $pekerjaan->idpekerjaan }}"?>
							<button type="submit" class="btn btn-success">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $pekerjaan->idpekerjaan }})">Cancel</button>
						</div>
					</div>
				@elseif($action == 'update')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Tanggal</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="date" name="tanggal" value="{{ $row->tanggal }}">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Pembayaran Rp.</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="pembayaran" value="{{ $row->pembayaran }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-10 col-md-10">
	   					<input class="form-control" type="text" name="keterangan" value="{{ $row->keterangan }}">
						</div>
					</div>
					<!-- <div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">kemajuan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="kemajuan" value="{{ $row->kemajuan }}">
						</div>
					</div> -->
					<!-- <div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">buktiba</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="buktiba" value="{{ $row->buktiba }}">
						</div>
					</div> -->
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idlaporankeuangan" value = "{{ $row->idlaporankeuangan }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $row->idpekerjaan }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row->idpekerjaan }})">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Tanggal</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->tanggal }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Pembayaran Rp.</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->pembayaran }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Keterangan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->keterangan }}
						</div>
					</div>
					<!-- <div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">kemajuan</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->kemajuan }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">buktiba</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->buktiba }}
						</div>
					</div> -->
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Oleh</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->modified_by }}
						</div>
					<!-- </div> -->
					<!-- <div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">created_at</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->created_at }}
						</div>
					</div> -->
					<!-- <div class="form-group"> -->
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Waktu</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							: {{ $row->updated_at }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idlaporankeuangan" value = "{{ $row->idlaporankeuangan }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $row->idpekerjaan }}"?>
							<button type="submit" class="btn btn-success">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{$row->idpekerjaan}})">Cancel</button>
						</div>
					</div>
				@endif
					{{ csrf_field() }}
				</form>
			</div>
			@include('laporankeuangan/laporankeuanganlist')
		</div>
	</div>
</div>
@endsection

