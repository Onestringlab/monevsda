@extends('templates.app')

@section('title')
  Data Laporan Fisik
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
		@include('laporanfisik/laporanfisikinfo')
		<div class="x_title text-success">
			<h2>Form Photo Fisik</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}photofisik/manage" method="post" enctype="multipart/form-data">
				@if($action == 'insert')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Judul</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="judul" value="">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Photo Fisik</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="file" name="photofisik" value="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idlaporanfisik" value = "{{ $laporanfisik -> idlaporanfisik }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $laporanfisik -> idpekerjaan }}"?>
							<button type="submit" class="btn btn-success">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $laporanfisik -> idpekerjaan }})">Cancel</button>
						</div>
					</div>
				@elseif($action == 'update')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Judul</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="judul" value="{{ $row->judul }}">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Photo Fisik</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="file" name="photofisik" value="">
							<br>
							<div>
								<img width="300px" src="{{asset('/')}}dataunggah/gambar/{{ $row->photofisik }}">
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-xs-12 col-sm-4 col-md-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idphotofisik" value = "{{ $row->idphotofisik }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $row->laporanfisik->idpekerjaan }}"?>
							<input type = "hidden" name = "idlaporanfisik" value = "{{ $row->idlaporanfisik }}"?>
							<input type = "hidden" name = "photofisiklama" value = "{{ $row->photofisik }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row->laporanfisik->idpekerjaan }})">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Judul</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->judul }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Photo Fisik</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<img width="300px" src="{{asset('/')}}dataunggah/gambar/{{ $row->photofisik }}">
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
							<input type = "hidden" name = "idphotofisik" value = "{{ $row->idphotofisik }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $row->laporanfisik->idpekerjaan }}"?>
							<input type = "hidden" name = "idlaporanfisik" value = "{{ $row->idlaporanfisik }}"?>
							<input type = "hidden" name = "photofisiklama" value = "{{ $row->photofisik }}"?>
							<button type="submit" class="btn btn-success">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row->laporanfisik->idpekerjaan }})">Cancel</button>
						</div>
					</div>
				@endif
					{{ csrf_field() }}
				</form>
			</div>
    	@include('photofisik/photofisikthumb')
		</div>
	</div>
</div>
@endsection

