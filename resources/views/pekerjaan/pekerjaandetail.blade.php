@extends('templates.app')

@section('title')
	Data Pekerjaan Detail
@endsection

@section('content')
<script>
function button_cancel(){
	location.replace("{{ asset('/')}}"+"pekerjaanall/");
}
</script>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel" id="cetak">
			<div class="x_title text-primary">
				<h2>Detail Pekerjaan</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="form-horizontal">
					@include('pekerjaan/datapekerjaan')

					@include('alat/alatlist')

					@include('koordinat/koordinatlist')

					@include('kurvas/kurvaslist')

					@include('laporanfisik/laporanfisiklist')

					@include('laporankeuangan/laporankeuanganlist')

    			@include('dokumen/dokumenlist')
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3">
				<button type="button" class="btn btn-primary" onclick="button_cancel()">Back</button>
				<br><br>
			</div>
		</div>
	</div>
</div>
@endsection