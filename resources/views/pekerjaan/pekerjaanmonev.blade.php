@extends('templates.app')

@section('title')
	Data Pekerjaan
@endsection

@section('content')
<script>
function button_cancel(){
	location.replace("{{ asset('/')}}"+"pekerjaanall/");
}
</script>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		@include('pekerjaan/pekerjaaninfo')

		@include('alat/alatlist')

		@include('koordinat/koordinatlist')

    @include('kurvas/kurvaslist')

    @include('laporanfisik/laporanfisiklist')

    @include('laporankeuangan/laporankeuanganlist')

    @include('dokumen/dokumenlist')

	</div>
	<div class="form-group">
		<div class="col-sm-3">
			<button type="button" class="btn btn-primary" onclick="button_cancel()">Back</button>
			<br><br>
		</div>
	</div>
</div>

@endsection